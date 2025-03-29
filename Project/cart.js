let carts = document.querySelectorAll('.p-add');


let products = [
  {
    type : "type1",
    name : "Name1",
    img : "p1.jpg",
    price : 10,
	inBasket: 0
  },
  {
    type : "type2",
    name : "Name2",
    img : "p2.jpg",
    price : 20,
	inBasket: 0
  },
  {
    type : "type3",
    name : "Name3",
    img : "p3.jpg",
    price : 30,
	inBasket: 0
  },
  {
    type : "type4",
    name : "Name4",
    img : "p4.jpg",
    price : 40,
	inBasket: 0
  },
  {
    type : "type5",
    name : "Name5",
    img : "p5.jpg",
    price : 10,
	inBasket: 0
  },
  {
    type : "type6",
    name : "Name6",
    img : "p6.jpg",
    price : 20,
	inBasket: 0
  },
  {
    type : "type7",
    name : "Name7",
    img : "p7.jpg",
    price : 30,
	inBasket: 0
  },
  {
    type : "type8",
    name : "Name8",
    img : "p8.jpg",
    price : 40,
	inBasket: 0
  }
];

for(let i = 0; i < carts.length; i++){
	carts[i].addEventListener('click', () => {
		if(i < 8){
			setItems(products[i]);
			totalCost(products[i]);
		}
		else {
			setItems(products[i - 8]);
			totalCost(products[i - 8]);
		}
		alert("Product added to the basket");
	})	
}




function setItems(product){
	let basketItems = localStorage.getItem('productsInBasket');
	basketItems = JSON.parse(basketItems);
	if(basketItems != null){
		if(basketItems[product.name] == undefined){
			basketItems = {
				...basketItems,
				[product.name]:product
			}
		}
		basketItems[product.name].inBasket += 1;
	} 
	else {
		product.inBasket = 1;
		basketItems = {
			[product.name]:product
		}
	}
	localStorage.setItem("productsInBasket", JSON.stringify(basketItems));
}

function totalCost(product){
	let basketCost = localStorage.getItem('totalCost');
	
	if(basketCost != null){
		basketCost = parseInt(basketCost);
		localStorage.setItem("totalCost", basketCost + product.price);
	}
	else {
		localStorage.setItem("totalCost", product.price);
	}
}

function displayBasket() {
    let basketItems = localStorage.getItem("productsInBasket");
    basketItems = JSON.parse(basketItems);
    let productContainer = document.querySelector("#tbody");
    let basketCost = localStorage.getItem('totalCost');
    let subtotal = document.querySelector("#subtotal");

    if (basketItems !== null && productContainer) {
        productContainer.innerHTML = "";
        Object.values(basketItems).map(item => {
            productContainer.innerHTML +=`
            <tr class="productIn">
                <td><a class="remove"><i class="far fa-times-circle"></i></a></td>
                <td><img src="./img/products/${item.img}" alt=""></td>
                <td class="nameIn">${item.name}</td>
                <td id="price1">$${item.price}</td>
                <td><input class="qn" type="number" value="${item.inBasket}" min="1"></td>
                <td id="tot_p1">$${item.inBasket * item.price}</td>
            </tr>
            `;
        });
        subtotal.innerHTML = `
        <h3>Basket Total</h3>
            <table>
                <tr>
                    <td>Basket Subtotal</td>
                    <td id="sub">$${basketCost}</td>
                </tr>
                <tr>
                    <td>Shipping</td>
                    <td>Free</td>
                </tr>
                <tr>
                    <td><b>Total</b></td>
                    <td id="tot"><b>$${basketCost}</b></td>
                </tr>
            </table>
            <button class="normal" onclick="proceedToCheckout()">Proceed to checkout</button>
        `;
    }
}

displayBasket();






let productIn = document.querySelectorAll('.productIn');


for(let i = 0; i < productIn.length; i++){
	productIn[i].addEventListener('change', () => {
		productIn[i].querySelector('#tot_p1').innerHTML = "$" + changeStorage(productIn[i].querySelector('.nameIn').innerHTML, productIn[i].querySelector('.qn').value);
	})
}

function changeStorage(name, value){
	let basketItems = localStorage.getItem('productsInBasket');
	let basketCost = localStorage.getItem('totalCost');
	basketItems = JSON.parse(basketItems);
	value = parseInt(value);
	let old_value =	basketItems[name].inBasket;
	basketItems[name].inBasket = value;
	old_value = parseInt(old_value);
	
	basketCost = basketCost - (old_value * basketItems[name].price) + (value * basketItems[name].price);
	basketCost = parseInt(basketCost);
	
	localStorage.setItem("totalCost", basketCost);
	localStorage.setItem("productsInBasket", JSON.stringify(basketItems));
	
	changeHtml();
	
	return (value * basketItems[name].price);
	
}

function changeHtml(){
	let basketCost = localStorage.getItem('totalCost');
	let subtotal = document.querySelector("#subtotal");
	
	subtotal.innerHTML = `
		<h3>Basket Total</h3>
			<table>
				<tr>
					<td>Basket Subtotal</td>
					<td id="sub">$${basketCost}</td>
				</tr>
				<tr>
					<td>Shipping</td>
					<td>Free</td>
				</tr>
				<tr>
					<td><b>Total</b></td>
					<td id="tot"><b>$${basketCost}</b></td>
				</tr>
			</table>
			<button class="normal">Proceed to checkout</button>
		`;
}

let removeItem = document.querySelectorAll('.remove');

for(let i = 0; i < removeItem.length; i++){
	removeItem[i].addEventListener('click', () => {
		let name = productIn[i].querySelector('.nameIn').innerHTML;
		for(let i = 0; i < products.length; i++)
			if(products[i].name == name){
				remove(products[i], products[i].name);
				removeItem = document.querySelectorAll('.remove');
			}
	})
}

function remove(product, n){
	let basketItems = localStorage.getItem('productsInBasket');
	let basketCost = localStorage.getItem('totalCost');
	basketItems = JSON.parse(basketItems);
	basketCost = JSON.parse(basketCost);
	basketCost = parseInt(basketCost);
	let b = parseInt(basketItems[n].inBasket);
	let c = parseInt(basketItems[n].price);
	
	let a = b * c;
	basketCost -= a;
	
	delete basketItems[product.name]; 
	
	localStorage.setItem("totalCost", basketCost);
	localStorage.setItem("productsInBasket", JSON.stringify(basketItems));
	changeHtml();	
	
	$('#tbody').on('click', '.remove', function () {
		$(this).closest('tr').remove();
		});	
}


function add_item(){
	let Item_name = document.querySelector('#name').textContent;
	let number = document.querySelector('#numberOf').value;
	
	for(let i = 0; i < 8; i++){
		if(products[i].name == Item_name){
			for(let j=0;j<number;j++){
				setItems(products[i]);
				totalCost(products[i]);
			}
		}
	}
	alert("Product added to the basket");
}


function proceedToCheckout() {
    let basketItems = localStorage.getItem("productsInBasket");
    let totalCost = localStorage.getItem("totalCost");

    if (basketItems === null) {
        alert("Your basket is empty. Add items before proceeding to checkout.");
        return;
    }
	
    document.getElementById("basketItems").value = basketItems;
    document.getElementById("totalCost").value = totalCost;

    document.getElementById("checkoutForm").submit();
}

