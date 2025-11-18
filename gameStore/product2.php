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
      <h2>SURVIVAL HORROR GAMES</h2>
    </div>

    <!-- Main content -->
    <main class="main-content">
      <div class="container mt-4">
        <div class="row g-4">
          <?php
          // Define survival horror games array
          $products = [
            [
              'image' => 'images/re4.jpeg',
              'alt' => 'Resident Evil 4 cover',
              'title' => 'Resident Evil 4',
              'description' => 'Action-packed RPG with deep storytelling and stylish combat.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/sh2.jpeg',
              'alt' => 'Silent Hill 2',
              'title' => 'Silent Hill 2',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/deadSpace2.jpeg',
              'alt' => 'Dead Space 2',
              'title' => 'Dead Space 2',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/ff3.jpeg',
              'alt' => 'Fatal Frame 3',
              'title' => 'Fatal Frame 3',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/alien.jpeg',
              'alt' => 'Alien Isolation',
              'title' => 'Alien Isolation',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/evw.jpeg',
              'alt' => 'The Evil Within',
              'title' => 'The Evil Within',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/AlanWake2.jpeg',
              'alt' => 'Alan Wake 2',
              'title' => 'Alan Wake 2',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/chronos.jpeg',
              'alt' => 'Chronos',
              'title' => 'Chronos',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/outLast.jpeg',
              'alt' => 'OUTLAST',
              'title' => 'OUTLAST',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/re7.jpeg',
              'alt' => 'Resident Evil 7',
              'title' => 'Resident Evil 7',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/UntilDawn.jpeg',
              'alt' => 'Until Dawn',
              'title' => 'Until Dawn',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
              'price' => '$49.99'
            ],
            [
              'image' => 'images/shf.jpeg',
              'alt' => 'Silent Hill F',
              'title' => 'Silent Hill F',
              'description' => 'Games where players take on the role of a character and develop their abilities over time. They usually feature story-driven quests, leveling systems, and character customization.',
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