const nuevo = document.querySelector('#nuevo_registro');
const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
const btnAccion = document.querySelector('#btnAccion');
const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'));
let tblCategoria;

document.addEventListener("DOMContentLoaded", function(){
    tblCategoria = $('#tblCategoria').DataTable( {
        ajax: {
            url: base_url + 'categoria/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id_categoria' },
            { data: 'categoria' },
            { data: 'imagen' },
            { data: 'accion' }
        ], 
        language,
        buttons,
        dom
    } );
    //modal nueva categoria
    nuevo.addEventListener('click', function(){
        document.querySelector('#id_categoria').value = '';
        document.querySelector('#imagen_actual').value = '';
        document.querySelector('#imagen').value = '';
        titleModal.textContent = 'Nuevo Categoria';
        btnAccion.textContent = 'Registrar';
        frm.reset();
        myModal.show();
    });
    //submit usuario
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + 'categoria/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    myModal.hide();
                    tblCategoria.ajax.reload();
                    document.querySelector('#imagen').value = '';
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

function eliminarCat(idCat) {
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
            const url = base_url + 'categoria/delete/' + idCat;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    tblCategoria.ajax.reload();
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

function editarCat(idCat){
    const url = base_url + 'categoria/edit/' + idCat;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#id_categoria').value = res.id_categoria;
            document.querySelector('#categoria').value = res.categoria;
            document.querySelector('#imagen_actual').value = res.imagen;
            btnAccion.textContent = 'Actualizar';
            titleModal.textContent = 'Modificar Ctagoria';
            myModal.show();
        }
    }
}