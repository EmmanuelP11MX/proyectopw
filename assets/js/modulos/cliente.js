const tableLista = document.querySelector("#tableListaProductos tbody");

document.addEventListener("DOMContentLoaded", function () {
    if (tableLista) {
        getListaProductos();
    }

});

function getListaProductos() {
    let html = "";
    const url = base_url + "principal/listaProductos";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res.totalPaypal > 0) {
                res.productos.forEach((producto) => {
                    html += `
                <tr>
                    <td>
                        <img class="img-thumbnail rounded-circle" src="${producto.imagen
                        }" alt="" width="125">
                    </td>
                    <td>
                        ${producto.nombre}
                    </td>
                    <td>
                        <span class="badge bg-info">${res.moneda + " " + producto.precio
                        }</span>
                    </td>
                    <td>
                        <span class="badge bg-primary">${producto.cantidad
                        }</span>
                    </td>
                    <td>
                        ${producto.subTotal}
                    </td>
                </tr>`;
                });
                tableLista.innerHTML = html;
                document.querySelector("#totalProducto").textContent = "Precio total del pedido:" + " " + res.moneda + " " + res.total;
                botonPaypal(res.totalPaypal);
            }else{
                tableLista.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center">Sin productos en el carrito</td>
                </tr>`;
            }
        }
    };
}

function botonPaypal(total) {
    paypal
        .Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                value: total, // Can reference variables or functions. Example: value: document.getElementById('...').value
                            },
                        },
                    ],
                });
            },
            // Finalize the transaction after payer approval
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (orderData) {
                    // Successful capture! For dev/demo purposes:
                    registrarPedido(orderData);
                });
            },
        })
        .render("#paypal-button-container");
}

function registrarPedido(datos) {
    const url = base_url + "cliente/registrarPedido";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(JSON.stringify({
        datos: datos,
        productos: listaCarrito
    }));
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire(
                'Aviso',
                res.msg,
                res.icono
            );
            if (res.icono == 'success') {
                localStorage.removeItem('listaCarrito');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    };
}