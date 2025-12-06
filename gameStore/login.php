<?php require_once 'config.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - PlayDistrict</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/contact.css">
  </head>
  <body class="bg-light">
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

    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h3 class="card-title mb-3">Sign in to PlayDistrict</h3>

              <div id="message"></div>

              <form id="login-form" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(get_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
                <div class="d-grid">
                  <button id="submit-btn" class="btn btn-primary" type="submit">Sign In</button>
                </div>
              </form>

              <p class="mt-3 mb-0">Don't have an account? <a href="registration.php">Register</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const form = document.getElementById('login-form');
      const msg = document.getElementById('message');
      const submitBtn = document.getElementById('submit-btn');

      function showMessage(text, type='danger'){
        msg.innerHTML = `<div class="alert alert-${type}" role="alert">${text}</div>`;
      }

      form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        msg.innerHTML = '';

        const formData = new FormData(form); 
        const email = formData.get('email')?.trim();
        const password = formData.get('password') || '';

        if(!email || !password){
          showMessage('Email and password are required');
          return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Signing in...';

        try{
          const res = await fetch('backend/login.php', {method:'POST', body: formData, credentials: 'include'});
          const data = await res.json();
          if(data.success){
            window.location.href = 'index.php';
          } else {
            showMessage(data.message || 'Invalid credentials');
          }
        }catch(err){
          showMessage('Network error — please try again');
        } finally {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Sign In';
        }
      });
    </script>
    <script src="js/navbar.js"></script>
  </body>
</html>
