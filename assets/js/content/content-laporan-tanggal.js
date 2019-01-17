const btnExcel = document.querySelector('.btn-Excel');
const btnDoc = document.querySelector('.btn-Doc');
const btnCari  = document.querySelector('.btn-cari');

$(document).ready(function(){
    $('#tglDari').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });
    
    $('#tglSampai').datepicker({
        format: 'dd/mm/yyyy',
        uiLibrary: 'bootstrap4'
    });
})

let dataw;
btnCari.addEventListener('click', ()=>{

    const tglDari = $('#tglDari').val();
    const tglSampai = $('#tglSampai').val();

    

    if(tglDari == '' || tglSampai == ''){
        Swal({
            type : 'error',
            title : 'Error',
            text : 'Masukkan Tanggal  Dahulu'
        })
    }else {
        $("#tablekategori").dataTable().fnDestroy();

    let t = $('#tablekategori').DataTable({
        ajax : {
            url: 'http://localhost/Perpustakaan/laporan/tampilLaporanTanggal?dari='+tglDari+'&sampai='+tglSampai,
            dataSrc: '',
        },
        columns: [
            {"data" : null},
            {"data": "id_pinjam", "width": "13%"},
            {"data": "nis", "width": "11%"},
            {"data": "Nama", "width": "23%"},
            {"data": "nama_buku", "width": "24%"},
            {"data": "nama_jenis", "width": "12%"},
            {"data" : "tanggal_pinjam", "width": "12%",
                "render" : (data) => {
                return  data.split("-").reverse().join('/');
              }},
            {"data": "tanggal_kembali", "width": "13%",
            "render" : (data) => {
                return  data.split("-").reverse().join('/');
              }        
            },
            {"data": "nama_status", "width": "4%"},
        ],
        "columnDefs ": [{
            "searchable" : false,
            "orderable"  : false,
            "targets" : 0
        }],
        "order": [[1, 'asc']]
    })

    t.on('order.dt search.dt', function(){
        t.column(0, {search: 'applied', order:'applied'}).nodes().each(function (cell, i){
            cell.innerHTML = i +1;
        })
    }).draw();

    t.on("search.dt", function () {
        dataw = t.rows({filter: 'applied'}).data().to$();
    })

    }
})

btnExcel.addEventListener('click', () => {
    if (dataw === undefined) {
        alert('Masukkan Data');
    }else{
        $.redirect('http://localhost/Perpustakaan/laporan/exportExcelTanggal', {data: dataw, dari: tglDari, sampai: tglSampai});
    }
})
btnDoc.addEventListener('click', () => {
    if (dataw === undefined) {
        alert('Masukkan Data');
    }else{
        $.redirect('http://localhost/Perpustakaan/laporan/exportWordTanggal', {data: dataw, dari: tglDari, sampai: tglSampai});
    }
})
