// Dynamically render navbar based on login status
(async function initNavbar() {
  try {
    const res = await fetch('backend/check-auth.php', { credentials: 'include' });
    const data = await res.json();
    
    const navLinks = document.getElementById('nav-links');
    const topBarAuth = document.getElementById('top-bar-auth');
    
    if (!navLinks) return;
    
    // Sidebar navigation (same for all users)
    navLinks.innerHTML = `
      <a href="index.php" class="sidebar-link"><span>Home</span></a>
      <a href="about.php" class="sidebar-link"><span>About</span></a>
      <a href="contact.php" class="sidebar-link"><span>Contact</span></a>
    `;
    
    // Top bar authentication buttons
    if (data.logged_in) {
      // User is logged in - show logout
      if (topBarAuth) {
        topBarAuth.innerHTML = `
          <a href="#" class="top-bar-btn logout-link">Logout</a>
        `;
      }
      
      // Add logout handler
      const logoutLink = document.querySelector('.logout-link');
      if (logoutLink) {
        logoutLink.addEventListener('click', async (e) => {
          e.preventDefault();
          try {
            // Call logout endpoint
            const res = await fetch('backend/logout.php', { credentials: 'include', cache: 'no-store' });
            // Clear client-side cart immediately
            try { localStorage.removeItem('cart'); } catch (err) { /* ignore */ }

            // Verify logout succeeded server-side
            const verify = await fetch('backend/check-auth.php', { credentials: 'include', cache: 'no-store', headers: { 'Cache-Control': 'no-cache' } });
            if (verify && verify.ok) {
              const vdata = await verify.json();
              if (vdata.logged_in) {
                // If still logged in, force full reload to drop stale state
                alert('Logout did not complete. Reloading page.');
                window.location.reload(true);
                return;
              }
            }

            // Safe to redirect to home
            window.location.href = 'index.php';
          } catch (err) {
            console.error('Logout failed:', err);
            window.location.reload();
          }
        });
      }
    } else {
      // User not logged in - show login and signup in top bar
      if (topBarAuth) {
        topBarAuth.innerHTML = `
          <a href="login.php" class="top-bar-btn">Login</a>
          <a href="registration.php" class="top-bar-btn primary">Sign Up</a>
        `;
      }
    }
  } catch (err) {
    console.error('Error loading navbar:', err);
  }
})();
