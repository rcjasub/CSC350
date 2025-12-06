<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - PlayDistrict</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/global.css">
  </head>
  <body class="bg-light">
    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h3 class="card-title mb-3">Sign in to PlayDistrict</h3>

              <div id="message"></div>

              <form id="login-form" novalidate>
                <input type="hidden" name="csrf_token" value="<?php session_start(); echo htmlspecialchars(get_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
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
  </body>
</html>
<?php require_once 'config.php'; ?>
