<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="Jocsan Rodriguez" />
    <meta name="description" content="Contact Us Page" />
    <title>Contact Us</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    /> 
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/contact.css" />
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
    </div>    <!-- Main Content -->
    <div class="content">
      <h1>Contact Us</h1>
      <h6>If you have any questions, feel free to reach out!</h6>
      <h6>
        Email:
        <a href="mailto:PlayDistrict@gmail.com">PlayDistrict@gmail.com</a>
      </h6>
    </div>

    <!-- Comments Form -->
    <div class="content">
      <section>
        <h2>Leave a Comment</h2>
        <form action="#" method="POST">
          <!-- Name -->
          <label for="name">Name:</label>
          <input
            type="text"
            id="name"
            name="name"
            placeholder="Your name"
            required
          />

          <!-- Email -->
          <label for="email">Email:</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="Your email"
            required
          />

          <!-- Comment -->
          <label for="comment">Comment:</label>
          <textarea
            id="comment"
            name="comment"
            rows="4"
            placeholder="Write your comment here..."
            required
          ></textarea>

          <!-- Submit Button -->
          <button type="submit">Submit</button>
        </form>
      </section>
    </div>
  </body>

  <!-- Footer -->
  <footer class="text-center mt-4">
    &copy; 2025 PlayDistrict. All rights reserved.
  </footer>
  <script src="js/navbar.js"></script>
</html>
