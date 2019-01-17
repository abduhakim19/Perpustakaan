<html>
<body style="width: 100%; height: 100%;">
    <div class="loading" style="width: 100%; height: 100%; background-color: white">Loading...</div>
    <table border="1" id="tablewow">
        <thead>
            <tr>
                <th>No</th>
                <th>Nis</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nama Buku</th>
                <th>Kategori</th>
                <th>tanggal pinjam</th>
                <th>tanggal kembali</th>
                <th>status</th>
            </tr>
        </thead>
    </table>
    <iframe id="txtArea1" style="display:none"></iframe>

    <script src="<?=BASE_URL?>/assets/jquery/jquery.js"></script>
    
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="<?=BASE_URL?>/assets/data-tables/datatables.min.js"></script>
        
    <script>
        let t = $('#tablewow').DataTable({
            "processing": true,
            "serverSide" : true,
            ajax : {
                url : "http://localhost/Perpustakaan/BackUp/tampil",
                dataSrc: 'data'
            },
            columns: [
                {"data": null,
                    "render": (data, type, row, meta)=> {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                {"data": "nis"},
                {"data": "nama"},
                {"data": null, 
                    "render": (data, type, row, meta) => {
                        return row['jenjang'] + " "+row['grade'];
                    }},
                {"data": "nama_buku"},
                {"data": "nama_kategori"},
                {"data": "tanggal_pinjam",
                    "render" : (data) => {
                    return  data.split("-").reverse().join('/');
                }},
                {"data": "tanggal_kembali", 
                    "render" : (data) => {
                    return  data.split("-").reverse().join('/');
                }},
                {"data": "status"}
            ],
            "searching": false,
            "ordering": false,
            "bPaginate": false,
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            }],
            "order": [[ 1, 'asc' ]],
            "initComplete": function(settings, json) {
                fnExcelReport();
                window.location = 'http://localhost/Perpustakaan/BackUp/hapus?ya=true';
            },
            "bInfo" : false
        })

        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    function fnExcelReport()
{
    var tab_text="<table border='2px'>";
    var textRange; var j=0;
    tab = document.getElementById('tablewow'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 
    sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
    </script>
</body>


</html>