const tableLista = document.querySelector('#tableListaDeseo tbody');

document.addEventListener('DOMContentLoaded',function() {
    getListaDeseo();
})

function getListaDeseo(){
    const url = base_url + 'principal/listadeseo';
    const http = new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaDeseo));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = '';
            res.productos.forEach(producto => {
                html += `
                <tr>
                    <td>
                        <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="125">
                    </td>
                    <td>${producto.nombre}</td>
                    <td>
                        <span class="badge bg-info">${res.moneda + ' ' + producto.precio}</span>
                    </td>
                    <td>
                    <span class="badge bg-primary">${producto.cantidad}</span>
                    </td>
                    <td>
                        <button class="btn btn-danger btnEliminarDeseo" type="button" prod="${producto.id_producto}"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-success" type="button"><i class="fas fa-cart-plus"></i></button>
                    </td>
                </tr>`;
            });
            tableLista.innerHTML = html;
            btnEliminarDeseo();
        }
    }
}

function btnEliminarDeseo() 
{
    let listaEliminar = document.querySelectorAll('.btnEliminarDeseo');
    for (let i = 0; i < listaEliminar.length; i++) {
        listaEliminar[i].addEventListener('click', function(){
            let idProducto = listaEliminar[i].getAttribute('prod');
            eliminarListaDeseo(idProducto);
        })   
    }
}

function eliminarListaDeseo(idProducto){
    for (let i = 0; i < listaDeseo.length; i++) {
        if (listaDeseo[i]['idProducto'] == idProducto) {
            listaDeseo.splice(i, 1);
        }
    }
    localStorage.setItem('listaDeseo', JSON.stringify(listaDeseo));
    getListaDeseo();
    cantidadDeseo();
    Swal.fire(
        'Aviso?',
        'Producto eliminado de la lista de Deseos',
        'seccess'
    )
}