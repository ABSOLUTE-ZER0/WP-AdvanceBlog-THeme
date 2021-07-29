<?php 
get_header(); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>

<div class="container blogpage">

  <?php if($paged == 1){ ?>

  <div class="blogpage__highlights">
    <div class="blogpage__highlights-main box-shadow">
      <div class="blogpage__highlights-main-image"></div>
      <h1 class="blogpage__highlights-main-title">
        Some random card title goes here
      </h1>
      <div class="blogpage__highlights-main-categories">
        <p>Buiseness</p>
        <p>Animal</p>
        <p>Animal</p>
      </div>
      <p class="blogpage__highlights-main-desc">
        s viverra dictum. Maecenas bibendum accumsan pharetra. Nunc a
        dignissim tortor. Curabitur luctus nisi in risus egestas sodales.
        Donec blandit felis
      </p>
      <div class="blogpage__highlights-main-metadata">
        <p>By Zero</p>
        <p><i class="far fa-calendar-alt"></i> Feb 29, 2020</p>
      </div>
    </div>

    <div class="blogpage__highlights-sub">
      <div class="blogpage__highlights-sub-card box-shadow-2">
        <img src="./images/test.jpg" class="blogpage__highlights-sub-card-img" />
        <div class="blogpage__highlights-sub-card-details">
          <h1 class="blogpage__highlights-sub-card-details-title">
            Some random card title goes here
          </h1>

          <div class="blogpage__highlights-sub-card-details-categories">
            <p>Buiseness</p>
            <p>Animal</p>
          </div>
          <p class="blogpage__highlights-sub-card-details-desc">
            s viverra dictum. Maecenas bibendum accumsan pharetra. Nunc a
            dignissim tortor. Curabitur luctus nisi in risus egestas
            sodales. Donec blandit felis
          </p>
        </div>
      </div>

      <div class="blogpage__highlights-sub-card box-shadow-2">
        <img src="./images/test.jpg" class="blogpage__highlights-sub-card-img" />
        <div class="blogpage__highlights-sub-card-details">
          <h1 class="blogpage__highlights-sub-card-details-title">
            Some random card title goes here
          </h1>

          <div class="blogpage__highlights-sub-card-details-categories">
            <p>Buiseness</p>
            <p>Animal</p>
          </div>
          <p class="blogpage__highlights-sub-card-details-desc">
            s viverra dictum. Maecenas bibendum accumsan pharetra. Nunc a
            dignissim tortor. Curabitur luctus nisi in risus egestas
            sodales. Donec blandit felis
          </p>
        </div>
      </div>

      <div class="blogpage__highlights-sub-card box-shadow-2">
        <img src="./images/test.jpg" class="blogpage__highlights-sub-card-img" />
        <div class="blogpage__highlights-sub-card-details">
          <h1 class="blogpage__highlights-sub-card-details-title">
            Some random card title goes here
          </h1>

          <div class="blogpage__highlights-sub-card-details-categories">
            <p>Buiseness</p>
            <p>Animal</p>
          </div>
          <p class="blogpage__highlights-sub-card-details-desc">
            s viverra dictum. Maecenas bibendum accumsan pharetra. Nunc a
            dignissim tortor. Curabitur luctus nisi in risus egestas
            sodales. Donec blandit felis
          </p>
        </div>
      </div>
    </div>
  </div>

  <?php }; ?>

  <div class="blogpage__main">
    <div class="blogpage__main-content">

      <?php if($paged == 1){ ?>
      <div class="blogpage__main-content-categories">
        <h1 class="titleStyle2">Top Categories</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
          <div class="col">
            <div class="blogpage__main-content-categories-card box-shadow">
              <p>category 1</p>
            </div>
          </div>

          <div class="col">
            <div class="blogpage__main-content-categories-card box-shadow">
              <p>category 2</p>
            </div>
          </div>

          <div class="col">
            <div class="blogpage__main-content-categories-card box-shadow">
              <p>category 3</p>
            </div>
          </div>
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

          <?php while ($recentPosts -> have_posts()) {
          $recentPosts -> the_post(); 
          $categories = get_the_category();?>


          <div class="col">
            <div class="posts-card__hover"></div>
            <div class="card posts-card">

              <?php if(has_post_thumbnail()) { ?>
              <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" /> <?php } else {
             ?>
              <img class="card-img-top" src="<?php echo get_theme_file_uri("/images/default.jpg")?>">
              <?php }; ?>
              <div class="card-body">
                <div class="posts-card__title">
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                  <p><i
                      class="fas fa-comment"><span><?php echo wp_count_comments(get_the_id())->total_comments ?></span></i>
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
                  <a
                    href="<?php echo esc_url( get_category_link( $category->term_id ) ) ?>"><?php echo $category->name ?></a>
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
          <?php };?>

          <div class="pagination-div">
            <div class="pagination-container">
              <?php echo paginate_links(array(
                  'total' => $recentPosts->max_num_pages,
                )); ?>
            </div>
          </div>

        </div>
      </div>
    </div>

    <?php get_sidebar( 'primary' ); ?>
  </div>

</div>

<?php 
get_footer();
?>