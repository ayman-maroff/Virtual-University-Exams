<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="<?php echo URL; ?>public/css/navbar.css">

<!-- Navbar Section -->
<nav class="navbar">
  <div class="navbar__container">
    <a href="#home" id="navbar__logo">University</a>
    <div class="navbar__toggle" id="mobile-menu">
      <span class="bar"></span> <span class="bar"></span>
      <span class="bar"></span>
    </div>
    <ul class="navbar__menu">
      <li class="navbar__item">
        <a href="<?php echo URL; ?>" class="navbar__links" id="home-page">Home</a>
      </li>
      <li class="navbar__item">
        <!-- <a href="#about" class="navbar__links" id="about-page">About</a> -->
      </li>
      <li class="navbar__item">
        <!-- <a href="#services" class="navbar__links" id="services-page">Services</a> -->
      </li>
      <li class="navbar__btn">
        <a href="<?php echo URL; ?>user/logout" class="button">Logout</a>
      </li>
    </ul>
  </div>
</nav>