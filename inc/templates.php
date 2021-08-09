<?php 

global $themeLightOrDark;

function footerNoContent() { ?>

<div class="scroll"></div>

<script>
  //set dark and light mode

  let checkbox = document.querySelector('input[name="theme"]');
  let htmlElement = document.documentElement;
  const logo = document.getElementById("header__logo");
  let slideshowFilter = document.querySelector(".slideshow__waves-img");

  checkbox.addEventListener("click", () => {
      {
        if (localStorage.getItem("darkMode") == "true") {
          switchLightMode();
        } else {
          switchDarkMode();
        }
      };
    });
 
  let smoothTrans = () => {
    htmlElement.classList.add("transition");

    window.setTimeout(() => {
      htmlElement.classList.remove("transition");
    }, 500);
  };

  const switchDarkMode = (trans = true) => {
    $themeLightOrDark = "dark";
    checkbox.checked = true; 
    localStorage.setItem("darkMode", "true")
    if(trans){
      smoothTrans();
    }
    if (logo) {
      logo.src = "images/logo-dark.png";
    }
    if (slideshowFilter){
      slideshowFilter.src = "<?php echo get_theme_file_uri("images/slideshow-waves-dark.png"); ?>";
    }
    htmlElement.setAttribute("data-theme", "dark");
  };


  const switchLightMode = (trans = true) => {
    $themeLightOrDark = "light";
    checkbox.checked = false;
    localStorage.setItem("darkMode", "false")
    if(trans){
      smoothTrans();
    }
    if (logo) {
      logo.src = "images/logo-light.png";
    }
    if (slideshowFilter){
      slideshowFilter.src = "<?php echo get_theme_file_uri("images/slideshow-waves-light.png"); ?>";
    }
    htmlElement.setAttribute("data-theme", "light");
  };
</script>

<?php wp_footer(); ?>
</body>

</html>

<?php }

function postCard($cardPosts) {
  while ($cardPosts -> have_posts()) {
    $cardPosts -> the_post();
  $categories = get_the_category();
  ?>
<div class="col">
  <div class="posts-card__hover"></div>
  <div class="card posts-card">

    <img onclick="window.location.href = '<?php the_permalink() ?>';" class="card-img-top"
      src="<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url();} else { echo get_theme_file_uri("/images/default.webp");} ?>" />

    <div class="card-body">
      <div class="posts-card__title">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        <p><i class="fas fa-comment"><span><?php echo wp_count_comments(get_the_id())->total_comments ?></span></i>
        </p>
      </div>

      <div class="posts-card__metadata">
        <p>
          By <?php the_author_posts_link(); ?>
          <span>
            <i class="far fa-calendar-alt"></i> <?php the_time('M j, Y'); ?></span>
        </p>
      </div>

      <div class="posts-card__categories">
        <?php foreach( $categories as $category ) { ?>
        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo $category->name ?></a>
        <?php } ?>
      </div>

      <p class="card-text posts-card__desc">
        <?php if(has_excerpt()){
                echo get_the_excerpt();
              } else{
                echo wp_trim_words(get_the_content() , 18); }?>
      </p>

      <a href="<?php the_permalink() ?>" class="posts-card__readmore buttonStyle1">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <p>
          Continue <i class="fas fa-angle-double-right"></i>
        </p>
      </a>
    </div>
  </div>
</div>

<?php
}}; 


function postCardDefault() {
  while (have_posts()) {
    the_post();
  $categories = get_the_category();
  ?>
<div class="col">
  <div class="posts-card__hover"></div>
  <div class="card posts-card">

    <img onclick="window.location.href = '<?php the_permalink() ?>';" class="card-img-top"
      src="<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url();} else { echo get_theme_file_uri("/images/default.webp");} ?>" />

    <div class="card-body">
      <div class="posts-card__title">
        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        <p><i class="fas fa-comment"><span><?php echo wp_count_comments(get_the_id())->total_comments ?></span></i>
        </p>
      </div>

      <div class="posts-card__metadata">
        <p>
          By <?php the_author_posts_link(); ?>
          <span>
            <i class="far fa-calendar-alt"></i> <?php the_time('M j, Y'); ?></span>
        </p>
      </div>

      <div class="posts-card__categories">
        <?php foreach( $categories as $category ) { ?>
        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo $category->name ?></a>
        <?php } ?>
      </div>

      <p class="card-text posts-card__desc">
        <?php if(has_excerpt()){
                echo get_the_excerpt();
              } else{
                echo wp_trim_words(get_the_content() , 18); }?>
      </p>

      <a href="<?php the_permalink() ?>" class="posts-card__readmore buttonStyle1">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <p>
          Continue <i class="fas fa-angle-double-right"></i>
        </p>
      </a>
    </div>
  </div>
</div>

<?php
}}; 
