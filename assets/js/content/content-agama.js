const btnTambah = document.querySelector('.btn-tambah');

btnTambah.addEventListener('click', async ()=>{
    mySwal = () => {
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
            closeButton = document.createElement('button');
            closeButton.className = 'swal2-close';
            closeButton.onclick = () => {swal.close();};
            closeButton.textContext = 'x';
            modal = document.querySelector('.swal-modal');
            modal.appendChild(closeButton);
        }
    }

    const {value : formValues} = await Swal({
        title : 'Tambah Agama',
        animation: false,
        customClass : 'animated fadeInDown',
        confirmButtonColor: '#3085d6',
        showCloseButton: true,
        confirmButtonText : 'Submit',
        html :
        '<div class="form-group text-left">'+
        '<label class="text-left">Nama Agama</label>'+
        '<input type="text" id="input-agama" class="form-control">'+
        '</div>',
        focusConfirm: false,
        preConfirm: () => {
            return {"nama" : document.getElementById('input-agama').value}
        }
    })

    if (formValues) {
        saveData(formValues)
    }
})

$(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
        return {
            "iStart" : oSettings._iDisplayStart,
            "iEnd": oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal": oSettings.fnRecordsTotal(),
            "iFilteredTotal": oSettings.fnRecordsDisplay(),
            "iPage" : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
            "iTotalPages" : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        }
    }

    let t = $('#tablekategori').DataTable({
        ajax : {
            url : 'http://localhost/Perpustakaan/murid/tampilagama',
            dataSrc : ''
        },
        columns : [
            {"data": null},
            {"data": "id_agama", "width": "14%"},
            {"data": "nama_agama", "width": "62%"},
            {"data": null,
                defaultContent : '<i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i> <i class="fas fa-edit rounded btn-aksi bg-edit" id="edit"></i>'}
        ],
        "columnDefs" : [{
            "searchable" : false,
            "orderable" : false,
            "targets": 0
        }],
        "order": [[1, "asc"]]
    });

    const table = $('#tablekategori').DataTable();

    t.on('order.dt search.dt', ()=>{
        t.column(0, {search:'applied', order: 'applied'}).nodes().each((cell, i) => {
            cell.innerHTML = i +1;
        });
    }).draw();

    $('#tablekategori tbody').on('click', '#delete', function() {
        let selectedRows = table.rows( $(this).parents('tr') ).data().to$();
        const data = selectedRows.toArray();
        const id = data[0].id_agama;

        alertHapus(id);
    })

    $('#tablekategori tbody').on('click', '#edit', function() {
        const selectedRows = table.rows($(this).parents('tr')).data().to$();
        const data = selectedRows.toArray();
        
        popupEdit(data);
    })
})

const popupEdit = async (data) => {
    let id;
    let nama;
    for (let i = 0; i < data.length; i++) {
        id = data[i].id_agama;
        nama = data[i].nama_agama;
    }


    mySwal = function() {
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
            closeButton = document.createElement('button');
            closeButton.className = 'swal2-close';
            closeButton.onclick = function() {swal.close();};
            closeButton.textContext = 'x';
            modal = document.querySelector('.swal-modal');
            modal.appendChild(closeButton);
        }
    }

    const {value: formValues} = await Swal({
        title : 'Edit Agama',
        animation: false,
        customClass: 'animated fadeInDown',
        confirmButtonColor : '#3085d6',
        showCloseButton : true,
        confirmButtonText : 'Submit',
        html : 
        '<div class="form-group text-left" >'+
        '<label class="text-left">ID Agama </label>'+
        '<input type="text" id="input-id" class="form-control" value="'+id+'" readonly>'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label>Nama Agama</label>'+
        '<input type="text" id="input-agama" class="form-control" value="'+nama+'" >'+
        '</div>',
        focusConfirm: false,
        preConfirm : () => {
            return {
                "id" : document.getElementById('input-id').value,
                "nama" : document.getElementById('input-agama').value
            }
        }
    })

    if (formValues) {
        inputEditData(formValues);
    }
}


const inputEditData = (dataInput) => {
    $.ajax ({
        url: 'http://localhost/Perpustakaan/murid/editAgama',
        type: 'post',
        data : dataInput,
        success : () => {
            $('#tablekategori').DataTable().ajax.reload();
            alertBerhasil('Data Berhasil Diedit');
        },
        error: () => {
            console.log('wow');
            $('#tablekategori').DataTable().ajax.reload();
            alertGagal('Data Berhasil Diedit');
        }
    })
}

const alertHapus = (id)=>{
    const swalWithBootstrap = Swal.mixin({
        buttonsStyling: true
    })

    swalWithBootstrap({
        title: 'Are you sure ?',
        text : "You won't be able to revert this",
        type : 'warning',
        showCancelButton : true,
        confirmButtonText: 'Hapus',
        cancelButtonText : 'Tidak',
        animation : false,
        customClass: 'animated zoomIn',
        reverseButtons : true,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'http://localhost/Perpustakaan/murid/hapusAgama',
                method : 'post',
                data : {id : id},
                success: () => {
                    $('#tablekategori').DataTable().ajax.reload();
                    alertBerhasil('Data Berhasil Dihapus')
                },
                error : () => {
                    $('#tablekategori').DataTable().ajax.reload();
                    alertGagal('Data Gagal Dihapus');
                }
            })
        }
    })
}

const saveData = (dataInput)=>{
    $.ajax({
        url : 'http://localhost/Perpustakaan/murid/insertAgama',
        type: 'POST',
        data : dataInput,
        success : () => {
            $('#tablekategori').DataTable().ajax.reload();
            alertBerhasil('Data Berhasil Disimpan')
        },
        error : () => {
            $('#tablekategori').DataTable().ajax.reload();
            alertGagal('Data Gagal Disimpan');
        }
    })
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
        title: text
    })
}

const alertGagal = (text) => {
    const toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton : false,
        timer: 3000
    })

    toast({
        type: 'error',
        title: text
    })
}