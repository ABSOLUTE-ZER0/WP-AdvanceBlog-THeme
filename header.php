<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
  <header class="header">
    <div class="header__menu">
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

        <?php 
          if(is_user_logged_in()){ ?>

        <span style="display: flex;align-items: center;">
          <span><?php echo get_avatar(get_current_user_id(), 40); ?></span>
          <a style="border-top-left-radius: 0;border-bottom-left-radius: 0;margin-top: 0.1rem;font-size: 2rem;"
            href="<?php echo wp_logout_url() ?>" class="header__nav--links__signup-container buttonStyle1">
            <span></span>
            <span></span>
            <span></span>
            Logout
          </a>
        </span>

        <?php } else{ ?>

        <a style="font-size: 2rem;  " href="<?php echo wp_login_url() ?>"
          class="header__nav--links__signup-container buttonStyle1">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Login
        </a>

        <?php }
        ?>
      </ul>
    </nav>
  </header>