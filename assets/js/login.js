const btnRegister = document.querySelector('#btnRegister');
const btnLogin = document.querySelector('#btnLogin');
const frmLogin = document.querySelector('#frmLogin');
const frmRegister = document.querySelector('#frmRegister');
const registrarse = document.querySelector('#registrarse');
const login = document.querySelector('#login');

const nombreRegistro = document.querySelector('#nombreRegistro');
const p_apellidoRegistro = document.querySelector('#p_apellidoRegistro');
const s_apellidoRegistro = document.querySelector('#s_apellidoRegistro');
const telefonoRegistro = document.querySelector('#telefonoRegistro');
const correoRegistro = document.querySelector('#correoRegistro');
const claveRegistro = document.querySelector('#claveRegistro');

document.addEventListener("DOMContentLoaded", function() {
    btnRegister.addEventListener('click', function() {
        frmLogin.classList.add('d-none');
        frmRegister.classList.remove('d-none');
    })
    btnLogin.addEventListener('click', function(){
        frmRegister.classList.add('d-none');
        frmLogin.classList.remove('d-none');
    })
    //registro
    registrarse.addEventListener('click', function() {
        if (nombreRegistro.value == '' || p_apellidoRegistro.value == '' || s_apellidoRegistro == ''
        || correoRegistro.value == '' || telefonoRegistro.value == '' || claveRegistro == '') 
        {
            Swal.fire('¡Espera!','Tienes que llenar todos los campos para podes continuar','warning');
        } else {
            let formData = new FormData();
            formData.append('nombre', nombreRegistro.value);
            formData.append('p_apellido', p_apellidoRegistro.value);
            formData.append('s_apellido', s_apellidoRegistro.value);
            formData.append('telefono', telefonoRegistro.value);
            formData.append('correo', correoRegistro.value);
            formData.append('clave', claveRegistro.value);
            const url = base_url + 'cliente/registroDirecto';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(formData);
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    Swal.fire(
                        'Aviso?',
                        res.msg,
                        res.icono
                    )
                    if (res.icono == 'success') {
                        setTimeout(() => {
                            enviarCorreo(correoRegistro.value, res.token);
                        }, 2000);
                    }
                }
            }
        }
    })
});

function enviarCorreo(correo, token){
    let formData = new FormData();
    formData.append('token', token);
    formData.append('correo', correo);
    const url = base_url + 'cliente/enviarCorreo';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(formData);
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            Swal.fire(
                'Aviso?',
                res.msg,
                res.icono
            )
            if (res.icono == 'success') {
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    }
}