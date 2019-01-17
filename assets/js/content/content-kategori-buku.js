const btnTambah = document.querySelector('.bg-btn-tambah');
const btnHapus = document.querySelector('.btn-hapus');

const alerthapus = (id) => {
    const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling: true,
      })
    
      swalWithBootstrapButtons({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Tidak',
        animation: false,
        customClass: 'animated zoomIn',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: 'http://localhost/Perpustakaan/buku/hapusKategori',
            method: 'POST',
            data: { id : id },
            success : function(){
              console.log(id);
              $('#tablekategori').DataTable().ajax.reload();
              alertBerhasil("Data Berhasil Dihapus")
            }
          });
        }
    })
}

btnTambah.addEventListener('click', async function() {
    mySwal = function() {
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
          closeButton = document.createElement('button');
          closeButton.className = 'swal2-close';
          closeButton.onclick = function() { swal.close(); };
          closeButton.textContent = '×';
          modal = document.querySelector('.swal-modal');
          modal.appendChild(closeButton);
        }
      }

    const {value: formValues} = await Swal({
        title: 'Tambah Kategori Buku',
        animation: false,
        customClass: 'animated fadeInDown',
        confirmButtonColor: '#3085d6',
        showCloseButton: true,
        confirmButtonText: 'Submit',
        html:
        '<div class="form-group text-left">'+
        '<label class="text-left" for="exampleInputEmail1">Nama Kategori</label>'+
        '<input type="text" id="input-jenis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >'+
        '</div>',
        focusConfirm: false,
        preConfirm: () => {
          return {"nama" : document.getElementById('input-jenis').value}
          
        }
      })
      
      if (formValues) {
        saveData(formValues)
      }
})

const alertBerhasil = (text) => {
  const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  toast({
    type: 'success',
    title: text
  })
}


$(document).ready(function() {

    //data table load setting
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength),
        };
    };

    let t = $('#tablekategori').DataTable( {
        ajax: {
            url: 'http://localhost/Perpustakaan/buku/tampilKategori',
            dataSrc: ''
        },
        columns: [ 
            { "data": null},
            {"data": "id_jenis", "width": "14%"},
            {"data": "nama_jenis", "width": "62%"},
            {"data": null, 
            defaultContent: '<i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i> <i class="fas fa-edit rounded btn-aksi bg-edit" id="edit"></i>'},
        ],
        "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets": 0
        }],
        "order": [[ 1, 'asc' ]]
      });

      const table = $('#tablekategori').DataTable();

      t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          });
        }).draw();

      $('#tablekategori tbody').on( 'click', '#delete', function () {
          var selectedRows = table.rows( $(this).parents('tr') ).data().to$();
          const data = selectedRows.toArray()
          const id = data[0].id_jenis;
          
          alerthapus(id)
      });

      $('#tablekategori tbody').on( 'click', '#edit', function () {
        var selectedRows = table.rows( $(this).parents('tr') ).data().to$();
        const data = selectedRows.toArray()
        
        popupedit(data)
    });
  });


  const popupedit = async (data) => {
    let id;
    let nama;
    for (let i = 0; i < data.length; i++) {
      id = data[i].id_jenis;
      nama = data[i].nama_jenis;
    }
    mySwal = function() {
      swal(arguments[0]);
      if (arguments[0].showCloseButton) {
        closeButton = document.createElement('button');
        closeButton.className = 'swal2-close';
        closeButton.onclick = function() { swal.close(); };
        closeButton.textContent = '×';
        modal = document.querySelector('.swal-modal');
        modal.appendChild(closeButton);
      }
    }

    const {value: formValues} = await Swal({
      title: 'Edit Kategori Buku',
      animation: false,
      customClass: 'animated fadeInDown',
      confirmButtonColor: '#3085d6',
      showCloseButton: true,
      confirmButtonText: 'Submit',
      html:
      '<div class="form-group text-left">'+
      '<label class="text-left" for="exampleInputEmail1">ID Kategori</label>'+
      '<input type="text" id="input-id" class="form-control" value="'+id+'" aria-describedby="emailHelp" readonly>'+
      '<label class="text-left" for="exampleInputEmail1">Nama Kategori</label>'+
      '<input type="text" id="input-jenis" class="form-control" value="'+nama+'" aria-describedby="emailHelp" >'+
      '</div>',
      focusConfirm: false,
      preConfirm: () => {
        return {
          "id": document.getElementById('input-id').value,
          "nama" : document.getElementById('input-jenis').value
        }
        
      }
    })
    
    if (formValues) {
      inputEditData(formValues)
    }
  }


  const inputEditData = (dataInput) => {
    console.log(dataInput);
    $.ajax({
      url : 'http://localhost/Perpustakaan/buku/editKategori',
      type: 'post',
      data: dataInput,
      success: function(){
        $('#tablekategori').DataTable().ajax.reload();
        alertBerhasil('Data Berhasil Diedit')
      },
      error: function(xhr, status, error) {
        alert('error');
        $('#tablekategori').DataTable().ajax.reload();
      }
    })
  }

  const saveData = (dataInput) => {
    console.log(dataInput);
    $.ajax({
      url : 'http://localhost/Perpustakaan/buku/insertKategori',
      type: 'POST',
      data: dataInput,
      success : function(){
        $('#tablekategori').DataTable().ajax.reload();
        alertBerhasil('Data Berhasil Disimpan')
      },
      error: function(xhr, status, error) {
        alert('error');
        $('#tablekategori').DataTable().ajax.reload();
      }
    })
}

