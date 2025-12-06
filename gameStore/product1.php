<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Jocsan Rodriguez" />
    <meta name="description" content="Page for video games online store" />
    <title>Products</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/global.css" />
    <link rel="stylesheet" href="css/gameCard.css" />
  </head>

  <body>
    <!-- Sidebar -->
    <div class="sidebar">
      <div id="nav-links">
        <!-- Navbar will be injected here by navbar.js -->
      </div>
    </div>

    <div class="H1SALE">
      <h1>SALE OF THE MONTH CATEGORY</h1>
      <h2>ACTION GAMES</h2>
    </div>

    <button
      class="floating-cart-btn"
      aria-label="Open cart"
      onclick="location.href='cart.php'"
    >
      <!-- Material Icons - shopping_cart -->
      <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path
          d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"
        />
      </svg>
      <span class="cart-badge" id="cart-btn">0</span>
    </button>

    <!-- Main content -->
    <main class="main-content">
      <div class="container mt-4">
        <div class="row g-4" id="product-container">
          <!-- Product cards will be inserted here dynamically -->
        </div>
      </div>
    </main>

    <!-- Bottom Nav -->
    <nav class="navbar fixed-bottom justify-content-center mb-3">
      <ul class="nav bg-dark rounded-pill px-3 py-1 shadow">
        <li class="nav-item">
          <a class="nav-link text-light" href="product1.php">1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="product2.php">2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="product3.php">3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="product4.php">4</a>
        </li>
      </ul>
    </nav>

    <script src="js/cart.js"></script>
    <script src="js/product1.js"></script>
    <script src="js/navbar.js"></script>
  </body>
</html>
