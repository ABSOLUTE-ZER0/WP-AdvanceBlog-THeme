<?php 
get_header(); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<div class="container blogpage">

  <?php if($paged == 1){ ?>

  <div class="blogpage__highlights">

    <?php 
        $sticky = get_option( 'sticky_posts' );
        $args = array(
          'posts_per_page' => 1,
          'post__in' => $sticky,
          'ignore_sticky_posts' => 1
        );
        $stickyPost = new WP_Query( $args );
        while ($stickyPost -> have_posts()) {
          $stickyPost -> the_post(); 
          $postCategories = get_the_category();?>

    <div onclick="window.location.href = '<?php the_permalink() ?>';" class="blogpage__highlights-main box-shadow">
      <div class="blogpage__highlights-main-image"
        style="background-image: url('<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url();} else { echo get_theme_file_uri("/images/default.jpg");} ?>');">
      </div>
      <h1 class="blogpage__highlights-main-title">
        <?php the_title(); ?>
      </h1>
      <div class="blogpage__highlights-main-categories">
        <?php foreach( $postCategories as $category ) { ?>
        <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo $category->name ?></a>
        <?php } ?>
      </div>
      <p class="blogpage__highlights-main-desc">
        <?php if(has_excerpt()){
            echo get_the_excerpt();
          } else{
            echo wp_trim_words(get_the_content() , 18); }?>
      </p>
      <div class="blogpage__highlights-main-metadata">
        <p>By <?php the_author_posts_link(); ?></p>
        <p><i class="far fa-calendar-alt"></i> <?php the_time('M j, Y'); ?></p>
      </div>

      <?php }; wp_reset_postdata();?>




    </div>

    <div class="blogpage__highlights-sub">

      <?php // Define our WP Query Parameters
        $featured = new WP_Query( array(
          'posts_per_page' => 3,
          'meta_key' => 'meta-featured',
          'meta_value' => 'yes',
          'ignore_sticky_posts' => true,
      )); 

        while ($featured -> have_posts()) {
          $featured -> the_post();
          $postCategories = get_the_category(); ?>

      <div onclick="window.location.href = '<?php the_permalink() ?>';"
        class="blogpage__highlights-sub-card box-shadow-2">
        <img class="blogpage__highlights-sub-card-img"
          src="<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url();} else { echo get_theme_file_uri("/images/default.jpg");} ?>" />
        <div class="blogpage__highlights-sub-card-details">
          <h1 class="blogpage__highlights-sub-card-details-title">
            <?php the_title(); ?>
          </h1>

          <div class="blogpage__highlights-sub-card-details-categories">
            <?php foreach( $postCategories as $category ) { ?>
            <a href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo $category->name ?></a>
            <?php } ?>
          </div>
          <p class="blogpage__highlights-sub-card-details-desc">
            <?php if(has_excerpt()){
            echo get_the_excerpt();
          } else{
            echo wp_trim_words(get_the_content() , 18); }?>
          </p>
        </div>
      </div>

      <?php }; wp_reset_postdata();?>
    </div>
  </div>

  <?php }; ?>

  <div class="blogpage__main">
    <div class="blogpage__main-content">

      <?php if($paged == 1){ ?>
      <div class="blogpage__main-content-categories">
        <h1 class="titleStyle2">Top Categories</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

          <?php $allCategories = get_categories( array(
              'orderby'    => 'count',
              'order'      => 'DESC',
              'number' => 3
            )); 
            
            foreach ($allCategories as $category) { ?>
          <div class="col">
            <a style='background-image: url(<?php echo z_taxonomy_image_url($category->term_id); ?>);' href='<?php echo esc_url( get_category_link( $category->term_id )); ?>';
              class="blogpage__main-content-categories-card box-shadow">
              <p><?php echo $category->name ?></p>
            </a>
          </div>

          <?php }?>

        </div>
      </div>
      <?php }; ?>


      <?php $recentPosts = new WP_Query( array(
          'paged'               =>  $paged ,
          'post_type'           =>  'post',
          'posts_per_page'      =>  10,
          'ignore_sticky_posts' => true
        )); ?>


      <div class="posts blogpage__main-content-posts">


        <h1 class="titleStyle2">Top Posts</h1>
        <?php if($paged != 1){ ?>
        <div style="margin-bottom: 3rem;" class="pagination-div">
          <div class="pagination-container ">
            <?php echo paginate_links(array(
                  'total' => $recentPosts->max_num_pages,
                )); ?>
          </div>
        </div>
        <?php }; ?>

        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-4">

          <?php postCard($recentPosts); ?>

          <?php if($recentPosts->max_num_pages > 1){ ?>

          <div class="pagination-div">
            <div class="pagination-container">
              <?php echo paginate_links(array(
                  'total' => $recentPosts->max_num_pages,
                ));?>
            </div>
          </div>
          <?php }; wp_reset_postdata();?>
        </div>
      </div>
    </div>

    <?php get_sidebar( 'primary' ); ?>
  </div>

</div>

<?php 
get_footer();
?>