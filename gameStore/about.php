<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Jocsan Rodriguez" />
  <meta name="description" content="About Us Page" />
  <title>About Us</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/about.css" />
  <link rel="stylesheet" href="css/global.css" />
</head>

<body>
    <!-- Top Bar -->
    <div class="top-bar">
      <div class="top-bar-left">
        <a href="index.php" class="top-bar-logo">PlayDistrict</a>
      </div>
      <div class="top-bar-right">
        <div id="top-bar-auth"></div>
        <a href="cart.php" class="top-bar-btn top-bar-cart">
          <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18">
            <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/>
          </svg>
          <span class="cart-badge" id="cart-count">0</span>
        </a>
      </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <div id="nav-links">
        <!-- Navbar will be injected here by navbar.js -->
      </div>
    </div>

  <div class="content">
    <h1>About Us</h1>
    <p>
      Welcome to VidGame, your number one source for all things gaming. We're
      dedicated to providing you the very best of video games, with an
      emphasis on variety, quality, and customer service.
    </p>
    <p>
      Founded in 2023 by Jocsan Rodriguez, VidGame has come a long way from
      its beginnings. When Jocsan first started out, his passion for gaming
      drove him to start his own business.
    </p>
    <p>
      We hope you enjoy our products as much as we enjoy offering them to you.
      If you have any questions or comments, please don't hesitate to
      <a href="contact.html">contact</a>
      us.
    </p>
  </div>
</body>

<!-- Footer -->
<footer class="text-center mt-4">
  &copy; 2025 PlayDistrict. All rights reserved.
</footer>

<script src="js/navbar.js"></script>
</html>