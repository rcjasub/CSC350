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
      <h2>FIGHTING GAMES</h2>
    </div>

    <!-- Main content -->
    <main class="main-content">
      <div class="container mt-4">
        <div class="row g-4">
          <?php
          // Define fighting games array
          $products = [
            [
              'image' => 'images/t8.jpeg',
              'alt' => 'Tekken 8',
              'title' => 'Tekken 8',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/sf6.jpeg',
              'alt' => 'Street Fighter 6',
              'title' => 'Street Fighter 6',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/mkx.jpeg',
              'alt' => 'Mortal Kombat x',
              'title' => 'Mortal Kombat x',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/super.jpeg',
              'alt' => 'Super Smash Bros Ultimate',
              'title' => 'Super Smash Bros Ultimate',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/dbzf.jpeg',
              'alt' => 'DragonBall Fighter Z',
              'title' => 'DragonBall Fighter Z',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/vf.jpeg',
              'alt' => 'Virtual Fighter 5',
              'title' => 'Virtual Fighter 5',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/killerIn.jpeg',
              'alt' => 'killer Instinct',
              'title' => 'Killer Instinct',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/mvc.jpeg',
              'alt' => 'Marvel vs Capcom',
              'title' => 'Marvel vs Capcom',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/guilty-gear-strive.jpeg',
              'alt' => 'guilty-gear-strive',
              'title' => 'Guilty Gear Strive',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/KingOF.jpeg',
              'alt' => 'King OF Fighter',
              'title' => 'King OF Fighter',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/sc6.jpeg',
              'alt' => 'Soul Caliver VI',
              'title' => 'Soul Caliver VI',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/DOR.jepg.webp',
              'alt' => 'Dead OR Alive 6',
              'title' => 'Dead OR Alive 6',
              'description' => 'Competitive games where players battle opponents using combos, special moves, and strategic timing. Usually involves one-on-one combat in fast, skill-based matches.',
              'price' => '$49.99'
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