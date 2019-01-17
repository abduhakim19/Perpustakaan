const btnTambah = document.querySelector('.bg-btn-tambah');

const alerthapus =  (id) => {
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
          console.log(id);
          $.ajax({
            url: 'http://localhost/Perpustakaan/buku/hapusBuku',
            method: 'POST',
            data: { id : id },
            success : function(){
              $('#tablekategori').DataTable().ajax.reload();
              alertBerhasil("Data Berhasil Dihapus")
            },
            error : function(){
              $('#tablekategori').DataTable().ajax.reload();
              alertError("Data Gagal Dihapus")
            }
          });
        }
    })
}


const alertPrint = async (id) => {
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
    title: 'Jumlah Print BarCode',
    animation: false,
    customClass: 'animated fadeInDown',
    confirmButtonColor: '#3085d6',
    showCloseButton: true,
    confirmButtonText: 'Submit',
    html:
    '<div class="form-group text-left form-tambah">'+
    '<input type="text" id="input-jumlah" class="form-control" >'+
    '</div>',
    focusConfirm: false,
    preConfirm: () => {
      return document.getElementById('input-jumlah').value
    },
  })

  if (formValues) {
    cetakGambar(id, formValues)
  }
}


const cetakGambar = (id, jumlah) => {
 
  const printBarcode = document.querySelectorAll('.print-barcode img');

  const luarBarkode =document.querySelector('.print-barcode');
  for (let i = 0; i < printBarcode.length; i++) {
    luarBarkode.removeChild(printBarcode[i])
  }
  let itung = 0;
  for (let i = 0; i < jumlah; i++) { 
      const img = document.createElement('img');
      img.setAttribute('src', 'http://localhost/Perpustakaan/assets/php-barcode/barcode.php?text='+id+'&print=true&size=40');
      img.setAttribute('alt', 'testing'); 
      luarBarkode.appendChild(img);
      itung = itung + 1;
  }
 console.log(itung)
  if (itung == jumlah) {
      const a = luarBarkode.innerHTML;
      pindahPage(a);
  }
}

const styleIsi = (style) => {
  return "<html><head><script>function step1(){\n" +
				"setTimeout('step2()', 10);}\n" +
				"function step2(){window.print();window.close()}\n" +
				"</scri" + "pt></head><body onload='step1()'>\n" +
				style+"</body></html>";
}

const pindahPage = (style) => {
  Pagelink = "about:blank";
	const pwa = window.open(Pagelink, "_new");
	pwa.document.open();
	pwa.document.write(styleIsi(style));
	pwa.document.close();
}

const optionKategori = (id) => {
  console.log(id);
  $.ajax({
    url : 'http://localhost/Perpustakaan/buku/tampilKategori',
    data: { get_param: 'value' },
    dataType: 'json',
    success : function(data){
        const select = document.getElementById('input-jenis');
        
        for (let i = 0; i < data.length; i++) {
          const option = document.createElement("option");
          option.value = data[i].id_jenis;
          option.text = data[i].nama_jenis;
          if (id == data[i].id_jenis) {
            option.setAttribute('selected', 'selected');
          }
          select.appendChild(option);
        }
    },
  })
}

btnTambah.addEventListener('click', async function() {
  const d = new Date();
  const tgl = d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
  optionKategori();

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
      title: 'Tambah Buku',
      animation: false,
      customClass: 'animated fadeInDown',
      confirmButtonColor: '#3085d6',
      showCloseButton: true,
      confirmButtonText: 'Submit',
      html:
      '<div class="form-group text-left form-tambah">'+
      '<label class="text-left">Nama Buku</label>'+
      '<input type="text" id="input-nama" class="form-control" >'+
      '<label class="text-left">Nama Kategori</label>'+
      '<select type="text" id="input-jenis" class="form-control">'+
      '</select>'+
      '<label class="text-left">Jumlah Buku</label>'+
      '<input type="text" id="input-jumlah" class="form-control" >'+
      '<label class="text-left">Tanggal Masuk</label>'+
      '<input type="text" id="input-tgl" value="'+tgl+'"class="form-control" data-toggle="datepicker">'+
      '</div>',
      focusConfirm: false,
      preConfirm: () => {
        return {
          "nama" : document.getElementById('input-nama').value,
          "id_kategori" : document.getElementById('input-jenis').value,
          "jumlah" : document.getElementById('input-jumlah').value,
          "tgl" : document.getElementById('input-tgl').value
        } 
      },
      onOpen: function() {
          $('#input-tgl').datepicker({
            format: 'dd/mm/yyyy',
            uiLibrary: 'bootstrap4'
          });
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
            url: 'http://localhost/Perpustakaan/buku/tampilBuku',
            dataSrc: ''
        },
        columns: [ 
            { "data": null, "width": "1.5%"},
            {"data": "id_buku", "width": "12%"},
            {"data": "nama_buku", "width": "25%"},
            {"data" : "nama_jenis", "width": "13%"},
            {"data": "jumlah_buku", "width" : "1%"},
            {"data" : "jumlah_pinjam", "width" : "1%"},
            {"data": "tanggal_masuk", "width": "11%",
              "render" : (data) => {
                return  data.split("-").reverse().join('/');
              }
            },
            {"data" : null, "width": "20%",
            "render": ( data ) => {
              return '<img alt="testing" src="http://localhost/Perpustakaan/assets/php-barcode/barcode.php?text='+data.id_buku+'" >';
            }},
            {"data": null, "width": "20%",
            defaultContent: '<i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i> <i class="fas fa-edit rounded btn-aksi bg-edit" id="edit"></i> <i class="fas fa-print rounded btn-aksi bg-print" id="print"></i>'},
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
          const selectedRows = table.rows( $(this).parents('tr') ).data().to$();
          const data = selectedRows.toArray()
          const id = data[0].id_buku;
          
          alerthapus(id)
      });

      $('#tablekategori tbody').on( 'click', '#edit', function () {
        const selectedRows = table.rows( $(this).parents('tr') ).data().to$();
        const data = selectedRows.toArray()
        
        popupedit(data)
      });

      $('#tablekategori tbody').on( 'click', '#print', function () {
        const selectedRows = table.rows( $(this).parents('tr') ).data().to$();
        const data = selectedRows.toArray()
        const id = data[0].id_buku;
        
        alertPrint(id)
      });

  });


  const popupedit = async (data) => {
    let id, nama, id_jenis, jumlah_buku, jumlah_pinjam, tgl;
    for (let i = 0; i < data.length; i++) {
      id = data[i].id_buku;
      nama = data[i].nama_buku;
      id_jenis = data[i].id_jenis;
      jumlah_buku = data[i].jumlah_buku;
      jumlah_pinjam = data[i].jumlah_pinjam;
      tgl = data[i].tanggal_masuk
    }

    optionKategori(id_jenis);

    tgl = tgl.split("-").reverse().join('/');
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
      title: 'Edit Buku',
      animation: false,
      customClass: 'animated fadeInDown',
      confirmButtonColor: '#3085d6',
      showCloseButton: true,
      confirmButtonText: 'Submit',
      html:
      '<div class="form-group text-left">'+
      '<label class="text-left" for="input-id">ID Buku</label>'+
      '<input type="text" id="input-id" class="form-control" value="'+id+'"  readonly>'+
      '<label class="text-left" for="input-nama">Nama Buku</label>'+
      '<input type="text" id="input-nama" class="form-control" value="'+nama+'"" >'+
      '<label class="text-left" for="input-jenis">Nama Kategori</label>'+
      '<select id="input-jenis" class="form-control">'+
      '</select>'+
      '<label class="text-left" for="input-jumlahb">Jumlah Buku</label>'+
      '<input type="text" id="input-jumlahb" class="form-control" value="'+jumlah_buku+'"" >'+
      '<label class="text-left" for="input-jumlahp">Jumlah Pinjam</label>'+
      '<input type="text" id="input-jumlahp" class="form-control" value="'+jumlah_pinjam+'"" >'+
      '<label class="text-left" for="input-tgl">Tanggal Masuk</label>'+
      '<input type="text" id="input-tgl" class="form-control" value="'+tgl+'"" >'+
      '</div>',
      focusConfirm: false,
      preConfirm: () => {
        return {
          "id": document.getElementById('input-id').value,
          "nama" : document.getElementById('input-nama').value,
          "id_kategori": document.getElementById('input-jenis').value,
          "jumlahBuku" : document.getElementById('input-jumlahb').value,
          "jumlahPinjam": document.getElementById('input-jumlahp').value,
          "tgl" : document.getElementById('input-tgl').value
        }      
      },
      onOpen: function() {
        $('#input-tgl').datepicker({
          format: 'dd/mm/yyyy',
          uiLibrary: 'bootstrap4'
        });
  },

    })
    
    if (formValues) {
      inputEditData(formValues)
    }
  }


  const inputEditData = (dataInput) => {
    console.log(dataInput);
    $.ajax({
      url : 'http://localhost/Perpustakaan/buku/editBuku',
      type: 'POST',
      data: dataInput,
      success: function(){
        $('#tablekategori').DataTable().ajax.reload();
        alertBerhasil('Data Berhasil Diedit')
      },
      error: function() {
        alertError('Data Gagal Diedit');
        $('#tablekategori').DataTable().ajax.reload();
      }
    })
  }

  const saveData = (dataInput) => {
    console.log(dataInput);
    $.ajax({
      url : 'http://localhost/Perpustakaan/buku/insertBuku',
      type: 'POST',
      data: dataInput,
      success : function(){
        $('#tablekategori').DataTable().ajax.reload();
        alertBerhasil('Data Berhasil Disimpan')
      },
      error: function(xhr, status, error) {
        alertError('Data Gagal Disimpan');
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