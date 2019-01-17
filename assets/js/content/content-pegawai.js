const btnTambah = document.querySelector('.btn-tambah');



$(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
        return {
            "iStart": oSettings._iDisplayStart,
            "iEnd" : oSettings.fnDisplayEnd(),
            "iLength": oSettings._iDisplayLength,
            "iTotal" : oSettings.fnRecordsTotal(),
            "iFilteredTotal" : oSettings.fnRecordsDisplay(),
            "iPage": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        }
    }

    let t = $('#tablepegawai').DataTable({
        ajax : {
            url: 'http://localhost/Perpustakaan/Pegawai/tampilpegawai',
            dataSrc : ''
        },
        columns: [
            {"data": null, "width": "2%"},
            {"data": "id_pegawai", "width": "13%"},
            {"data" : "nama_pegawai", "width": "20%"},
            {"data": "email", "width": "16%"},
            {"data": "nomor_handphone", "width": "15%"},
            {"data": "username", "width": "15%"},
            {"data": null, "width": "15%",
            defaultContent: '<i class="fas fa-trash-alt rounded btn-aksi bg-hapus remove"  id="delete" ></i> <i class="fas fa-edit rounded btn-aksi bg-edit" id="edit"></i> <i class="fas fa-key rounded btn-aksi bg-key" id="key"></i>'}
        ],
        "columnDefs": [{
            "searchable": false,
            "orderable" : false,
            "targets": 0
        }],
        "order": [[1, "asc"]]
    })

    const table = $('#tablepegawai').DataTable();

    t.on('order.dt search.dt', () => {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(
        (cell, i) => {
            cell.innerHTML = i +1;
        })
    }).draw();

    $('#tablepegawai tbody').on('click', '#delete', function() {
        const selectedRows = table.rows($(this).parents('tr')).data().to$();

        const data = selectedRows.toArray();
        const id = data[0].id_pegawai;

        alertHapus(id)
    })

    $('#tablepegawai tbody').on('click', '#key', function() {
        const selectedRows = table.rows($(this).parents('tr')).data().to$();

        const data = selectedRows.toArray();
        const id = data[0].id_pegawai;

        alertEditPassword(id)
    })

    $('#tablepegawai tbody').on('click', '#edit', function(){
        const selectedRows = table.rows($(this).parents('tr')).data().to$();

        const data = selectedRows.toArray();
        popupEdit(data);
    })
})

const alertEditPassword = async (id) => {
    mySwal = function(){
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
            closeButton = document.createElement('button');
            closeButton.className = 'swal2-close';
            closeButton.onclick = function() {swal.close()};
            closeButton.textContext = 'x';
            modal = document.querySelector('.swal-modal');
            modal.appendChild(closeButton);
        }
    }

    const {value: formValues} = await Swal({
        title : 'Ubah Password',
        animation: false,
        customClass: 'animated fadeInDown',
        confirmButtonColor: '#3085d6',
        showCloseButton: true,
        confirmButtonText: 'Submit',
        html:
        '<div class="form-group">'+
        '<input type="password" id="input-password" placeholder="Password..." class="form-control mt-3">'+
        '</div>',
        focusConfirm: false,
        preConfirm : ()=>{
            return {
                "id" : id,
                "password": document.getElementById('input-password').value
            }
        }
    })
    if (formValues) {
        saveEditPassword(formValues);
    }
}

const saveEditPassword = (dataInput) => {
    $.ajax({
        url : 'http://localhost/Perpustakaan/Pegawai/editPassword',
        type: 'post',
        data: dataInput,
        success : () => {
            $('#tablepegawai').DataTable().ajax.reload();
            alertBerhasil('Password Berhasil Diubah')

        },
        error: () => {
            $('#tablepegawai').DataTable().ajax.reload();
            alertGagal("Password Gagal Diubah")
        }
    })
}
const alertHapus = (id) => {
    const swalWithBootstrap = Swal.mixin({
        buttonsStyling: true
    })

    swalWithBootstrap({
        title: 'Are You Sure ?',
        text: "You won't be able to revert this",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText : 'Tidak',
        animation : false,
        customClass : 'animated zoomIn',
        reverseButtons : true,
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'http://localhost/Perpustakaan/Pegawai/hapusPegawai',
                method: 'post',
                data: {id: id},
                success: () => {
                    $('#tablepegawai').DataTable().ajax.reload();
                    alertBerhasil('Data Berhasil Dihapus')
                },
                error : () => {
                    $('#tablepegawai').DataTable().ajax.reload();
                    alertGagal('Data Gagal Dihapus');
                }
            })
        }
    })
}

const popupEdit = async (data) => {
    let id, nama, email, nomor, poto, username;
    for (let i = 0; i < data.length; i++) {
        id = data[i].id_pegawai;
        nama = data[i].nama_pegawai;
        email = data[i].email;
        nomor = data[i].nomor_handphone;
        username = data[i].username;
        poto = data[i].foto;
    }

    mySwal = function(){
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
            closeButton = document.createElement('button');
            closeButton.className = 'swal2-close';
            closeButton.onclick = function() {swal.close()};
            closeButton.textContext = 'x';
            modal = document.querySelector('.swal-modal');
            modal.appendChild(closeButton);
        }
    }
    const {value : formValues} = await Swal({
        title : 'Edit User',
        animation : false,
        customClass : 'animated fadeInDown swal-height',
        confirmButtonColor : '#3085d6',
        showCloseButton : true,
        confirmButtonText : 'Submit',
        html :
        '<form id="fedit">'+
        '<div class="form-group text-left">'+
        '<label class="text-left">ID Pegawai</label>'+
        '<input type="text" id="input-id" class="form-control form-control-sm" value="'+id+'" readonly>'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Nama Pegawai</label>'+
        '<input type="text" id="input-nama" class="form-control form-control-sm" value="'+nama+'">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Email</label>'+
        '<input type="text" id="input-email" class="form-control form-control-sm" value="'+email+'">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Nomor Handphone</label>'+
        '<input type="text" id="input-nmr" class="form-control form-control-sm" value="'+nomor+'">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Username</label>'+
        '<input type="text" id="input-user" class="form-control form-control-sm" value="'+username+'">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<input type="checkbox" id="checkgambar"> Ceklis Untuk mengubah gambar <br/>'+
        '<label class="text-left">Poto</label>'+
        '<input type="file" id="input-poto" class="form-control form-control-sm" >'+
        '</div>'+
        '</div>',
        preConfirm: () => {
            let checked = false
            if ($('#checkgambar').is(":checked")) {
                checked = true;
            }
            return {
                "id" : document.getElementById('input-id').value,
                "nama" : document.getElementById('input-nama').value,
                "email" : document.getElementById('input-email').value,
                "nomor" : document.getElementById('input-nmr').value,
                "username" : document.getElementById('input-user').value,
                "checkbox" : checked,
                "gambar" : document.getElementById('input-poto'),
            }
        }
    })

    if (formValues) {
        inputEditData(formValues);
    }
}

const inputEditData = (dataInput)=> {
    let fd = new FormData();    
    fd.append( 'gambar', dataInput.gambar.files[0]);
    fd.append( 'id', dataInput.id);
    fd.append( 'nama', dataInput.nama);
    fd.append( 'email', dataInput.email);
    fd.append( 'nomor', dataInput.nomor);
    fd.append( 'username', dataInput.username);
    fd.append( 'checkbox', dataInput.checkbox);
    $.ajax({
        url : 'http://localhost/Perpustakaan/Pegawai/editPegawai',
        type : 'post',
        dataType: 'json',
        data : fd,
        processData: false,
    contentType: false,
        success: (data) => {
            $('#tablepegawai').DataTable().ajax.reload();
            if (data.gambar !== null) {
                $('#g-user').attr('src', 'http://localhost/Perpustakaan/assets/image_admin/'+data.gambar);
            }
            $('#n-user').load(" #n-user");
            alertBerhasil('Data Berhasil Diedit');
        },
        error : (error) => {
            console.log(error);
            $('#tablepegawai').DataTable().ajax.reload();
            alertGagal('Data Gagal Diedit');
        }
    })
}

btnTambah.addEventListener('click' , async () => {
    mySwal = function(){
        swal(arguments[0]);
        if (arguments[0].showCloseButton) {
            closeButton = document.createElement('button');
            closeButton.className = 'swal2-close';
            closeButton.onclick = function() {swal.close()};
            closeButton.textContent = 'x';
            modal = document.querySelector('.swal-modal');
            modal.appendChild(closeButton);
        }
    }

    const {value : formValues} = await Swal({
        title: 'Tambah Pegawai',
        animation: false,
        customClass : 'animated fadeInDown',
        confirmButtonColor: '#3085d6',
        showCloseButton : true,
        confirmButtonText: 'Submit',
        html: 
        '<form id="f-input">'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Nama Pegawai</label>'+
        '<input type="text" id="input-nama" class="form-control form-control-sm">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Email</label>'+
        '<input type="text" id="input-email" class="form-control form-control-sm">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Nomor Handphone</label>'+
        '<input type="text" id="input-nmr" class="form-control form-control-sm">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Username</label>'+
        '<input type="text" id="input-user" class="form-control form-control-sm">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Password</label>'+
        '<input type="password" id="input-password" class="form-control form-control-sm">'+
        '</div>'+
        '<div class="form-group text-left">'+
        '<label class="text-left">Poto</label>'+
        '<input type="file" id="input-poto" class="form-control form-control-sm">'+
        '</div>'+
        '</div>',
        focusConfirm: false,
        preConfirm : () => {
            return {
                "nama" : document.getElementById('input-nama').value,
                "email" : document.getElementById('input-email').value,
                "nomor" : document.getElementById('input-nmr').value,
                "username" : document.getElementById('input-user').value,
                "password" : document.getElementById('input-password').value,
                "gambar": document.getElementById('input-poto')
            }
        }
    })

    if (formValues) {
        saveData(formValues)
    }
})

const saveData = (dataInput) => {
    console.log(dataInput);
    let fd = new FormData();
    fd.append('nama', dataInput.nama);
    fd.append('email', dataInput.email);
    fd.append('nomor', dataInput.nomor);
    fd.append('username', dataInput.username);
    fd.append('password', dataInput.password);
    fd.append('gambar', dataInput.gambar.files[0]);
    $.ajax({
        url: 'http://localhost/Perpustakaan/Pegawai/insertPegawai',
        type : 'post',
        data: fd, 
        processData: false,
        contentType : false,
        success: (data) => {
            console.log(data);
            $('#tablepegawai').DataTable().ajax.reload();
            alertBerhasil('Data Berhasil Disimpan');
        },
        error : () => {
            $('#tablepegawai').DataTable().ajax.reload();
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
    const toast  = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    })

    toast({
        type: 'error',
        title : text
    })
}