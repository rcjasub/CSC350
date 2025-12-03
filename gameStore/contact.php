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
    <!-- Sidebar -->
    <div class="sidebar">
      <a href="index.php" class="sidebar-link active">
        <span> Home </span>
      </a>
      <a href="about.php" class="sidebar-link active">
        <span> About </span>
      </a>
      <a href="contact.php" class="sidebar-link active">
        <span> Contact </span>
      </a>
    </div>

    <!-- Main Content -->
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
</html>
