
const selectJurusan = document.getElementById('jurusan');
const selectKelas = document.getElementById('kelas');
const inputNama = document.getElementById('inputNama');
const contentBawah = document.querySelector('.content-bawah');
const btnCari = document.querySelector('.btn-cari');
const btnExcel = document.querySelector('.btn-Excel');
const btnDoc = document.querySelector('.btn-Doc');

window.addEventListener('click', (event)=>{
    window.addEventListener('click', (eventWindow)=> {
        if ('bawah' != eventWindow.target.className) {
            contentBawah.style.display = 'none';
        }
        if ('bawah-buku' != eventWindow.target.className) {
            contentBawah.style.display = 'none';
        }
    })
})



$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilJurusan',
    type :'get',
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

let idNama, idBuku;
const bawah = (data) => {
    idNama = data.id_anggota
    contentBawah.style.display = 'none';
    inputNama.value = data.Nama;
}


    
let dataw;

btnCari.addEventListener('click', () => {
    
    if (idNama == undefined) {
        Swal({
            type : 'error',
            title : 'Error',
            text : 'Masukkan Nama yang Valid'
        })
    }else {

    $("#tablekategori").dataTable().fnDestroy();
    let t = $('#tablekategori').DataTable( {
        ajax: {
            url: 'http://localhost/Perpustakaan/peminjaman/tampilPeminjaman?id='+idNama,
            dataSrc: '',
        },
        columns: [ 
            { "data": null, "width": "2%"},
            {"data": "id_pinjam", "width": "11%"},
            {"data": "nama_buku", "width": "25%"},
            {"data": "nama_jenis", "width": "14%"},
            {"data": "tanggal_pinjam", "width": "12%"},
            {"data": "tanggal_kembali", "width": "13%"},
            {"data": "nama_status", "width": "14%"},
        ],
        "columnDefs": [ {
          "searchable": false,
          "orderable": false,
          "targets": 0
        }],
        "order": [[ 1, 'asc' ]],
      });


      $('#tablekategori').DataTable().ajax.reload();

      t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
          });
        }).draw();

        t.on('search.dt', function() {
            dataw = t.rows({filter: 'applied'}).data().to$();
        })
    }

})

btnExcel.addEventListener('click', () => {
    if (dataw === undefined) {
        alert('Masukkan data terlebih dahulu');
    }else {
        $.redirect('http://localhost/Perpustakaan/laporan/exportExcel', {data: dataw, id: idNama});
    }
})
btnDoc.addEventListener('click', () => {
    if (dataw === undefined) {
        alert('Masukkan data terlebih dahulu')
    }else{
        $.redirect('http://localhost/Perpustakaan/laporan/exportWord', {data: dataw, id: idNama});
    }
})
