var productsBag = {};

function addToBag(id, name, price) {
    if (productsBag.hasOwnProperty(id)) {
        productsBag[id].quantity++;
        productsBag[id].price = price * productsBag[id].quantity;
    } else {
        productsBag[id] = {
            id: id,
            name: name,
            price: price,
            quantity: 1,
        };
    }
    alert('Produto: ' + name + ' adicionado a sacola (Quantidade: ' + productsBag[id].quantity + ')');
}




// Get the modal and button elements
const modal = document.getElementById('myModal');
const openBtn = document.getElementById('floating-cart-button');
const closeBtn = document.querySelector('.close');

openBtn.addEventListener('click', function() {
    modal.style.display = 'block';
    let content = '';
    // Check if productsBag has any items
    if (Object.keys(productsBag).length > 0) {
        for (const id in productsBag) {
            const item = productsBag[id];
            content += `
              <b>Produto</b>: ${item.name}, <br>
              <b>Quantidade</b>: ${item.quantity} <br>
              <b>Valor unidade</b>: R$ ${item.price} <hr>
            `;
        }
    } else {
        content = '<p style="display: flex; justify-content: center; align-items: center"><b>Adicione itens ao seu carrinho!</b></p> <br>';
    }

    document.getElementById('content-bag').innerHTML = content;
});


// Close the modal when the close button is clicked
closeBtn.addEventListener('click', function() {
    modal.style.display = 'none';
});

// Close the modal when clicking outside of it
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});


function closeSale()
{

    if(document.getElementById('costumer-address').value == null)
        return alert('Preencha seu endereço')

    if(document.getElementById('costumer-name').value == null)
        return alert('Preencha seu nome')

    if(document.getElementById('costumer-tel').value == null)
        return alert('Preencha seu numero')

    modal.style.display = 'none';
    // alert('Obrigada por nos escolher!')
    // alert('Em instantes entraremos em contato confirmando o seu pedido!')

    var consumer = [];
    consumer.products = productsBag;
    consumer.costumer_name = document.getElementById('costumer-name').value
    consumer.costumer_telefone = document.getElementById('costumer-tel').value
    consumer.address = document.getElementById('costumer-address').value

    axios.post('/api/sales/', {
        params: {
            'products': productsBag,
            'consumer' : {
                'name' :  document.getElementById('costumer-name').value,
                'tel' : document.getElementById('costumer-tel').value,
                'address': document.getElementById('costumer-address').value
            }
        }
    },{
        headers: {
            'Content-type' : 'application/json'
        }
    }).then(response => {
        console.log(response)
        consumer = [];
        productsBag = {};
    }).catch(error => {
        console.log(error)
    })

}
