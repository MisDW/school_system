
var carrito = [];

const producto = document.querySelectorAll("#producto").forEach(element => {
    element.addEventListener("click", ()=>{
        const info_card = element.parentElement.parentElement.parentElement.parentElement
        const card = info_card.childNodes; 
            const img = card[1];
            const div = card[3].childNodes;
        const elements = div;
        const producto = elements[1].innerHTML;
        const precioOld = elements[3].innerHTML;
        
        const precioArray = precioOld.split("$");
        const precio = precioArray.join('');
        var info_item = {nombre: producto, precio: precio}
        carrito.push(info_item)

        const cant_products = document.getElementById("cant_products").innerHTML = `${carrito.length}`
        lista_carrito.innerHTML = "";
        precioTotal = 0;
        showItem();
    })
});

var lista_carrito = document.querySelector(".lista_carrito")
const carrito_card = document.querySelector(".carrito_card")
const total = document.querySelector(".total")
var precioTotal = 0; 

const showItem = () =>{
    carrito.forEach(item => {
        lista_carrito.innerHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto row">
                <div class="col-auto">$${item.nombre}</div>
                <div class="col-auto">$${item.precio}</div>
            </div>
            <span class="badge bg-primary rounded-pill">+1</span>
        </li>
        `;

        precioTotal = precioTotal + parseInt(item.precio);
        total.innerHTML = `Total: $ ${precioTotal}`;
    });
}

const btn_comprar = document.getElementById("btn_comprar").addEventListener("click", ()=>{
    alert("Compra realizada, Llegara un mensaje a su correo");
    location.href = "Productos.php"; 
})