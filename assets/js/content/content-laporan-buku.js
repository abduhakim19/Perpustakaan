const btnWordAll = document.querySelector('.btn-word-All');
const btnExcelAll = document.querySelector('.btn-excel-All');
const btnWordKat = document.querySelector('.btn-word-Kat');
const btnExcelKat = document.querySelector('.btn-excel-Kat');
const select = document.getElementById('input-jenis');

btnWordAll.addEventListener('click', () => {
    window.location = 'http://localhost/Perpustakaan/laporan/exportWordBukuAll';
})

btnExcelAll.addEventListener('click', () => {
    window.location = 'http://localhost/Perpustakaan/laporan/exportExcelAll';
})

        $.ajax({
          url : 'http://localhost/Perpustakaan/buku/tampilKategori',
          data: { get_param: 'value' },
          dataType: 'json',
          success : function(data){
              
              
              for (let i = 0; i < data.length; i++) {
                const option = document.createElement("option");
                option.value = data[i].id_jenis;
                option.text = data[i].nama_jenis;
                select.appendChild(option);
              }
          },
        })

    btnWordKat.addEventListener('click', () => {
        if (select.value == '') {
            alert('error');
        }else {
        window.location = 'http://localhost/Perpustakaan/laporan/exportWordBukKat?id='+select.value;
        }
    })
    
    btnExcelKat.addEventListener('click', () => {
        if (select.value == '') {
            alert('error');
        }else {
        window.location = 'http://localhost/Perpustakaan/laporan/exportExcelBukuKat?id='+select.value;
        }
    })
