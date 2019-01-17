const peminjaman = document.getElementById('statistikPeminjaman');


$.ajax({
    url: 'http://localhost/Perpustakaan/Peminjaman/isiSemuaPeminjaman',
    type: 'post',
    dataType: 'json',
    success : (data) => {
        grafikPinjam(data);
    }
})

const grafikPinjam = (dataPinjam) => {

    const getPreviousMonths = () => {
        let months = [];
    
        for (i = 0; i < 5; i++) {
            let month  = moment().subtract(i, 'months').format('MMMM Y');
            months.push(month);
        }
    return months.reverse();
}

let data = [];
for (let a in dataPinjam) {
    let bulan = dataPinjam[a].tanggal_pinjam.split('-');
    let date = moment(bulan[1], 'MM').format('MMMM') + " " +bulan[0];
    data.push({
        t : date,
        y : dataPinjam[a].jumlah
    })
}

console.log(data);

new Chart(peminjaman, {
    tooltips : {
        enabled : false
    },
    type : 'line',
    data: {
        labels : getPreviousMonths(),
        datasets: [{
            label : 'Peminjaman',
            lineTension: 0.2,
            data: data,
            
            backgroundColor: 'rgba(0, 0 , 0, 0)',
            borderColor : 'rgba(17, 187, 218, 1)',
            borderWidth : 2 
        }],
        
    },
    options: {
        elements: {
            line: {
                tension: 0.2,
            }
        },
        bazierCurve: false,
        scales: {
            scaleStartValue:0,
        xAxes: [{
            type: 'time',
            distribution: 'linear',
            ticks: {
            source: 'labels'
            },
            time: {
                unit: 'month',
                displayFormats: {
                'month': 'MMMM'
                }
            }
        }],
        yAxes: [{
            ticks : {
                suggestedMin : 1,
                suggestedMax: 40,
                callback : function(value, index, values) {
                    if (Math.floor(value) === value) {
                        return value;
                    }
                }
            },
            scaleLabel: {
                display: true,
                labelString: 'Jumlah'
                }
            }]
        }
    }
})
Chart.defaults.global.showTooltips = false;
}



