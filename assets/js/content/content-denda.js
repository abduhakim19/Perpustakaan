const inputJarak = document.getElementById('jarak');
const inputDenda = document.getElementById('denda');
const btnEdit = document.getElementById('btnEdit');


$.ajax({
    url : 'http://localhost/Perpustakaan/Buku/tampilDenda',
    type: 'post',
    dataType: 'json',
    success: (data) => {
        for (let i = 0; i < data.length; i++) {
            inputJarak.value = data[i].jangka;
            inputDenda.value = data[i].harga;
        }
    }
})

btnEdit.addEventListener('click', async ()=>{
    mySwal = function() {
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
            closeButton = document.createElement('button');
            closeButton.className = 'swal2-close';
            closeButton.onclick = function (){swal.close()};
            closeButton.textContext = 'x';
            modal = document.querySelector('.swal-modal');
            modal.appendChild(closeButton)
        }
    }

    const {value: formValues} =  await Swal({
        title : 'Edit Denda Buku',
        animation : false,
        customClass: 'animated fadeInDown',
        confirmButtonColor : '#3085d6',
        showCloseButton: true,
        confirmButtonText : 'Submit',
        html : 
        '<div class="form-group text-left">'+
        '<label for="jarak">Jarak (hari)</label>'+
        '<input type="text" id="inputjarak" class="form-control" value="'+ inputJarak.value +'">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label for="denda">Denda (Rp. )</label>'+
        '<input type="text" id="inputdenda" class="form-control" value="'+ inputDenda.value +'">'+
        '</div>',
        focusConfirm : false,
        preConfirm : () => {
            return {
                'jarak' : document.getElementById('inputjarak').value,
                'denda' : document.getElementById('inputdenda').value 
            }
        }
    })

    if (formValues) {
        inputEditData(formValues);
    }
});

const inputEditData = (dataInput) => {
    console.log(dataInput);
    $.ajax({
        url : 'http://localhost/Perpustakaan/Buku/editDenda',
        type: 'post',
        data : dataInput,
        success: ()=>{
            alertBerhasil('Data Berhasil Diedit');
            $.ajax({
                url : 'http://localhost/Perpustakaan/Buku/tampilDenda',
                type: 'post',
                dataType: 'json',
                success: (data) => {
                    for (let i = 0; i < data.length; i++) {
                        inputJarak.value = data[i].jangka;
                        inputDenda.value = data[i].harga;
                    }
                }
            })
        },
        error : () => {
            alert('Gagal Edit');
        }
    })
}

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