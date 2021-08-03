<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Allura&family=Berkshire+Swash&family=Josefin+Sans:wght@100;300;400;600;700&display=swap"
    rel="stylesheet" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <script src="https://kit.fontawesome.com/6afec0209b.js" crossorigin="anonymous"></script>
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <header class="header">
    <div  class="header__menu">
      <div class="header__menu--line"></div>
    </div>

    <div class="header__overlay"></div>

    <div class="header__overlay-search">
      <input id="header__search" autofocus type="text" placeholder="Type your keyoword" />
      <div class="header__overlay-search--line"></div>
      <div class="header__overlay-search-results"></div>
    </div>

    <nav class="header__nav">
      <a href="<?php echo site_url() ?>" class="header__nav--logo">
        <!-- <img id="header__logo" src="images/logo-light.png" alt='logo'></img> -->
        Absolute Zero
      </a>

      <ul class="header__nav--links">
      <?php
              wp_nav_menu(array(
                "theme_location" => "mainTopHeader"
              ))
            ?>

        <div class="header__nav--links__search-container">
          <i class="fas fa-search"></i>
        </div>
        <div class="header__nav--links__toggle-container">
          <input type="checkbox" id="toggle" name="theme" />
        </div>
      </ul>
    </nav>
  </header>