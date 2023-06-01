const nuevo = document.querySelector('#nuevo_registro');
const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'));
let tblUsuario;

document.addEventListener("DOMContentLoaded", function(){
    tblUsuario = $('#tblUsuario').DataTable( {
        ajax: {
            url: base_url + 'usuario/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id_usuario' },
            { data: 'nombre' },
            { data: 'primer_apellido' },
            { data: 'segundo_apellido' },
            { data: 'correo' },
            { data: 'perfil' },
            { data: 'accion' }
        ], 
        language,
        buttons,
        dom
    } );
    //modal nuevo usuario
    nuevo.addEventListener('click', function(){
        titleModal.textContent = 'Nuevo Usuario';
        myModal.show();
    });
    //submit usuario
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + 'usuario/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                console.log(this.responseText);
                if (res.icon == 'success') {
                    myModal.hide();
                    tblUsuario.ajax.reload();
                }
                Swal.fire(
                    'Aviso?',
                    res.msg,
                    res.icono
                )
            }
        }
    });
});

function eliminarUser(idUser) {
    Swal.fire({
        title: 'Aviso?',
        text: "Estas seguro que quieres eliminar el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminarlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'usuario/delete/' + idUser;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    tblUsuario.ajax.reload();
                }
                Swal.fire(
                    'Aviso?',
                    res.msg,
                    res.icono
                )
            }
            }
        }
    })
}