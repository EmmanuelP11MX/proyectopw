let tblPendientes, tblFinalizados;

document.addEventListener("DOMContentLoaded", function() 
{
    tblPendientes = $('#tblPendientes').DataTable( {
        ajax: {
            url: base_url + 'pedido/listarPedidos',
            dataSrc: ''
        },
        columns: [
            { data: 'id_transaccion' },
            { data: 'monto' },
            { data: 'estado' },
            { data: 'fecha' },
            { data: 'email' },
            { data: 'nombre' },
            { data: 'apellido' },
            { data: 'direccion' },
            { data: 'accion' }
        ], 
        language,
        buttons,
        dom
    });

    tblFinalizados = $('#tblFinalizados').DataTable( {
        ajax: {
            url: base_url + 'pedido/listarFinalizados',
            dataSrc: ''
        },
        columns: [
            { data: 'id_transaccion' },
            { data: 'monto' },
            { data: 'estado' },
            { data: 'fecha' },
            { data: 'email' },
            { data: 'nombre' },
            { data: 'apellido' },
            { data: 'direccion' },
            { data: 'accion' }
        ], 
        language,
        buttons,
        dom
    });
});

function cambiarProceso(idPedido) {
    Swal.fire({
        title: 'Aviso',
        text: "El pedido fue entregado con exito?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'pedido/update/' + idPedido;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                if (res.icono == 'success') {
                    tblPendientes.ajax.reload();
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
