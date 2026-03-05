function mostrarContraseña(event) {
    let target = event.currentTarget;
    let input = target.previousElementSibling;

    if (input.getAttribute('type') == "password") {
        input.setAttribute('type', 'text');
    }else{
        input.setAttribute('type', 'password');
    }
}