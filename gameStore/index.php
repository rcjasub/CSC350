<?php require_once 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Jocsan Rodriguez" />
    <meta name="description" content="Home page for video games online store" />
    <title>Video Games Online Store</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
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

    <!-- Main Content -->
    <div class="main-content">
      <h1>Welcome to PlayDistrict</h1>
      <p class="lead">
        Your one-stop shop for the latest and greatest video games!
      </p>

      <!-- Special Deal Section -->
      <div class="container-fluid mt-4 p-4 bg-warning text-light rounded">
        <h3 class="p">Special Deal!</h3>
        <p class="p">Get up to 30% off select games this weekend only!</p>
        <a href="product1.php" class="btn btn-dark">Shop Deals</a>
      </div>

      <!-- Genre Carousel -->
      <div class="genre-carousel-wrapper mt-5">
        <div class="genre-carousel" id="carousel">
          <div class="genre-card">
            <div class="game-image">
              <a href="product1.php">
                <img src="images/Nier.jpeg" alt="Action game cover" />
              </a>
            </div>
            <div class="genre-name">Action Games</div>
          </div>

          <div class="genre-card">
            <div class="game-image">
              <a href="product2.php">
                <img src="images/re4.jpeg" alt="Survival horror game cover" />
              </a>
            </div>
            <div class="genre-name">Survival Horror</div>
          </div>

          <div class="genre-card">
            <div class="game-image">
              <a href="product3.php">
                <img src="images/FF7.jpeg" alt="rpg game cover" />
              </a>
            </div>
            <div class="genre-name">Role Playing Games</div>
          </div>

          <div class="genre-card">
            <div class="game-image">
              <a href="product4.php">
                <img src="images/t8.jpeg" alt="Fighting game cover" />
              </a>
            </div>
            <div class="genre-name">Fighting Games</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-4">
      &copy; 2025 PlayDistrict. All rights reserved.
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="js/navbar.js"></script>
    <script src="js/cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
