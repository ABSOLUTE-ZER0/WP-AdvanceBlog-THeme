<?php
get_header();
while (have_posts()) {
the_post(); ?>
<div class="post">
  <div class="post__image">
    <?php if(has_post_thumbnail()){
            the_post_thumbnail();
          } else {
            ?>
    <img src="<?php echo get_theme_file_uri("/images/default.jpg") ?>">
    <?php
          } ?>
  </div>
  <div class="post__details">
    <h1 class="post__details-title titleStyle3">
      <?php the_title() ?>
    </h1>
    <div class="post__details-excerpt">
      <p><?php if(has_excerpt()){
            echo get_the_excerpt();
          } ?>
      </p>
    </div>
  </div>

  <div class="container post__content">
    <?php
      if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
      }
    ?>
    <div class="post__content-main">
      <div class="post__content-main-content">

        <?php the_content(); ?>
      </div>

      <div class="post__content-main-sidebar">
        <div class="post__content-main-sidebar-metadata">
          <div>
            <div>
              <h3>views</h3>
              <p><?php echo wpb_get_post_views(get_the_ID()); ?></p>
            </div>
          </div>
          <div>
            <div style="border-left: 1px solid var(--color-text-m)">
              <h3>comments</h3>
              <p><?php echo wp_count_comments(get_the_id())->total_comments ?></p>
            </div>
          </div>
        </div>
        <?php get_sidebar( 'primary' ); ?>
      </div>
    </div>
    <?php
      if ( comments_open()) {
        comments_template( '/comments.php', true );
      }
    ?>
  </div>
</div>
<?php }
get_footer();
?>