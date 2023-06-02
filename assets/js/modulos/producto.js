const frm = document.querySelector('#frmRegistro');
const btnAccion = document.querySelector('#btnAccion');
let tblProducto;

document.addEventListener("DOMContentLoaded", function(){
    tblProducto = $('#tblProducto').DataTable( {
        ajax: {
            url: base_url + 'producto/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id_producto' },
            { data: 'nombre' },
            { data: 'precio' },
            { data: 'descripcion' },
            { data: 'id_categoria' },
            { data: 'cantidad' },
            { data: 'imagen' },
            { data: 'accion' }
        ], 
        language,
        buttons,
        dom
    } );

    //submit producto
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + 'producto/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    tblProducto.ajax.reload();
                    frm.reset();
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

function eliminarPro(idPro) {
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
            const url = base_url + 'producto/delete/' + idPro;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    tblProducto.ajax.reload();
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

function editarPro(idPro){
    const url = base_url + 'producto/edit/' + idPro;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            document.querySelector('#id_producto').value = res.id_producto;
            document.querySelector('#nombre').value = res.nombre;
            document.querySelector('#imagen_actual').value = res.imagen;
            btnAccion.textContent = 'Actualizar';
            titleModal.textContent = 'Modificar Ctagoria';
            myModal.show();
        }
    }
}