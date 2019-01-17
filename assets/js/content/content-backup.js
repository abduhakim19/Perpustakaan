const btn = document.getElementById('btnEksport');

btn.addEventListener('click', () => {
    const swalWithBootstrap = Swal.mixin({
        buttonsStyling: true,
    })

    swalWithBootstrap({
        title: 'Are You Sure ?',
        text : "You wonn't be able to revert this",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText : 'Tidak',
        animation: false,
        customClass: 'animated zoomIn',
        reverseButtons: true,
    }).then((result)=>{
        if (result.value) {
            $.redirect('http://localhost/Perpustakaan/BackUp/print', {ya: true});
        }
    })
});