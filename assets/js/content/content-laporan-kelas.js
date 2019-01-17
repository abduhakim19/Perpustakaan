const btnnCari = document.querySelector('.btn-cari');
const selectJurusan = document.getElementById('jurusan');
const selectKelas = document.getElementById('kelas');
const btnWord = document.querySelector('.btn-Doc');
const btnExcel = document.querySelector('.btn-Excel'); 

$.ajax({
    url : 'http://localhost/Perpustakaan/Murid/tampilJurusan',
    type: 'post',
    dataType: 'json',
    success: (data) => {
        for (let i = 0; i < data.length; i++) {
            const option = document.createElement('option');
            option.value = data[i].id_jurusan;
            option.text = data[i].nama_jurusan;
            selectJurusan.appendChild(option)
        }
    }
})

selectJurusan.addEventListener('change', ()=>{
    $.ajax({
        url: 'http://localhost/Perpustakaan/Murid/tampilPivotKelas',
        type: 'post',
        dataType: 'json',
        data : {'select': selectJurusan.value},
        success: (data) => {
            const bersih = document.querySelectorAll('#kelas option');
            for (let i = 0; i < bersih.length; i++) {
                selectKelas.removeChild(bersih[i]);
                
            }
            for (let i = 0; i < data.length; i++) {
                const option = document.createElement('option');
                option.value = data[i].id_kelas;
                option.text = data[i].jenjang + " "+data[i].grade;
                selectKelas.appendChild(option);
            }
        }
    })
});
let dataw, kelasw;
btnnCari.addEventListener('click', ()=>{
    if(selectJurusan.value === " "){
        alert('Masukkan Jurusan');
    }else{
        console.log(selectKelas.value);
        $('#tablekelas').DataTable().clear().destroy();
        $('#tablekelas').empty();

        let t = $('#tablekelas').DataTable({
            ajax: {
                url: 'http://localhost/Perpustakaan/Laporan/tampilPeminjamanKelas?kelas='+selectKelas.value,
                dataSrc: '',
            },
            columns: [
                {"data": null, "title": "#"},
                {"data": "nis", "title": "Nis"},
                {"data":"Nama", "title": "Nama"},
                {"data": "nama_buku", "title": "Nama Buku"},
                {"data": "nama_jenis", "title": "Kategori"},
                {"data": "nama_status", "title": "Status"},
            ],
            "columnDefs": [{
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [[1, 'asc']]
        });

        t.on('order.dt search.dt', function(){
            t.column(0, {search: 'applied', order:'applied'}).nodes().each(
                function (cell, i) {
                    cell.innerHTML =i+1;
            })
        }).draw;

        t.on("search.dt", function(){
            dataw = t.rows({filter: 'applied'}).data().to$();
        })
    }

    kelasw = $('#kelas option:selected').html();
})


btnWord.addEventListener('click', () => {
    if (dataw === undefined) {
        alert('Masukkan data terlebih dahulu');
    }else{
        $.redirect('http://localhost/Perpustakaan/laporan/exportWordKelas', {data : dataw, kelas: kelasw});
    }
})

btnExcel.addEventListener('click', () => {
    if (dataw === undefined) {
        alert('Masukkan data terlebih dahulu');
    }else{
        $.redirect('http://localhost/Perpustakaan/laporan/exportExcelKelas', {data : dataw, kelas: kelasw});
    }
})
