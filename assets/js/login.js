const lihat  = (button) => {
    console.log(button.className)
    if(button.className == 'fas fa-eye-slash mx-auto'){
        $('#pass').attr('type', 'text');
        $('#logo').attr('class', 'fas fa-eye mx-auto')
    }else if(button.className == 'fas fa-eye mx-auto'){
        $('#pass').attr('type', 'password');
        $('#logo').attr('class', 'fas fa-eye-slash mx-auto')
    }
    
}