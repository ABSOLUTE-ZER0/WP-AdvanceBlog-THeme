<?php get_header(); ?>

<div class="contact">

  <div class="contact__form">
    <div class="contact__image-opacity d-lg-none"></div>
    <div style="z-index: 2">
      <h1 class="titleStyle4">Contact Us</h1>
      <?php 
if ( have_posts() ) {
  while ( have_posts() ) {
    the_post();       
  the_content();
  }; 
};
 ?>
    </div>

  </div>

  <div class="contact__image d-none d-lg-flex">
    <div class="contact__image-opacity"></div>

    <h1>Don't be shy</h1>
    <h3>Feel free to get in touch with us, We are always here for you. You can ask us anything including love advice if
      you want 😉</h3>

    <div class="contact__image-details">
      <div>
        <i class="fas fa-envelope"></i>
        <h5>Email Us</h5>
        <p>support@abslzero.in</p>
      </div>

      <div>
        <i class="fas fa-mobile"></i>
        <h5>Message Us</h5>
        <p>+91 7032 2499 255</p>
      </div>
    </div>


  </div>

</div>

<?php footerNoContent() ?>