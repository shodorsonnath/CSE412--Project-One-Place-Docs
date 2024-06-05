<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>One-Place doc</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="header">
      <nav class="navbar">
        <h2 class="logo"><a href="#">One-Place doc</a></h2>
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" id="hamburger-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </label>
        <ul class="links">
          <li><a href="#">Home</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="services.php">Services</a></li>
        </ul>
        <div class="buttons">
          <a href="login.php" class="signin">Sign In</a>
          <a href="register.php" class="signup">Sign Up</a>
        </div>
      </nav>
    </header>
    <section class="hero-section">
      <div class="hero">
        <h2>One-Place doc Document</h2>
        <p>
        At One-Place Doc, we revolutionize the way you handle your documents. Our cutting-edge software is designed to streamline your workflow and provide seamless access to all your important files in one convenient location.
        </p>
        <div class="buttons">
          <a href="register.php" class="join">Join Now</a>
          <a href="#" class="learn">Learn More</a>
        </div>
      </div>
      <div class="img">
        <img src="hero-bg.png" alt="hero image" />
      </div>
    </section>
  </body>
</html>