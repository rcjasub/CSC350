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
      <a href="index.php" class="sidebar-link active"><span>Home</span></a>
      <a href="about.php" class="sidebar-link"><span>About</span></a>
      <a href="contact.php" class="sidebar-link"><span>Contact</span></a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
      <h1>Welcome to the Video Games Online Store</h1>
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
      &copy; 2025 VidGame. All rights reserved.
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>