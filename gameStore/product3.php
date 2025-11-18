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
      <h2>ROLE PLAYING GAMES</h2>
    </div>

    <!-- Main content -->
    <main class="main-content">
      <div class="container mt-4">
        <div class="row g-4">
          <?php
          // Define role-playing games array
          $products = [
            [
              'image' => 'images/FF7.jpeg',
              'alt' => 'Final Fantasy 7 cover',
              'title' => 'Final Fantasy 7',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/pr3.jpeg',
              'alt' => 'Persona 3',
              'title' => 'Persona 3',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/metaphor.jpeg',
              'alt' => 'metaphor refantazio',
              'title' => 'Metaphor Refantazio',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/ds3.jpeg',
              'alt' => 'Dark Souls 3',
              'title' => 'Dark Souls 3',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/ff13.jpeg',
              'alt' => 'Final Fantasy 13',
              'title' => 'Final Fantasy 13',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/bloodborne.jpeg',
              'alt' => 'bloodborne',
              'title' => 'Bloodborne',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/cyberpunk2077.jpeg',
              'alt' => 'cyberpunk2077',
              'title' => 'Cyberpunk2077',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/expidition33.jpeg',
              'alt' => 'expidition33',
              'title' => 'Expedition 33',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/falloutNewVegas.jpeg',
              'alt' => 'falloutNewVegas',
              'title' => 'Fallout New Vegas',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/EldenRing.jpeg',
              'alt' => 'Elden Ring',
              'title' => 'Elden Ring',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/p5.jpeg',
              'alt' => 'Persona 5',
              'title' => 'Persona 5',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/disco.jpeg',
              'alt' => 'Disco Elysium',
              'title' => 'Disco Elysium',
              'description' => 'A genre that blends fear, resource management, and tense atmosphere. Players must survive dangerous environments while facing limited supplies and frightening enemies.',
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