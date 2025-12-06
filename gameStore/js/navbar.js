// Dynamically render navbar based on login status
(async function initNavbar() {
  try {
    const res = await fetch('backend/check-auth.php', { credentials: 'include' });
    const data = await res.json();
    
    const navLinks = document.getElementById('nav-links');
    if (!navLinks) return;
    
    if (data.logged_in) {
      // User is logged in - show logout
      navLinks.innerHTML = `
        <a href="index.php" class="sidebar-link"><span>Home</span></a>
        <a href="about.php" class="sidebar-link"><span>About</span></a>
        <a href="contact.php" class="sidebar-link"><span>Contact</span></a>
        <a href="backend/logout.php" class="sidebar-link"><span>Logout</span></a>
      `;
    } else {
      // User not logged in - show login and signup
      navLinks.innerHTML = `
        <a href="index.php" class="sidebar-link"><span>Home</span></a>
        <a href="about.php" class="sidebar-link"><span>About</span></a>
        <a href="contact.php" class="sidebar-link"><span>Contact</span></a>
        <a href="login.php" class="sidebar-link"><span>Login</span></a>
        <a href="registration.php" class="sidebar-link"><span>Sign Up</span></a>
      `;
    }
  } catch (err) {
    console.error('Error loading navbar:', err);
  }
})();
