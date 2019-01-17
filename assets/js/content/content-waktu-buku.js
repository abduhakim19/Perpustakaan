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
            url: 'http://localhost/Perpustakaan/buku/hapusWaktu',
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
        title: 'Tambah Waktu Peminjaman',
        animation: false,
        customClass: 'animated fadeInDown',
        confirmButtonColor: '#3085d6',
        showCloseButton: true,
        confirmButtonText: 'Submit',
        html:
        '<div class="form-group text-left">'+
        '<label class="text-left">Tahun</label>'+
        '<input type="text" id="input-tahun" class="form-control" value="0" placeholder="Isi Berapa Tahun">'+
        '<label class="text-left">Bulan</label>'+
        '<input type="text" id="input-bulan" class="form-control" value="0" placeholder="Isi dari bulan ke - 1 sampai 11 ">'+
        '<label class="text-left" >Hari</label>'+
        '<input type="text" id="input-hari" class="form-control" value="0" placeholder="Isi dari hari ke - 1 sampai 29 ">'+
        '</div>',
        focusConfirm: false,
        inputValidator: (value) => {
          return !value && 'You need to write something!'
        },
        preConfirm: (value) => {
          return {
            "tahun" : document.getElementById('input-tahun').value,
            "bulan" : document.getElementById('input-bulan').value,
            "hari" : document.getElementById('input-hari').value
            }          
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
            url: 'http://localhost/Perpustakaan/buku/tampilWaktu',
            dataSrc: ''
        },
        columns: [ 
            { "data": null},
            {"data": "id_waktu", "width": "14%"},
            {"data": "rinciwaktu", "width": "62%",
              "render": (data) => {
                return data.tahun+" tahun "+data.bulan+" bulan "+ data.hari +" hari ";
              }},
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
          const id = data[0].id_waktu;
          
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
    let date;
    console.log(data);
    for (let i = 0; i < data.length; i++) {
      id = data[i].id_waktu;
      date = data[i].rinciwaktu;
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
      '<label class="text-left">ID Kategori</label>'+
      '<input type="text" id="input-id" class="form-control" value="'+id+'" readonly>'+
      '<label class="text-left">Tahun</label>'+
      '<input type="text" id="input-tahun" class="form-control" value="'+date.tahun+'">'+
      '<label class="text-left" >Bulan</label>'+
      '<input type="text" id="input-bulan" class="form-control" value="'+date.bulan+'" >'+
      '<label class="text-left" >Hari</label>'+
      '<input type="text" id="input-hari" class="form-control" value="'+date.hari+'" >'+
      '</div>',
      focusConfirm: false,
      preConfirm: () => {
        return {
          "id": document.getElementById('input-id').value,
          "tahun" : document.getElementById('input-tahun').value,
          "bulan": document.getElementById('input-bulan').value,
          "hari" : document.getElementById('input-hari').value
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
      url : 'http://localhost/Perpustakaan/buku/editWaktu',
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
      url : 'http://localhost/Perpustakaan/buku/insertWaktu',
      type: 'POST',
      data: dataInput,
      success : function(){
        $('#tablekategori').DataTable().ajax.reload();
        alertBerhasil('Data Berhasil Disimpan')
      },
      error: function(xhr, status, error) {
        alertError('Data Gagal Disimpan')
        $('#tablekategori').DataTable().ajax.reload();
      }
    })
}

const alertError = (text) => {
  const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  toast({
    type: 'error',
    title: text
  })
}

