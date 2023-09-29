let carts = document.querySelectorAll(".add2cart");

let products = [];

// Select all product cards within the parent container
const productCards = document.querySelectorAll(".products-container .card");

// Loop through each product card and extract information
productCards.forEach((card, index) => {
	const productName = card.querySelector(".card-title").textContent.trim();
	const productTag = card.querySelector(".item-tag").textContent;
	const productImage = card.querySelector(".card-img-top img");
	const imageUrl = productImage.getAttribute("src");

	const productPrice = parseFloat(
		card.querySelector(".item-price b").textContent.trim().replace("₵", "")
	);
	// Add more properties as needed

	// Create a product object and push it into the products array
	const product = {
		name: productName,
		Image: imageUrl,
		tag: productTag,
		price: productPrice,
		incart: 0,
		id: index,
	};

	products.push(product);
});

for (let i = 0; i < carts.length; i++) {
	carts[i].addEventListener("click", () => {
		cartNumber(products[i]);
		TotalCost(products[i]);
	});
}

//load the cart items on load
function onloadcartnumbers() {
	let productnumbers = localStorage.getItem("cartNumber");
	if (productnumbers) {
		const cartnumber = document.querySelectorAll(".cartb");
		cartnumber.forEach((element) => {
			element.textContent = productnumbers;
		});
	}
}
//add item to the localstorage
function cartNumber(product) {
	console.log(products);
	let productnumbers = localStorage.getItem("cartNumber");
	console.log(productnumbers);
	productnumbers = parseInt(productnumbers); //parse the typ of item to int because its in a string form

	if (productnumbers) {
		localStorage.setItem("cartNumber", productnumbers + 1);
		document.querySelector(".cartb").textContent = productnumbers + 1;
	} else {
		localStorage.setItem("cartNumber", 1);
		document.querySelector(".cartb").textContent = 1;
	}

	setItems(product);
	displayCart();
	onloadcartnumbers();
}

function setItems(product) {
	let cartItems = localStorage.getItem("productsIncart");
	cartItems = JSON.parse(cartItems);

	if (cartItems != null) {
		if (cartItems[product.tag] == undefined) {
			cartItems = {
				...cartItems,
				[product.tag]: product,
			};
		}

		cartItems[product.tag].incart += 1;
	} else {
		// set item if the item is not in the cart

		product.incart = 1;
		cartItems = {
			[product.tag]: product,
		};
	}

	localStorage.setItem("productsIncart", JSON.stringify(cartItems));
	displayCart();
	TotalCost(product);
}

function TotalCost(product) {
	let cartCost = localStorage.getItem("totalCost");

	console.log(typeof cartCost);
	console.log("total cost is ", cartCost);

	if (cartCost != null) {
		cartCost = parseInt(cartCost);
		console.log(typeof cartCost);
		localStorage.setItem("totalCost", cartCost + product.price);
	} else {
		localStorage.setItem("totalCost", product.price);
	}

	displayCart();
}

function displayCart() {
	let cartItems = localStorage.getItem("productsIncart");

	console.log(cartItems);
	cartItems = JSON.parse(cartItems);
	let productContainer = document.querySelector(
		".modal-dialog .modal-body .allcartItems"
	);
	let cartCost = localStorage.getItem("totalCost");
	let productsTotal = document.querySelector(".modal-dialog  .totalcartprice");

	console.log(cartItems);

	if (cartItems && productContainer) {
		productContainer.innerHTML = "";

		// Iterate through each item in the cart
		Object.values(cartItems).forEach((item) => {
			productContainer.innerHTML += `<div class="card mb-3">
		  <div class="card-body">
			<div class="row align-items-center">
			  <div class="col flex-grow-0">
				<img src="${
					item.Image
				}" class="rounded-3" alt="Shopping item" style="width: 65px" />
			  </div>
			  <div class="col m-0 p-0">
				<div class="card-body row align-items-center m-0 p-0">
				  <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 flex-grow-1">
					<p class="small mb-0 text-muted text-sm">${item.name}</p>
					<h5 class="text-black mb-0" style="font-size: 1em">Samsung galaxy Note 10</h5>
					<p class="small mb-0 text-muted text-sm unitPrice">Unit Price: <span>${
						item.price
					}</span></p>
				  </div>
				  <div class="col align-items-center">
					<div class="col-md-3 col-lg-3 col-xl-2 d-flex">
					  <button class="btn btn-link px-2 minus-button" onclick="this.parentNode.querySelector('input[type=number]').stepDown();item.incart = this.parentNode.querySelector('input[type=number]');console.log(item.incart);
						">
						<i class="fas fa-minus"></i>
					  </button>
					  <input id="form1" min="0" name="quantity" value="${
							item.incart
						}" type="number" class="form-control form-control-sm p-1" />
					  <button class="btn btn-link px-2 minus-button" onclick="this.parentNode.querySelector('input[type=number]').stepUp();
						incart++">
						<i class="fas fa-plus"></i>
					  </button>
					</div>
				  </div>
				  <div class="col">
					<h6 class="mb-0">GhC ${item.incart * item.price}</h6>
				  </div>
				  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
					<a href="#!" style="color: #cecece"><i class="fas fa-trash-alt"></i></a>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>`;
		});
	}
	productsTotal.innerHTML = "";

	// Append the new total price
	productsTotal.innerHTML += `<p></p>&nbsp;<h4 class="text-black"> Total Price: Ghc <span class="Total-price text-success fw-bolder">${cartCost}</span></h4>`;
}

displayCart();
onloadcartnumbers();
