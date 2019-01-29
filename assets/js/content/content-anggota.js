const inputNama = document.getElementById('cari');
const selectJurusan = document.getElementById('jurusan');
const selectKelas = document.getElementById('kelas');
const contentBawah = document.querySelector('.content-bawah');
const btnTambah = document.querySelector('.btn-tambah');
const tableData = document.querySelector('.table-data');
const btnKembaliInfo = document.querySelector('.btn-kembali-info');
const tblinfoAnggota = document.querySelector('.infoAnggota')





inputNama.addEventListener('input', () => {
    $.ajax({
        url: 'http://localhost/Perpustakaan/Murid/tampilSingleData?id='+inputNama.value+'&kelas='+selectKelas.value,
        data : {get_param : 'value'},
        dataType : 'json',
        success : (data) => {
            html = '';
            for (let i = 0; i < data.length; i++) {
                contentBawah.style.display = 'block';
                html = html + "<div class='bawah' onclick='bawah("+JSON.stringify(data[i])+", this)'>[ "+ +data[i].nisn +" ] "+data[i].Nama+"</div>"
            }
            contentBawah.innerHTML = html;
        }
    });
})

window.addEventListener('click', (eventWindow)=> {
    console.log(eventWindow.target.className)
    if ('bawah' != eventWindow.target.className) {
        contentBawah.style.display = 'none';
    }
})

let iidDataMuridd;
const bawah = (event) => {
    const cari = document.getElementById('cari');
    const nama = document.getElementById('nama');
    const nis = document.getElementById('nis');
    const nisn = document.getElementById('nisn');
    const tgl = document.getElementById('tgl');
    idDataMurid = event.Id_data_murid
    contentBawah.style.display = 'none';
    console.log(event)
    cari.value = event.Nama;
    nama.value = event.Nama;
    nis.value = event.nis;
    nisn.value = event.nisn;
    tgl.value = event.tanggal_lahir;
    
}

btnTambah.addEventListener('click', () => {
    console.log(idDataMurid);
    $.ajax({
        url: 'http://localhost/Perpustakaan/Anggota/insertAnggota',
        type : 'post',
        data : {
            "id_data_murid" : idDataMurid
        },
        success: () => {
            $('#tablekategori').DataTable().ajax.reload();
            alertBerhasil("Data Berhasil Ditambah");
        }
    })
});

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilJurusan',
    type :'POST',
    dataType : 'json', 
    data : {get_param: 'values'},
    success: (data)=>{
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement('option');
            option.value = data[i].id_jurusan;
            option.text = data[i].nama_jurusan;
            selectJurusan.appendChild(option);
        }
    }
});

selectJurusan.addEventListener('change', ()=>{
    $.ajax({
        url : 'http://localhost/Perpustakaan/Murid/tampilPivotKelas',
        type : 'POST',
        dataType: 'json',
        data: {"select" : selectJurusan.value},
        success : (data) => {
            const bersih = document.querySelectorAll('#kelas option');
            for (let i = 0; i < bersih.length; i++) {
                selectKelas.removeChild(bersih[i]) 
            } 
            for (let i = 0; i < data.length; i++) {
                    const option = document.createElement('option');
                    option.value = data[i].id_pivot_kelas;
                    option.text = data[i].jenjang + " " + data[i].grade;
                    selectKelas.appendChild(option)
            }
        }
    });
})

$('document').ready(function(){
    
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
            url: 'http://localhost/Perpustakaan/murid/tampilAnggota',
            dataSrc: ''
        },
        columns: [ 
            { "data": null, "width": "5%"},
            {"data": "id_anggota", "width": "15%"},
            {"data": "nisn", "width": "15%"},
            {"data" : "Nama", "width": "28%"},
            {"data" : null, "width": "16%",
                "render" : (data) => {
                    return data.jenjang + " " + data.grade;
                }
            },
            {"data": null, "width": "11%",
            defaultContent: '<i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i> <i id="info" class="fas fa-info rounded btn-aksi bg-info "> </i>'},
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
          let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
          const data = selectedRows.toArray()
          const id = data[0].id_anggota;
          
          alerthapus(id)
      });

      $('#tablekategori tbody').on('click', '#info', function(){
        let selectedRows = table.rows($(this).parents('tr')).data().to$();
        const data = selectedRows.toArray();

        infoAnggota(data);
      })

})


btnKembaliInfo.addEventListener('click', () => {
    tblinfoAnggota.style.display = 'none';
    tableData.style.display = 'block';
})

const infoAnggota = (data) => {
    tableData.style.display = 'none';
    $('.loader').css('display', 'block');
    $('.bg-content').css('height', '440px');
    setTimeout(function(){ tblinfoAnggota.style.display = 'block'; }, 1500);
    setTimeout(function () {$('.bg-content').css('height', 'auto')}, 1500)
    setTimeout(function(){ $('.loader').css('display', 'none'); },1500);
    
    
    
    
    const tampilqrcode = document.querySelector(".qrcode");
    const bungkus  = document.querySelector('.kananG');
    let idAnggota;
    for (let i = 0; i < data.length; i++) {

        console.log(data[i].id_anggota);
        console.log(tampilqrcode);
        if (tampilqrcode == undefined) { 
            const div = document.createElement('div');
            div.classList.add("qrcode");
            div.classList.add("mt-3");
            bungkus.appendChild(div);
            const qrcode = new QRCode(div, {
                text: data[i].id_anggota,
                width: 110,
                height: 110,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        }else {
            bungkus.removeChild(tampilqrcode);
            const div = document.createElement('div');
            div.classList.add("qrcode");
            div.classList.add("mt-3");
            bungkus.appendChild(div);
            const qrcode = new QRCode(div, {
                text: data[i].id_anggota,
                width: 110,
                height: 110,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        }
        $('.inamaM').html(data[i].Nama)
        $('.inisnM').html(data[i].nisn)
        $('.inisM').html(data[i].nis)
        $('.itmptL').html(data[i].tempat_lahir);
        $('.itglLM').html(data[i].tanggal_lahir);
        $('.ijurusan').html(data[i].nama_jurusan);
        $('.ikelas').html(data[i].jenjang +" " + data[i].grade);
        $('.iagama').html(data[i].nama_agama);
        $('.ijk').html(data[i].nama_jenis_kelamin);
        $('.inmrtelepon').html(data[i].nomor_handphone);
        idAnggota = data[i].id_anggota;
        
        $('.gmbrProfil').attr('src', 'http://localhost/Perpustakaan/assets/database_image/'+data[i].foto)
    }

    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
            "iStart" : oSettings._iDisplayStart,
            "iEEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal" : oSettings.fnRecordsTotal(),
            "iFilteredTotal" : oSettings.fnRecordsDisplay(),
            "iPage" : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages" : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        }
    }

    $('#tablePinjam').DataTable().clear().destroy();
    $('#tablePinjam').empty();

    let t = $('#tablePinjam').DataTable({
        ajax : {
            url: 'http://localhost/Perpustakaan/peminjaman/tampilHistoryPeminjaman?id='+idAnggota,
            dataSrc: '',
        },
        columns: [
            {"data" : null, "title": "#"},
            {"data": "id_pinjam", "width": "11%", "title": "ID"},
            {"data": "nama_buku", "width": "25%", "title": "Nama Buku"},
            {"data": "nama_jenis", "width": "14%", "title": "Kategori"},
            {"data" : "tanggal_pinjam", "width": "12%", "title": "Tgl Pinjam"},
            {"data": "tanggal_kembali", "width": "14%", "title": "Tgl Kembali"},
            {"data": "nama_status", "width": "13%", "title":"Status"},
            {"data": null, "width": "28%", "title":"Action",
                defaultContent: '<i class="fas fa-sync-alt rounded btn-aksi bg-edit" id="cStatus"></i>  <i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="deletePeminjaman" ></i>'
            }
        ],
        "columnDefs ": [{
            "searchable" : false,
            "orderable"  : false,
            "targets" : 0
        }],
        "order": [[1, 'asc']]
    })

    const table = $('#tablePinjam').DataTable();

    t.on('order.dt search.dt', function(){
        t.column(0, {search: 'applied', order:'applied'}).nodes().each(function (cell, i){
            cell.innerHTML = i +1;
        })
    }).draw();

    $('#tablePinjam tbody').on( 'click', '#deletePeminjaman', function () {
        let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
        const data = selectedRows.toArray()
        const id = data[0].id_pinjam;
        const idStatus = data[0].id_status;
        const idBuku = data[0].id_buku;
        
        alerthapusPeminjaman(id, idStatus, idBuku)
    });

    $('#tablePinjam tbody').on( 'click', '#cStatus', function () {
        let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
        const data = selectedRows.toArray()
        const id = data[0].id_pinjam;
        const idBuku = data[0].id_buku;
        
        alertChangeStatus(id, idBuku)
    });

}



const alerthapusPeminjaman = (id, idStatus, idBuku) => {
    console.log(idStatus);
    console.log(idBuku);
    const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling: true,
      })
      swalWithBootstrapButtons({
        title: 'Are you Sure ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText : 'Tidak',
        animation: false,
        customClass : 'animated zoomIn',
        reverseButtons : true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url : 'http://localhost/Perpustakaan/peminjaman/hapusPeminjaman',
                method: 'POST',
                data: {
                    "id" : id,
                    "idStatus" : idStatus,
                    "idBuku" : idBuku
                },
                success: () => {
                    $('#tablePinjam').DataTable().ajax.reload();
                    alertBerhasil("Data Berhasil Dihapus")
                },
                error : () => {
                    $('#tablePinjam').DataTable().ajax.reload();
                    alertGagal('Data Gagal Dihapus')
                }
            })
        }
    })
}

const alertChangeStatus = async (idPinjam, idBuku) => {
    console.log(idBuku)
    const {value : status} = await Swal({
        title : 'Pilih Status Peminjaman',
        input : 'select',
        inputOptions : {
            1 : 'Kembali',
            2 : 'Belum'
        },
        showCancelButton : true,
    })
    if (status) {
        $.ajax({
            url : 'http://localhost/Perpustakaan/peminjaman/editStatus',
            method : 'POST',
            data : {
                "idPinjam" : idPinjam,
                "idBuku" : idBuku,
                "idStatus" : status
            },
            success: () => {
                $('#tablePinjam').DataTable().ajax.reload();
                alertBerhasil("Data Berhasil Diedit")
            }
        })
    }
}

const alerthapus = (id) => {
    const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling: true
    })

    swalWithBootstrapButtons({
        title: 'Are you sure ?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Tidak',
        confirmButtonText: 'Hapus',
        animation: false,
        customClass: 'animated zoomIn',
    }).then((result)=>{
        if (result.value) {
            console.log(id);
            $.ajax({
                url: 'http://localhost/Perpustakaan/Anggota/hapusAnggota',
                type : 'post',
                data: {"id" : id},
                success :(data)=>{
                    console.log(data+"ini di ajax")
                    $('#tablekategori').DataTable().ajax.reload();
                    alertBerhasil("Data Berhasil Dihapus")
                },
                error: () => {
                    $('#tablekategori').DataTable().ajax.reload();
                    alertGagal("Data Gagal Dihapus")
                }   
            })
        }
    })
    
}

const alertBerhasil = (text) => {
    const toast = Swal.mixin({
        toast : true,
        position: 'top-end',
        showConfirmButton : false,
        timer: 3000
    })

    toast({
        type: 'success',
        title: text
    })
}

const alertGagal = (text) => {
    const toast = Swal.mixin({
        toast : true,
        position: 'top-end',
        showConfirmButton : false,
        timer: 3000
    })

    toast({
        type: 'error',
        title: text
    })
}