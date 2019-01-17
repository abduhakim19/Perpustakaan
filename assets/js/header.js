const btnLogout = document.querySelector('.bg-logout');

btnLogout.addEventListener('click', ()=>{
    alertLogout();
    console.log('hi');
})
const alertLogout = () => {
    const swalWithBootstrap = Swal.mixin({
        buttonsStyling: true,
    })
    swalWithBootstrap({
        title : 'Are You Sure ?',
        text: "You wonn't be able to revert this",
        type :'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText : 'Tidak',
        animation: false,
        customClass : 'animated zoomIn',
        reverseButtons : true
    }).then((result) => {
        if (result.value) {
            window.location = 'http://localhost/Perpustakaan/home/logout'; 
        }  
        
    })
}