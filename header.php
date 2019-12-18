<?php
require_once("functions.php");
?>

<body>
  <nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container-fluid">
      <a class="navbar-brand nav-link" href="index.php">
        Meet Players
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span> <i class="fas fa-bars fa-2x"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link bl js-scroll-trigger" href="index.php">Home</a>
          </li>
          <li class="nav-item">
          <?php if (isUserLoggedIn()) { ?>
              <a class="nav-link bl js-scroll-trigger" href="selectProfile.php">Profile</a>
            <?php } else { ?>
              <a class="nav-link bl js-scroll-trigger" href="#"></a>
            <?php } ?>
          </li>
          <li class="nav-item">
            <?php if (isUserLoggedIn()) { ?>
              <a class="nav-link bl js-scroll-trigger" href="logout.php">Logout</a>
            <?php } else { ?>
              <a class="nav-link bl js-scroll-trigger" href="login.php">Login</a>
            <?php } ?>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link bl js-scroll-trigger" href="#about" data-toggle="collapse"
            data-target=".navbar-collapse.show">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bl js-scroll-trigger" href="#contactus" data-toggle="collapse"
            data-target=".navbar-collapse.show">Contact Us</a>
          </li> -->
        </ul>
      </div>
    </div>
  </nav>