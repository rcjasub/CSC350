/* 
  Author: Jocsan Rodriguez
  Date: November 30 2025
  Class: Web Programming
*/

// Load cart from localStorage
let cart = JSON.parse(localStorage.getItem("cart")) || []; //conver to object/array

// --------------------
// UPDATE CART BADGE BASED OF ITEMS
// --------------------
function updateCartCount() {
  const cartBtn = document.getElementById("cart-btn");
  if (cartBtn) cartBtn.textContent = cart.length;
}

// --------------------
// CALCULATE SUBTOTAL
// --------------------
function getsubTotal() {
  let subtotal = 0;
  //loop through the object, collect the price
  for (let item of cart) subtotal += item.price;
  return subtotal;
}

// --------------------
// CALCULATE TOTALS
// --------------------
function calcTotals() {
  const subtotal = getsubTotal();
  const taxes = subtotal * 0.1;
  const total = subtotal + taxes;

  const subEl = document.getElementById("subTotal");
  const taxEl = document.getElementById("taxes");
  const totalEl = document.getElementById("finalTotal");

  if (subEl) subEl.textContent = subtotal.toFixed(2);
  if (taxEl) taxEl.textContent = taxes.toFixed(2);
  if (totalEl) totalEl.textContent = total.toFixed(2);
}

// --------------------
// LOAD CART ITEMS
// --------------------
function loadCartGame() {
  const container = document.getElementById("cart-container");
  container.innerHTML = ""; // clear old items

  // If cart is empty, show a friendly message
  if (!cart || cart.length === 0) {
    container.innerHTML = `<div class="col-12"><div class="cart-empty">Your cart is empty. <a href=\"product1.html\">Shop games</a></div></div>`;
    return;
  }

  for (let i = 0; i < cart.length; i++) {
    let item = cart[i];

    const col = document.createElement("div");

    // stack each cart item in its own full-width row within the right column
    col.className = "col-12 mb-3";
    col.innerHTML = `
  <div class="cart">
    <img src="${item.image}" alt="${item.alt}" class="cart-img mb-50"/>
    <div class="card-body d-flex flex-column justify-content-between mt-2">
      <h5 class="card-title h5">${item.title}</h5>
      <p class="fw-bold mb-0">$${item.price.toFixed(2)}</p>
      <button class="remove-btn btn btn-sm btn-danger mt-2">Remove</button>
    </div>
  </div>
`;

    //remove game safely
    const removeBtn = col.querySelector(".remove-btn");
    removeBtn.addEventListener("click", () => removeGame(i));

    container.appendChild(col);
  }
}

// --------------------
// REMOVE A GAME INDIVIDUALY
// --------------------

function removeGame(index) {
  cart.splice(index, 1) // remove only that game
  localStorage.setItem("cart", JSON.stringify(cart)); //convers to json data 
  //update the rest 
  loadCartGame();
  updateCartCount();
  calcTotals();
}

// --------------------
// CLEAR CART
// --------------------
function clearCart() {
  cart = []; // set it to 0
  localStorage.setItem("cart", JSON.stringify(cart));
  //update the rest
  updateCartCount();
  calcTotals();
  loadCartGame();
}

// --------------------
// CHECKOUT
// --------------------

function checkout()
{
   clearCart();
   alert("Thanking you for shopping at PlayDistrict!");
}

// --------------------
// RUN ON PAGE LOAD
// --------------------
updateCartCount();
calcTotals();
loadCartGame();
