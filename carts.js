let carts = document.querySelectorAll(".add2cart");

let products = [];

// Select all product cards within the parent container
const productCards = document.querySelectorAll(".products-container .card");

// Loop through each product card and extract information
productCards.forEach((card) => {
	const productName = card.querySelector(".card-title").textContent.trim();
	const productPrice = parseFloat(
		card.querySelector(".item-price b").textContent.trim().replace("₵", "")
	);
	// Add more properties as needed

	// Create a product object and push it into the products array
	const product = {
		name: productName,
		price: productPrice,
		incart: 0, // You can set other default values here
	};

	products.push(product);
});

console.log(products);

for (let i = 0; i < carts.length; i++) {
	carts[i].addEventListener("click", () => {
		cartNumber(products[i]);
	});
}

//load the cart items on load
function onloadcartnumbers() {
	let productnumbers = localStorage.getItem("cartNumber");
	if (productnumbers) {
		document.querySelector(".cartb").textContent = productnumbers;
	}
}
//add item to the localstorage
function cartNumber(product) {
	console.log("the product clicked is", product);
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
}
onloadcartnumbers();
