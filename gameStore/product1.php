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
      <a href="index.php" class="sidebar-link active"><span>Home</span></a>
      <a href="about.php" class="sidebar-link"><span>About</span></a>
      <a href="contact.php" class="sidebar-link"><span>Contact</span></a>
    </div>

    <div class="H1SALE">
      <h1>SALE OF THE MONTH CATEGORY</h1>
      <h2>ACTION GAMES</h2>
    </div>

    <!-- Main content -->
    <main class="main-content">
      <div class="container mt-4">
        <div class="row g-4">
          <?php
          // Define products array
          $products = [
            [
              'image' => 'images/Nier.jpeg',
              'alt' => 'Nier Automata cover',
              'title' => 'Nier Automata',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/ninjaG4.jpeg',
              'alt' => 'Ninja Gaiden 4',
              'title' => 'Ninja Gaiden 4',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/bf1.jpeg',
              'alt' => 'BattleField 1',
              'title' => 'BattleField 1',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/dmc3.jpeg',
              'alt' => 'Devil May Cry 3',
              'title' => 'Devil May Cry 3',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/bay.jpeg',
              'alt' => 'Bayoneta 1',
              'title' => 'Bayoneta 1',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/mg3R.jpeg',
              'alt' => 'Metal Gear Rising',
              'title' => 'Metal Gear Rising',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/gow.jpeg',
              'alt' => 'God of war',
              'title' => 'God of war',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/hades.jpeg',
              'alt' => 'Hades',
              'title' => 'Hades',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/batA.jpeg',
              'alt' => 'Batman Arkham Asylum',
              'title' => 'Batman Arkham Asylum',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/DoomE.jpeg',
              'alt' => 'Doom Eternal',
              'title' => 'Doom Eternal',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/ff16.jpeg',
              'alt' => 'Final Fantasy 16',
              'title' => 'Final Fantasy 16',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ],
            [
              'image' => 'images/seki.jpeg',
              'alt' => 'Sekiro',
              'title' => 'Sekiro shadow die twice',
              'description' => 'Fast-paced games focused on quick reflexes, timing, and hand–eye coordination. Players often face real-time challenges like combat, platforming, or shooting.',
              'price' => '$34.30'
            ]
          ];

          // Loop through products and generate HTML
          foreach ($products as $product) {
            echo '
            <div class="col-md-3 col-sm-6">
              <div class="shopingCard">
                <img src="' . $product['image'] . '" alt="' . $product['alt'] . '" />

                <div class="card-body d-flex flex-column justify-content-between">
                  <div>
                    <h5 class="card-title">' . $product['title'] . '</h5>
                    <p class="card-text">' . $product['description'] . '</p>
                  </div>
                  <div class="d-flex justify-content-start align-items-center mt-2">
                    <p class="price mb-0 me-3">' . $product['price'] . '</p>
                    <button class="no-style">Add to Cart</button>
                  </div>
                </div>
              </div>
            </div>';
          }
          ?>
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
  </body>
</html>