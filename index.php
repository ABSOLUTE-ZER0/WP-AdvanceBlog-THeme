<?php 
get_header(); ?>
<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg") ?>)">
  </div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">PUT SOME FANCY WELCOME MESSAGE
    </h1>
    <div class="page-banner__intro">
      <p>DONT FORGET TO REPLACE ME
      </p>
    </div>
  </div>
</div>
<div class="container container--narrow page-section">
  <?php
while(have_posts()){
the_post(); ?>
  <div class="post-item">
    <h2>
      <a href="<?php the_permalink() ?>">
        <?php the_title() ?>
      </a>
    </h2> 
    <div class="metabox">
      <p style="margin-bottom: 0">Poster by 
        <?php the_author_posts_link(); ?> on 
        <?php the_time('M j, Y'); ?> in 
        <?php echo get_the_category_list(", "); ?>
      </p>
    </div>
    <div class="generic-content">
      <?php the_excerpt(); ?>
    </div>
    <p>
      <a style="margin-top: 10px" class="btn btn--blue" href="<?php the_permalink() ?>" >Continue reading &raquo;
      </a>
    </p>
  </div>
  <?php }
echo paginate_links();
?>
</div>
<?php 
get_footer();
?>
