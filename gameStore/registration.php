<?php require_once 'config.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Register - PlayDistrict</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/global.css">
  </head>
  <body class="bg-light">
    <!-- Sidebar -->
    <div class="sidebar">
      <div id="nav-links">
        <!-- Navbar will be injected here by navbar.js -->
      </div>
    </div>

    <div class="container py-5">
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6">
          <div class="card shadow-sm">
            <div class="card-body p-4">
              <h3 class="card-title mb-3">Create an account</h3>

              <div id="message"></div>

              <form id="register-form" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars(get_csrf_token(), ENT_QUOTES, 'UTF-8'); ?>">
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Your username" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="At least 8 characters" required>
                </div>
                <div class="d-grid">
                  <button id="submit-btn" class="btn btn-success" type="submit">Register</button>
                </div>
              </form>

              <p class="mt-3 mb-0">Already have an account? <a href="login.php">Sign in</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      const form = document.getElementById('register-form');
      const msg = document.getElementById('message');
      const submitBtn = document.getElementById('submit-btn');

      function showMessage(text, type='danger'){
        msg.innerHTML = `<div class="alert alert-${type}" role="alert">${text}</div>`;
      }

      form.addEventListener('submit', async (e)=>{
        e.preventDefault();
        msg.innerHTML = '';

        const formData = new FormData(form);
        const username = (formData.get('username') || '').trim();
        const email = (formData.get('email') || '').trim();
        const password = formData.get('password') || '';

        if(!username || !email || !password){
          showMessage('All fields are required');
          return;
        }

        if(password.length < 8){
          showMessage('Password must be at least 8 characters');
          return;
        }

        submitBtn.disabled = true;
        submitBtn.textContent = 'Registering...';

        try{
          const res = await fetch('backend/register.php', {method:'POST', body: formData, credentials: 'include'});
          const data = await res.json();
          if(data.success){
            showMessage('Account created successfully! Redirecting...', 'success');
            setTimeout(() => window.location.href = 'index.php', 2000);
          } else {
            showMessage(data.message || 'Registration failed');
          }
        }catch(err){
          showMessage('Network error — please try again');
        } finally {
          submitBtn.disabled = false;
          submitBtn.textContent = 'Register';
        }
      });
    </script>
    <script src="js/navbar.js"></script>
  </body>
</html>
