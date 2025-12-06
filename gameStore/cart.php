<?php 
session_start();
require_once 'config.php';

// Redirect to login if not logged in
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Jocsan Rodriguez" />
    <meta name="description" content="Page for Shoping Cart" />
    <title>Shoping Cart</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/global.css" />
    <link href="css/cart.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <div id="nav-links">
        <!-- Navbar will be injected here by navbar.js -->
      </div>
    </div>

    <div class="main-content container mt-4">
      <div class="row">
        <!-- Left: Cart Items -->
        <div class="col-lg-4 col-md-12 mb-4 order-lg-1 order-2">
          <div class="cart-summary card p-3">
            <h3>Games Summary</h3>
            <p>Games: <span id="cart-btn">0</span></p>
            <p>Subtotal: $<span id="subTotal">0.00</span></p>
            <p>Taxes: $<span id="taxes">0.00</span></p>
            <hr />
            <p>Total: $<span id="finalTotal">0.00</span></p>
            <button
              id="checkout-cart-btn"
              class="btn btn-primary w-100 mb-2"
              onclick="checkout()"
            >
              Check Out
            </button>
            <button
              id="clear-cart-btn"
              class="btn btn-danger w-100"
              onclick="clearCart()"
            >
              Clear Cart
            </button>
          </div>
        </div>

        <!-- Right: Cart Summary -->
        <div class="col-lg-8 col-md-12 mb-4 order-lg-2 order-1">
          <div id="cart-container" class="row g-3 cart-container"></div>
        </div>
      </div>
    </div>

    <script src="js/cart.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>
