const selectJurusan = document.getElementById('jurusan');
const selectKelas = document.getElementById('kelas');
const inputNama = document.getElementById('cNama');
const inputBuku = document.getElementById('cariBuku');
const btnPinjam = document.querySelector('.btnPinjam');
const contentBawah = document.querySelector('.content-bawah')
const tglPinjam = document.getElementById('tglPin');
const contentBawahBuku  = document.querySelector('.content-bawahBuku');
const selectWaktu = document.getElementById('selectWaktu');

window.setTimeout(() => {
    let tanggal = new Date();
    let mon = tanggal.getMonth() + 1;
    if (mon.toString().length < 2) {
        mon = "0"+mon;
    }

    let dat = tanggal.getDate();
    if (dat.toString().length < 2) {
        dat = "0"+dat
    }
    tglPinjam.value = dat + "/" +mon+"/"+tanggal.getFullYear();
}, 1000)

window.addEventListener('click', (event)=>{
    window.addEventListener('click', (eventWindow)=> {
        if ('bawah' != eventWindow.target.className) {
            contentBawah.style.display = 'none';
        }
        if ('bawah-buku' != eventWindow.target.className) {
            contentBawahBuku.style.display = 'none';
        }
    })
})
inputNama.addEventListener('input', () => {
    $.ajax({
        url: 'http://localhost/Perpustakaan/Peminjaman/tampilDataAnggota?id='+inputNama.value+'&kelas='+selectKelas.value,
        data : {get_params: 'values'},
        dataType : 'json',
        success : (data)=> {
            html = '';
            for (let i = 0; i < data.length; i++) {
                contentBawah.style.display = 'block';
                html = html +  "<div class='bawah' onclick='bawah("+JSON.stringify(data[i])+")'>[ "+ data[i].nisn +" ] "+data[i].Nama+"</div>";
            }
            return contentBawah.innerHTML = html;
        }
    })
})

inputBuku.addEventListener('input', () => {
    $.ajax({
        url: 'http://localhost/Perpustakaan/buku/tampilBuku?id='+inputBuku.value,
        data: {get_params: 'values'},
        dataType : 'json',
        success : (data)=> {
            html = '';
            for (let i = 0; i < data.length; i++) {
                contentBawahBuku.style.display = 'block';
                html = html+  "<div class='bawah-buku' onclick='bawahBuku("+JSON.stringify(data[i])+")'>"+data[i].nama_buku+"</div>";
                
            }
            return contentBawahBuku.innerHTML = html;
        }
    })
})


$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilJurusan',
    type :'post',
    dataType : 'json',
    data : {get_params: 'values'},
    success : (data) => {
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement('option');
            option.value = data[i].id_jurusan;
            option.text = data[i].nama_jurusan;
            selectJurusan.appendChild(option)
        }
    }
})

$.ajax({
    url : 'http://localhost/Perpustakaan/buku/tampilWaktu',
    type: 'post',
    dataType : 'json',
    data : {get_params: 'values'},
    success : (data) => {
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement('option')
            option.value = data[i].lama_waktu_hari;
            option.text = data[i].rinciwaktu.tahun + " thn" + data[i].rinciwaktu.bulan + " bulan "+ data[i].rinciwaktu.hari + " hari"
            selectWaktu.appendChild(option);
        }
    }
})

selectJurusan.addEventListener('change', () => {
    $.ajax({
        url : 'http://localhost/Perpustakaan/Murid/tampilPivotKelas',
        type : 'post',
        dataType : 'json',
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
    })
})

let idNama, idBuku;
const bawah = (data) => {
    const nistxt = document.getElementById('nis');
    const nisntxt = document.getElementById('nisn');
    const namatxt = document.getElementById('nama');

    idBuku = data.id_buku;
    idNama = data.id_anggota
    nistxt.value = data.nis;
    nisntxt.value = data.nisn;
    namatxt.value = data.Nama;
    contentBawah.style.display = 'none';
    inputNama.value = data.Nama;
    idNama = data.id_anggota;
}
const kategori = document.getElementById('kategoritxt');
const bawahBuku = (data) => {
    
    contentBawahBuku.style.display = 'none';
    
    kategori.value  = data.id_buku;
    inputBuku.value = data.nama_buku;
}

    
    $('.btnCari').on('click', function() {
        console.log(idNama);
        if (idNama == undefined) {
            Swal({
                type : 'error',
                title : 'Error',
                text : 'Masukkan Nama yang Valid'
            })
        }else {
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
    
        $('#tablekategori').DataTable().clear().destroy();
        $('#tablekategori').empty();

        let t = $('#tablekategori').DataTable( {
            ajax: {
                url: 'http://localhost/Perpustakaan/peminjaman/tampilPeminjaman?id='+idNama,
                dataSrc: '',
            },
            columns: [ 
                { "data": null,
                    "title": "#"},
                {"data": "id_pinjam", "width": "11%", "title": "ID"},
                {"data": "nama_buku", "width": "22%", "title": "Nama Buku"},
                {"data": "nama_jenis", "width": "13%", "title": "Kategori"},
                {"data": "tanggal_pinjam", "width": "12%", "title": "Tgl Pinjam",
                "render": (data) => {
                    return data.split("-").reverse().join("/");
                }
                },
                {"data": "tanggal_kembali", "width": "12%", "title": "Tgl Kembali",
                "render": (data)=>{
                    return data.split("-").reverse().join("/")
                }},
                {"data": "nama_status", "width": "10%", "title": "Status"},
                {"data": null , "width": "10%", "title": "Denda",
                    "render": (data) => {
                        if (parseInt(data.id_status) === 1) {
                            return "Rp. " + data.denda
                        } else{
                            const oneday = 24*60*60*1000;
                            const datePinjam = data.tanggal_kembali.split('-').join(',');

                            const datePreal = new Date(datePinjam);
                            const dateNreal = new Date();
                            const jarak  = Math.round((dateNreal.getTime() - datePreal.getTime()) / (oneday));
                            if (jarak <= 0) {
                                return "Rp. 0";
                            } else {
                                const cari =   jarak / data.jangka ;
                                return "Rp. " +(Math.floor(cari) + 1) * parseInt(data.harga);
                            }
                        }
                    }},
                {"data": null, "width": "22%", "title" : "Action",
                defaultContent: '<i class="fas fa-sync-alt rounded btn-aksi bg-edit" id="cStatus"></i>  <i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i>'},
            ],
            "columnDefs": [ {
              "searchable": false,
              "orderable": false,
              "targets": 0
            }],
            "order": [[ 1, 'asc' ]],
          });
    
    
          const table = $('#tablekategori').DataTable();
          

          t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
              });
            }).draw();

            $('#tablekategori tbody').on( 'click', '#delete', function () {
                let selectedRows = t.rows( $(this).closest("tr") ).data()
                const data = selectedRows.toArray()
                const id = data[0].id_pinjam;
                const idStatus = data[0].id_status;
                const idBuku = data[0].id_buku;

                alerthapus(id, idStatus, idBuku)
            });

            $('#tablekategori tbody').on( 'click', '#cStatus', function () {
                let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
                const data = selectedRows.toArray()
                const id = data[0].id_pinjam;
                const idBuku = data[0].id_buku;
                
                alertChangeStatus(id, idBuku)
            });
            
            
        }
        
    })


btnPinjam.addEventListener('click', () => {
    if(idNama == undefined){
        Swal({
            type : 'error',
            title : 'Error',
            text : 'Harap Masukkan Nama dahulu'
        })
    }else {
        const waktu = selectWaktu.value
        let result = new Date();
        result.setDate(result.getDate() + parseInt(waktu));
        const formatDate = (result) => {
            var d = new Date(result),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        
            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;
        
            return [year, month, day].join('-');
        }
        console.log(idNama)
        $.ajax({
            url : 'http://localhost/Perpustakaan/peminjaman/insertPeminjaman',
            type : 'POST',
            data : {
                "id_buku" : kategori.value,
                "id_anggota" : idNama,
                "tgl_kembali" : formatDate(result)
            },
            success : (data) => {
                kategori.value = '';
                inputBuku.value ='';
               if (data == 'sudahfull') {
                    Swal(
                        'Limit Pemnjaman',
                        'Ekspor data Peminjaman Karena Sudah melebihi batas',
                        'error'
                    );
               }else{
                    $('#tablekategori').DataTable().ajax.reload();
                    alertBerhasil('Data Berhasil Disimpan');
               }
               
            },
            error: () => {
                $('#tablekategori').DataTable().ajax.reload();
                alertGagal('Data Gagal Disimpan')
            }
        })
    }
    
})


const alerthapus = (id, idStatus, idBuku) => {
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
                    $('#tablekategori').DataTable().ajax.reload();
                    alertBerhasil("Data Berhasil Dihapus")
                },
                error : () => {
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
            success: (data) => {
                console.log(data);
                $('#tablekategori').DataTable().ajax.reload();
                alertBerhasil("Data Berhasil Diedit")
            },
            error : () => {
                $('#tablekategori').DataTable().ajax.reload();
                alertGagal("Data Gagal Diedit")
            }
        })
    }
}


const alertBerhasil = (text) => {
    const toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })

    toast({
        type: 'success',
        title : text
    })
}

const alertGagal = (text) => {
    const toast = Swal.mixin({
        toast : true,
        position: 'top-end',
        showConfirmButton: false,
        timer : 3000
    })

    toast({
        type: 'error',
        title: text
    })
}