$(document).ready(function() {

    $('#poto').change( function(event) {
        $(".BPGambar img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
        $(".BPGambar").css({display: 'block'})
    });

    $('#epoto').change( function(event) {
        $(".EBPGambar img").fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
    });

    $('#tanggalL').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#tanggalLIbu').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#tanggalLAyah').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#tanggalLWali').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#etanggalL').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#etanggalLIbu').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#etanggalLAyah').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });

    $('#etanggalLWali').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });
    


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
        "processing" : true,
        "language" : {
            processing: '<span>Loading...</span></i>'
        },
        ajax: {
            url: 'http://localhost/Perpustakaan/Murid/tampilDataMuridTabel',
            dataSrc: ''
        },
        columns: [ 
            { "data": null, "width": "2%"},
            {"data": "nis", "width": "11%"},
            {"data": "nisn", "width": "13%"},
            {"data": "Nama", "width": "22%"},
            {"data": "nama_jurusan", "width": "18%"},
            {"data": null, "width": "9%",
                "render": (data, type, row, meta )=>{
                    return row["jenjang"] + " " + row["grade"];
                }},
            {"data": null, "width": "11%", 
                "render": (data, type, row, meta) => {
                    return row['tanggal_lahir'].split("-").reverse().join("/");
                }},
            {"data": null, "width": "19%",
            defaultContent: '<i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i> <i class="fas fa-edit rounded btn-aksi bg-edit" id="edit"></i> <i id="info" class="fas fa-info rounded btn-aksi bg-info "></i>'},
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

        $('#tablekategori tbody').on( 'click', '#info', function () {
            let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
            const data = selectedRows.toArray()
            const idData = data[0]['Id_data_murid'];
            tampilInfo(idData);
        });

        $('#tablekategori tbody').on( 'click', '#edit', function () {
            let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
            const data = selectedRows.toArray()
            const idData = data[0]['Id_data_murid'];

            tampilEdit(idData);
        });

        $('#tablekategori tbody').on( 'click', '#delete', function () {
            let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
            const data = selectedRows.toArray()
            const id = data[0]['Id_data_murid'];
            const poto = data[0]['foto'];
            console.log(id);
            console.log(poto);
            alertHapus(id , poto)
        });
});

const btnSubmit = document.getElementById('btn-submit');
const btnTambah = document.querySelector('.btn-tambah');
const inputMurid = document.querySelector('.input-murid');
const dataMurid = document.querySelector('.data');
const info = document.querySelector('.info');
const selectJurusan = document.querySelector('#jurusan');
const selectKelamin = document.getElementById('jk');
const selectKelas = document.querySelector('#Kelas');
const selectAgama = document.getElementById('agama');
const selectPendidikan = document.getElementsByClassName('selectPendidikan');
const selectPenghasilan = document.getElementsByClassName('selectPenghasilan');
const btnKembaliInfo = document.querySelector('.btn-kembali-info');



btnTambah.addEventListener('click', () => {
    inputMurid.style.display = 'block';
    dataMurid.style.display = 'none';
})

btnKembaliInfo.addEventListener('click', ()=>{
    info.style.display = 'none';
    dataMurid.style.display = 'block';
})

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilJurusan',
    type: 'POST',
    data: {get_param : 'value'},
    dataType: 'json',
    success : (data) => {
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement("option");
            option.value = data[i].id_jurusan;
            option.text = data[i].nama_jurusan;
            selectJurusan.appendChild(option);
        }
    }

})

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilJenisK',
    type: 'POST',
    data: {get_param : 'value'},
    dataType: 'json',
    success : (data) => {
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement("option");
            option.value = data[i].id_jenis_kelamin;
            option.text = data[i].nama_jenis_kelamin;
            selectKelamin.appendChild(option);
        }
    }

})

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilAgama',
    type: 'POST',
    data: {get_param : 'value'},
    dataType: 'json',
    success : (data) => {
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement("option");
            option.value = data[i].id_agama;
            option.text = data[i].nama_agama;
            selectAgama.appendChild(option);
        }
    }

})

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilPenghasilan',
    type : 'POST',
    data: {get_param : 'value'},
    dataType : 'json',
    success : (data) => {
        for (let i = 0; i < data.length; i++) {            
            for (let a = 0; a < selectPenghasilan.length; a++) {
                const option = document.createElement("option");
                option.value = data[i].id_penghasilan;
                option.text = data[i].nama_penghasilan;
                selectPenghasilan[a].appendChild(option);   
            }     
        }
    }
})

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilPendidikan',
    type: 'POST',
    data : {get_param : 'value'},
    dataType : 'json',
    success: (data) => {
        
        for (let i = 0; i < data.length; i++) {            
            for (let a = 0; a < selectPendidikan.length; a++) {
                const option = document.createElement("option");
                option.value = data[i].id_pendidikan;
                option.text = data[i].nama_pendidikan;
                selectPendidikan[a].appendChild(option);   
            }     
        }
    },
})

selectJurusan.addEventListener('change', () => {
    console.log(selectJurusan.value);
    $.ajax({
        url : 'http://localhost/Perpustakaan/Murid/tampilPivotKelas',
        type: 'POST',
        data: {"select" : selectJurusan.value},
        dataType: 'json',
        success : (data) => {
                const bersih = document.querySelectorAll('#Kelas option');
                for (let i = 0; i < bersih.length; i++) {
                    selectKelas.removeChild(bersih[i]) 
                } 
            for (let i = 0; i < data.length; i++) {
                    const option = document.createElement("option");
                    option.value = data[i].id_pivot_kelas;
                    option.text = data[i].jenjang + " " + data[i].grade;
                    selectKelas.appendChild(option);
            }
        }
    
    })
})

const tampilEdit = (id) => {
    $('.data').css("display", "none");

    $('.loader').css('display', 'block');
    $('.bg-content').css('height', '440px');

    setTimeout(function(){ $(".edit-murid").css("display","block"); }, 1500);
    setTimeout(function () {$('.bg-content').css('height', 'auto')}, 1500)
    setTimeout(function(){ $('.loader').css('display', 'none'); },1500);
    $.ajax({
        url: 'http://localhost/Perpustakaan/Murid/tampilDataMurid',
        type: 'GET',
        data: {"id": id},
        dataType: 'json',
        success : (data) => {
            for (let i = 0; i < data.length; i++) {
                //Murid
        $('#eid').val(data[i].id)
        $('#enama').val(data[i].murid.nama)
        $('#enisn').val(data[i].murid.nisn)
        $('#enis').val(data[i].murid.nis)
        $('#etempatL').val(data[i].murid.tempat_lahir);
        tglM = data[i].murid.tanggal_lahir.split("-").reverse().join('/');
        $('#etanggalL').val(tglM);
        $('#eAlamat').val(data[i].alamat.alamat);
        $('#eKelurahan').val(data[i].alamat.kelurahan);
        $('#eKecamatan').val(data[i].alamat.kecamatan);
        $('#eKota').val(data[i].alamat.kota);
        $('#eProvinsi').val(data[i].alamat.provinsi);
        $('#ekdPos').val(data[i].alamat.kode_pos);
        $('#ekewarganegaraan').val(data[i].murid.warganegara);
        $('#enomorH').val(data[i].murid.nomor_handphone);
        $('#etinggiB').val(data[i].murid.tinggi_badan);
        $('#eberatB').val(data[i].murid.berat_badan);
        console.log(data[i].murid.foto);
        $('.EPGambar').attr('src', 'http://localhost/Perpustakaan/assets/database_image/'+data[i].murid.foto)


        let idAgama = data[i].murid.agama.id_agama
        let idJk = data[i].murid.jenis_kelamin.id_jk;
        const selectAgama = document.getElementById('eagama');
        const selectJenisK = document.getElementById('ejk');
        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilAgama',
            type: 'post',
            dataType: 'json',
            data : {get_params: 'values'},
            success : (agama) => {
                for (let i = 0; i < agama.length; i++) {
                    const option = document.createElement('option');
                    option.value = agama[i].id_agama;
                    option.text = agama[i].nama_agama;
                    if (idAgama == agama[i].id_agama) {
                        option.setAttribute('selected', 'selected')
                    }
                    selectAgama.appendChild(option);   
                }
            }
        })

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilJenisK',
            type: 'post',
            dataType: 'json',
            data : {get_params: 'values'},
            success : (JK) => {
                for (let i = 0; i < JK.length; i++) {
                    const option = document.createElement('option');
                    option.value = JK[i].id_jenis_kelamin;
                    option.text = JK[i].nama_jenis_kelamin;
                    if (idJk == JK[i].id_jenis_kelamin) {
                        option.setAttribute('selected', 'selected')
                    }
                    selectJenisK.appendChild(option);   
                }
            }
        })

        //Ibu
        $('#enamaIbu').val(data[i].ibu.nama);
        $('#enikIbu').val(data[i].ibu.nik);
        tglIbu = data[i].ibu.tanggal_lahir.split("-").reverse().join('/');
        $('#etanggalLIbu').val(tglIbu);
        $('#epekerjaanIbu').val(data[i].ibu.pekerjaan);
        $('#enomorHIbu').val(data[i].ibu.nomor_handphone);

        let idPendidikanIbu = data[i].ibu.pendidikan.id;
        let idPenghasilanIbu = data[i].ibu.penghasilan.id;
        let idJurusan = data[i].murid.jurusan.jurusan;
        let idKelas = data[i].murid.jurusan.id_pivot;

        const selectJurusan = document.getElementById('ejurusan');
        const selectKelas = document.getElementById('eKelas');

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampiljurusan',
            type : 'post',
            dataType : 'json',
            success : (jurusan) => {
                console.log(idJurusan);
                for (let i = 0; i < jurusan.length; i++) {
                    const option = document.createElement('option');
                    option.text = jurusan[i].nama_jurusan
                    option.value = jurusan[i].id_jurusan;
                    if (idJurusan == jurusan[i].nama_jurusan) {
                        option.setAttribute('selected', 'selected');
                    }
                    selectJurusan.appendChild(option)
                }
            }  
        })
        console.log(selectJurusan.value);
        $.ajax({
            url : 'http://localhost/Perpustakaan/Murid/tampilPivotKelasAll',
            type : 'post',
            dataType:'json',
            success: (kelas) => {
                    for (let i = 0; i < kelas.length; i++) {
                        if (kelas[i].nama_jurusan == idJurusan) {
                            const option = document.createElement('option');
                            option.value = kelas[i].id_pivot_kelas;
                            option.text = kelas[i].jenjang + " " + kelas[i].grade;
                            if (idKelas == kelas[i].id_pivot_kelas) {
                                option.setAttribute('selected', 'selected');
                            }
                            selectKelas.appendChild(option)   
                        }
                    } 
            }
        })

        selectJurusan.addEventListener('change', ()=>{
            $.ajax({
                url : 'http://localhost/Perpustakaan/Murid/tampilPivotKelas',
                type : 'post',
                data : {"select": selectJurusan.value},
                dataType:'json',
                success: (kelas) => {
                    const bersih = document.querySelectorAll('#eKelas option');
                    for (let i = 0; i < bersih.length; i++) {
                        selectKelas.removeChild(bersih[i])
                    }

                    for (let i = 0; i < kelas.length; i++) {
                            const option = document.createElement('option');
                            option.value = kelas[i].id_pivot_kelas;
                            option.text = kelas[i].jenjang + " " + kelas[i].grade;
                            selectKelas.appendChild(option)
                    }
                }
            })
        })
        

        const selectPendidikanIbu = document.getElementById('ependidikanIbu');
        const selectPenghasilanIbu = document.getElementById('epenghasilanIbu');

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPendidikan',
            type :'post',
            dataType: 'json',
            success : (pendidikan) => {
                for (let i = 0; i < pendidikan.length; i++) {
                    const option = document.createElement('option');
                    option.text = pendidikan[i].nama_pendidikan;
                    option.value = pendidikan[i].id_pendidikan;
                    if (idPendidikanIbu == pendidikan[i].id_pendidikan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPendidikanIbu.appendChild(option)
                }
            }
        })

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPenghasilan',
            type :'post',
            dataType: 'json',
            success : (penghasilan) => {
                for (let i = 0; i < penghasilan.length; i++) {
                    const option = document.createElement('option');
                    option.text = penghasilan[i].nama_penghasilan;
                    option.value = penghasilan[i].id_penghasilan;
                    if (idPenghasilanIbu == penghasilan[i].id_penghasilan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPenghasilanIbu.appendChild(option)
                }
            }
        })

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPendidikan',
            type :'post',
            dataType: 'json',
            success : (pendidikan) => {
                for (let i = 0; i < pendidikan.length; i++) {
                    const option = document.createElement('option');
                    option.text = pendidikan[i].nama_pendidikan;
                    option.value = pendidikan[i].id_pendidikan;
                    if (idPendidikanAyah == pendidikan[i].id_pendidikan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPendidikanAyah.appendChild(option)
                }
            }
        })

        //Ayah
        $('#enamaAyah').val(data[i].ayah.nama);
        $('#enikAyah').val(data[i].ayah.nik);
        tglAyah = data[i].ayah.tanggal_lahir.split("-").reverse().join('/');
        $('#etanggalLAyah').val(tglAyah);
        $('#epekerjaanAyah').val(data[i].ayah.pekerjaan);
        $('#enomorHAyah').val(data[i].ayah.nomor_handphone);

        let idPendidikanAyah = data[i].ayah.pendidikan.id;
        let idPenghasilanAyah = data[i].ayah.penghasilan.id;

        const selectPendidikanAyah = document.getElementById('ependidikanAyah');
        const selectPenghasilanAyah = document.getElementById('epenghasilanAyah');

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPendidikan',
            type :'post',
            dataType: 'json',
            success : (pendidikan) => {
                for (let i = 0; i < pendidikan.length; i++) {
                    const option = document.createElement('option');
                    option.text = pendidikan[i].nama_pendidikan;
                    option.value = pendidikan[i].id_pendidikan;
                    if (idPendidikanAyah == pendidikan[i].id_pendidikan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPendidikanAyah.appendChild(option)
                }
            }
        })

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPenghasilan',
            type :'post',
            dataType: 'json',
            success : (penghasilan) => {
                for (let i = 0; i < penghasilan.length; i++) {
                    const option = document.createElement('option');
                    option.text = penghasilan[i].nama_penghasilan;
                    option.value = penghasilan[i].id_penghasilan;
                    if (idPenghasilanAyah == penghasilan[i].id_penghasilan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPenghasilanAyah.appendChild(option)
                }
            }
        })


        //Wali
        $('#enamaWali').val(data[i].wali.nama);
        $('#enikWali').val(data[i].wali.nik);
        tglWali = data[i].wali.tanggal_lahir.split("-").reverse().join('/');
        $('#etanggalLWali').val(tglWali);
        $('#epekerjaanWali').val(data[i].wali.pekerjaan);
        $('#enomorHWali').val(data[i].wali.nomor_handphone);

        let idPendidikanWali = data[i].wali.pendidikan.id;
        let idPenghasilanWali = data[i].wali.penghasilan.id;

        const selectPendidikanWali = document.getElementById('ependidikanWali');
        const selectPenghasilanWali = document.getElementById('epenghasilanWali');

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPendidikan',
            type :'post',
            dataType: 'json',
            success : (pendidikan) => {
                for (let i = 0; i < pendidikan.length; i++) {
                    const option = document.createElement('option');
                    option.text = pendidikan[i].nama_pendidikan;
                    option.value = pendidikan[i].id_pendidikan;
                    if (idPendidikanWali == pendidikan[i].id_pendidikan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPendidikanWali.appendChild(option)
                }
            }
        })

        $.ajax({
            url : 'http://localhost/Perpustakaan/murid/tampilPenghasilan',
            type :'post',
            dataType: 'json',
            success : (penghasilan) => {
                console.log(penghasilan);
                for (let i = 0; i < penghasilan.length; i++) {
                    const option = document.createElement('option');
                    option.text = penghasilan[i].nama_penghasilan;
                    option.value = penghasilan[i].id_penghasilan;
                    if (idPenghasilanWali == penghasilan[i].id_penghasilan) {
                        option.setAttribute('selected', 'selected');
                    }   
                    selectPenghasilanWali.appendChild(option)
                }
            }
        })      
            }
        }

    })
}

const tampilInfo = (id) => {
    $('.data').css("display", "none");

    $('.loader').css('display', 'block');
    $('.bg-content').css('height', '440px');

    setTimeout(function(){ $(".info").css("display","block"); }, 1500);
    setTimeout(function () {$('.bg-content').css('height', 'auto')}, 1500)
    setTimeout(function(){ $('.loader').css('display', 'none'); },1500);
    $.ajax({
        url: 'http://localhost/Perpustakaan/Murid/tampilDataMurid',
        type: 'GET',
        data: {"id": id},
        dataType: 'json',
        success : (data) => {
            for (let i = 0; i < data.length; i++) {
                $('.inamaM').html(data[i].murid.nama)
                $('.inisnM').html(data[i].murid.nisn)
                $('.inisM').html(data[i].murid.nis)
                $('.itmptL').html(data[i].murid.tempat_lahir);
                $('.itglLM').html(data[i].murid.tanggal_lahir);
                $('.ialamat').html(data[i].alamat.alamat);
                $('.ikelurahan').html(": "+data[i].alamat.kelurahan);
                $('.ikecamatan').html(": "+data[i].alamat.kecamatan);
                $('.ikota').html(": "+data[i].alamat.kota);
                $('.iprovinsi').html(": "+data[i].alamat.provinsi);
                $('.ikdpos').html(": "+data[i].alamat.kode_pos);
                $('.ijurusan').html(data[i].murid.jurusan.jurusan);
                $('.ikelas').html(data[i].murid.jurusan.kelas.jenjang +" " + data[i].murid.jurusan.kelas.grade);
                const idAgama = data[i].murid.agama.id_agama
                const iJk = data[i].murid.jenis_kelamin.id_jk
                $.ajax({
                    url : 'http://localhost/Perpustakaan/murid/tampilAgama',
                    method : 'POST',
                    dataType : 'json',
                    data : {get_params : 'values'},
                    success : (data) => {
                        for (let i = 0; i < data.length; i++) {
                            if (idAgama == data[i].id_agama) {
                                $('.iagama').html(data[i].nama_agama);
                            }
                            
                        }
                    }
                })
                console.log(iJk)
                $.ajax({
                    
                    url : 'http://localhost/Perpustakaan/murid/tampilJenisK',
                    method : 'POST',
                    dataType : 'json',
                    data : {get_params : 'values'},
                    success : (datai) => {
                        for (let i = 0; i < datai.length; i++) {
                            console.log(datai[i].id_jenis_kelamin)
                            if ( iJk == datai[i].id_jenis_kelamin) {
                                $('.ijk').html(datai[i].nama_jenis_kelamin);
                            }
                            
                        }
                    },
                    error : () => {
                        console.log('error');
                    }
                })
        
                
                
                $('.inmrtelepon').html(data[i].murid.nomor_handphone);
                $('.iwn').html(data[i].murid.warganegara);
                $('.ibb').html(data[i].murid.berat_badan);
                $('.itb').html(data[i].murid.tinggi_badan);
                $('.gmbrProfil').attr('src', 'http://localhost/Perpustakaan/assets/database_image/'+data[i].murid.foto)
        
                //Orang Tua
                //Ibu
                $('.inamaIbu').html(data[i].ibu.nama);
                $('.inikIbu').html(data[i].ibu.nik);
                $('.itglLIbu').html(data[i].ibu.tanggal_lahir);
                $('.inpendIbu').html(data[i].ibu.pendidikan.nama);
                $('.ipekIbu').html(data[i].ibu.pekerjaan);
                $('.ipengIbu').html(data[i].ibu.penghasilan.nama);
                $('.inmrIbu').html(data[i].ibu.nomor_handphone);
        
                //Bapak
                $('.inamaBapak').html(data[i].ayah.nama);
                $('.inikBapak').html(data[i].ayah.nik);
                $('.itglLBapak').html(data[i].ayah.tanggal_lahir);
                $('.ipendBapak').html(data[i].ayah.pendidikan.nama);
                $('.ipekBapak').html(data[i].ayah.pekerjaan);
                $('.ipengBapak').html(data[i].ayah.penghasilan.nama);
                $('.inmrBapak').html(data[i].ayah.nomor_handphone);
        
                //Wali
                $('.inamaWali').html(data[i].wali.nama);
                $('.inikWali').html(data[i].wali.nik);
                $('.itglLWali').html(data[i].wali.tanggal_lahir);
                $('.inpendWali').html(data[i].wali.pendidikan.nama);
                $('.ipekWali').html(data[i].wali.pekerjaan);
                $('.ipengWali').html(data[i].wali.penghasilan.nama);
                $('.inmrWali').html(data[i].wali.nomor_handphone);
            }
        }
    })
}

const alertHapus = (id ,poto) => {
    console.log(id);
    const swalWithBootstrap = Swal.mixin({
        buttonsStyling: true
    })

    swalWithBootstrap({
        title : 'Are you Sure ?',
        text : "You won't be able to revert this",
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
                url :'http://localhost/Perpustakaan/Murid/hapusMurid',
                method: 'POST',
                data: {
                    "id":id,
                    "gambar" : poto
                },
                success : function(data){
                    $('#tablekategori').DataTable().ajax.reload();
                    alertBerhasil("Data Berhasil Dihapus")
                },
                error: ()=>{
                    $('#tablekategori').DataTable().ajax.reload();
                    alertGagal("Data Gagal Dihapus cek masih anggota atau bukan")
                }
            })
        }
    })
}


const alertBerhasil = (text)=>{
    const toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 4000
    })

    toast({
        type: 'success',
        title: text
    })
}

const alertGagal = (text)=>{
    const toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })

    toast({
        type: 'error',
        title: text
    })
}