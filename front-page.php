<?php get_header(); ?>

<div class="index">
  <div class="slideshow">
    <div id="home-carousel" class="slideshow__carousel carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">

        <?php // Define our WP Query Parameters
        $featured = new WP_Query( array(
          'posts_per_page' => 3,
          'meta_key' => 'meta-featured',
          'meta_value' => 'yes',
          'ignore_sticky_posts' => true,
      )); 

        while ($featured -> have_posts()) {
          $featured -> the_post(); ?>

        <div class="slideshow__carousel-data carousel-item">
          <div class="slideshow__carousel-data-img-filter">
            <?php if(has_post_thumbnail()){
            the_post_thumbnail();
          } else {
            ?>
            <img src="<?php echo get_theme_file_uri("/images/default.jpg")?>">
            <?php }; ?>
          </div>
          <div class="carousel-caption slideshow__carousel-data-captions">
            <h5><?php the_title(); ?></h5>
            <p>
              <?php if(has_excerpt()){
            echo get_the_excerpt();
          } else{
            echo wp_trim_words(get_the_content() , 18); }?>
            </p>
            <div class="slideshow__carousel-data-readmore-btn buttonStyle2">
              <a href="<?php the_permalink() ?>">Read More <i class="fas fa-angle-double-right"></i></a>
            </div>
          </div>
        </div>

        <?php }; wp_reset_postdata();?>

        <button class="carousel-control-prev slideshow__carousel-btn" type="button" data-bs-target="#home-carousel"
          data-bs-slide="prev">
          <i class="fas fa-chevron-left slideshow__carousel-btn-icon left"></i>
        </button>
        <button class="carousel-control-next slideshow__carousel-btn" type="button" data-bs-target="#home-carousel"
          border-radius: 2rem; data-bs-slide="next">
          <i class="fas fa-chevron-right slideshow__carousel-btn-icon right"></i>
        </button>
      </div>

      <div class="slideshow__waves">
        <img class="slideshow__waves-img" src="<?php echo get_theme_file_uri("images/slideshow-waves-light.png") ?>" />
      </div>
    </div>
  </div>

  <div class="container">
    <div class="data">
      <h1 class="titleStyle1 data__title">What we stand For</h1>
      <div class="about">
        <div class="about__short">
          <div class="about__short-card">
            <img src=<?php echo get_theme_file_uri("images/knowledge.png"); ?> alt="knowledge-img" />
            <h1>knowledge</h1>
            <p>We aim to deliver knowledge and information for FREE.</p>
          </div>
          <div class="about__short-card">
            <img src=<?php echo get_theme_file_uri("images/quality.png"); ?> alt="quality-img" />
            <h1>Quality</h1>
            <p>
              Premium quality information obtained from research and
              personal experience.
            </p>
          </div>
          <div class="about__short-card">
            <img src=<?php echo get_theme_file_uri("images/support.png"); ?> alt="support-img" />
            <h1>Support</h1>
            <p>
              Stuck somewhere or want help? We are always here for you,
              contact us anytime.
            </p>
          </div>
        </div>

        <div class="about__us">
          <div class="about__us-background"></div>
          <h1 class="titleStyle2">About Us</h1>
          <p>
            At this time of age where everyone believes in free knowledge
            online, it's hurtful to see online learning platforms charge
            money! Universities, in general, charge a ludicrous amount of
            money and teach us nothing useful. So we have decided to take
            things into our hands provide you with the knowledge you seek
            and need in real life! Unlike other blogs, you don't need to
            sign up, remove AdBlock, pay to access good content etc. You
            don't have to do anything of that sort nor do you have to pay a
            dime. All you have to pay is ATTENTION. <br /><strong>Happy Learning!</strong>
          </p>
          <div class="about__us-button buttonStyle2">
            <a href="/contact">Contact Us</a>
          </div>
        </div>
      </div>

      <h1 class="titleStyle1 data__title">The Blog</h1>
      <div class="featured">
        <h1 class="titleStyle5">
          <span>Recent&thinsp;</span>&thinsp;Posts
        </h1>
        <div class="posts">
          <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php $recentPosts = new WP_Query( array(
          'post_type'           =>  'post',
          'posts_per_page'      =>  3,
          'ignore_sticky_posts' => true
        )); 

        while ($recentPosts -> have_posts()) {
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

            <?php }; wp_reset_postdata();?>
          </div>
        </div>
      </div>

      <div class="popular">
        <h1 class="titleStyle5">
          <span>Popular&thinsp;</span>&thinsp;Posts
        </h1>
        <div class="posts">
          <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php // Define our WP Query Parameters
        $popularpost = new WP_Query( array( 
          'posts_per_page' => 3,
          'ignore_sticky_posts' => true,
          'meta_key' => 'wpb_post_views_count', 
          'orderby' => 'meta_value_num', 
          'order' => 'DESC'  ) );

        while ($popularpost -> have_posts()) {
          $popularpost -> the_post(); ?>


            <div class="col">
              <div class="posts-card__hover"></div>
              <div class="card posts-card">

                <?php if(has_post_thumbnail()){ ?>

                <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                <?php } else {
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

            <?php }; wp_reset_postdata();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>