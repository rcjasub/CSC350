/* 
  Author: Jocsan Rodriguez
  Date: November 30 2025
  Class: Web Programming
*/

// Load cart from localStorage
let cart = JSON.parse(localStorage.getItem("cart")) || []; //conver to object/array

// --------------------
// CHECK IF USER IS LOGGED IN
// --------------------
async function isUserLoggedIn() {
  try {
    const res = await fetch('backend/check-auth.php', {
      credentials: 'include',
      cache: 'no-store',
      headers: { 'Cache-Control': 'no-cache' }
    });
    if (!res.ok) {
      console.warn('Auth check responded with non-OK status', res.status);
      return false;
    }
    const data = await res.json();
    console.log('Auth check result:', data);
    return data.logged_in === true;
  } catch (err) {
    console.error('Auth check failed:', err);
    return false;
  }
}

// --------------------
// SHOW LOGIN REQUIRED MODAL
// --------------------
function showLoginModal() {
  const modal = document.createElement('div');
  modal.className = 'modal fade';
  modal.id = 'loginModal';
  modal.setAttribute('tabindex', '-1');
  modal.setAttribute('aria-labelledby', 'loginModalLabel');
  modal.setAttribute('aria-hidden', 'true');
  modal.innerHTML = `
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Sign In Required</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>You need to be logged in to add items to your cart and make purchases.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <a href="login.php" class="btn btn-primary">Sign In</a>
          <a href="registration.php" class="btn btn-success">Sign Up</a>
        </div>
      </div>
    </div>
  `;
  document.body.appendChild(modal);
  const bsModal = new bootstrap.Modal(modal);
  bsModal.show();
}

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
  if (!container) return; // Exit if container doesn't exist (e.g., on product pages)
  
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

async function checkout()
{
   try {
     // Show loading state
     const checkoutBtn = document.querySelector('button[onclick="checkout()"]');
     const originalText = checkoutBtn ? checkoutBtn.textContent : '';
     if (checkoutBtn) {
       checkoutBtn.disabled = true;
       checkoutBtn.textContent = 'Processing...';
     }

     // Send cart to server to process checkout. Server will enforce login.
     const controller = new AbortController();
     const timeoutId = setTimeout(() => controller.abort(), 30000); // 30 second timeout

     const res = await fetch('backend/checkout.php', {
       method: 'POST',
       credentials: 'include',
       cache: 'no-store',
       headers: { 'Content-Type': 'application/json', 'Cache-Control': 'no-cache' },
       body: JSON.stringify({ cart }),
       signal: controller.signal
     });

     clearTimeout(timeoutId);

     if (res.status === 401) {
       // Not authenticated
       showLoginModal();
       if (checkoutBtn) {
         checkoutBtn.disabled = false;
         checkoutBtn.textContent = originalText;
       }
       return;
     }

     if (!res.ok) {
       const txt = await res.text();
       console.error('Checkout failed:', res.status, txt);
       alert('Checkout failed. Please try again.');
       if (checkoutBtn) {
         checkoutBtn.disabled = false;
         checkoutBtn.textContent = originalText;
       }
       return;
     }

     const data = await res.json();
     console.log('Checkout response:', data);
     
     if (data.success) {
       clearCart();
       const emailMsg = data.email_sent ? 'A confirmation email has been sent.' : 'Note: Email confirmation could not be sent.';
       alert(`Thank you for shopping at PlayDistrict! Order placed. ${emailMsg}`);
       if (checkoutBtn) {
         checkoutBtn.disabled = false;
         checkoutBtn.textContent = originalText;
       }
     } else {
       alert(data.message || 'Checkout failed');
       if (checkoutBtn) {
         checkoutBtn.disabled = false;
         checkoutBtn.textContent = originalText;
       }
     }
   } catch (err) {
     console.error('Checkout error:', err);
     if (err.name === 'AbortError') {
       alert('Checkout is taking longer than expected. Please check your order history.');
     } else {
       alert('An error occurred during checkout.');
     }
     const checkoutBtn = document.querySelector('button[onclick="checkout()"]');
     if (checkoutBtn) {
       checkoutBtn.disabled = false;
       checkoutBtn.textContent = 'Checkout';
     }
   }
}

// --------------------
// CENTRALIZED ADD TO CART (ENSURE LOGGED IN)
// --------------------
async function addToCart(product) {
  const loggedIn = await isUserLoggedIn();
  if (!loggedIn) {
    showLoginModal();
    return false;
  }

  // prevent duplicates
  const exists = cart.some(item => item.title === product.title);
  if (exists) {
    alert(`${product.title} is already in your cart.`);
    return false;
  }

  cart.push(product);
  try { localStorage.setItem('cart', JSON.stringify(cart)); } catch (err) { console.error('Failed to save cart:', err); }
  updateCartCount();
  calcTotals();
  // If we're on cart page, reload items
  try { loadCartGame(); } catch (err) { /* ignore */ }
  alert(`${product.title} added to cart!`);
  return true;
}

// Expose globally for product pages
window.addToCart = addToCart;

// --------------------
// RUN ON PAGE LOAD
// --------------------
updateCartCount();
calcTotals();
loadCartGame();
