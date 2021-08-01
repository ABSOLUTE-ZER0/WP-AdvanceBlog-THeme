<div id="sidebar-primary" class="sidebar box-shadow-1 blogpage__main-sidebar archivepage__main-sidebar">
  <?php if ( is_active_sidebar( 'primary' ) ) { 
    dynamic_sidebar( 'primary' ); 
  } else {?>
  <div class="sidebar__posts">
    <div class="sidebar__posts-tabs">
      <a class="sidebar__posts-tabs-recents active" onclick="sidebarPosts('recents')" class="active"
        data-toggle="tooltip" data-placement="bottom" title="Recents"><i class="fas fa-clock"></i></a>
      <a data-toggle="tooltip" data-placement="bottom" title="Popular" class="sidebar__posts-tabs-popular"
        onclick="sidebarPosts('popular')"><i class="fas fa-star"></i></a>
      <a class="sidebar__posts-tabs-comments" onclick="sidebarPosts('comments')" data-toggle="tooltip"
        data-placement="bottom" title="Comments"><i class="fas fa-comments"></i></a>
      <a class="sidebar__posts-tabs-tags" onclick="sidebarPosts('tags')" data-toggle="tooltip" data-placement="bottom"
        title="Tags"><i class="fas fa-tags"></i></a>
    </div>

    <div class="sidebar__posts-content">
      <div class="active sidebar__posts-content-recent">

        <?php // Define our WP Query Parameters
        $the_query = new WP_Query( array( 
          'post_type'           =>  'post',
          'posts_per_page'      =>  5,
          'ignore_sticky_posts' => true
      )); 

        while ($the_query -> have_posts()) {
          $the_query -> the_post(); ?>
        <a href="<?php the_permalink() ?>">
          <div>
            <?php if(has_post_thumbnail()){
            the_post_thumbnail();
          } else {
            ?>
            <img src="<?php echo get_theme_file_uri("/images/default.jpg") ?>">
            <?php
          } ?>
            <div>
              <h1><?php the_title(); ?></h1>
              <p><?php the_time('M j, Y'); ?></p>
            </div>
          </div>
        </a>
        <?php }; wp_reset_postdata();?>


      </div>
      <div class="sidebar__posts-content-popular">

        <?php // Define our WP Query Parameters
        $popularpost = new WP_Query( array( 
          'posts_per_page' => 5,
          'ignore_sticky_posts' => true,
          'meta_key' => 'wpb_post_views_count', 
          'orderby' => 'meta_value_num', 
          'order' => 'DESC'  ) );

        while ($popularpost -> have_posts()) {
          $popularpost -> the_post(); ?>
        <a href="<?php the_permalink() ?>">
          <div>
            <?php if(has_post_thumbnail()){
            the_post_thumbnail();
          } else {
            ?>
            <img src="<?php echo get_theme_file_uri("/images/default.jpg") ?>">
            <?php
          } ?>
            <div>
              <h1><?php the_title(); ?></h1>
              <p><?php the_time('M j, Y'); ?></p>
            </div>
          </div>
        </a>
        <?php }; wp_reset_postdata();?>

      </div>
      <div class="sidebar__posts-content-comments">


        <?php // Define our WP Query Parameters
        $recent_comments = get_comments( array( 
          'number'      => 5, // number of comments to retrieve.
          'status'      => 'approve', // we only want approved comments.
          'post_status' => 'publish' // limit to published comments.
        ) ); 


        if ( $recent_comments ) {
          foreach ( $recent_comments as $comment ) { ?>

        <a href="<?php echo esc_url( get_comment_link( $comment ) ) ?>">
          <div>
            <?php echo get_avatar( get_comment_author( $comment ), 32 )?>
            <div>
              <h1><?php echo get_comment_author( $comment );   ?></h1>
              <h2><?php echo wp_trim_words(strip_tags("$comment->comment_content") , 9); ?></h2>
              <p><?php comment_date('M j, Y', $comment); ?></p>
            </div>
          </div>
        </a>
        <?php }}; wp_reset_postdata();?>

      </div>
      <div class="sidebar__posts-content-tags">
        <?php $tags = get_tags(array('get'=>'all'));
        foreach ($tags as $tag){ ?>
        <a class="sidebar__posts-content-tags-tag" href="<?php echo get_term_link($tag) ?>"><?php echo $tag->name ?></a>
        <?php }; ?>
      </div>
    </div>
  </div>

  <div class="sidebar__featured">
    <h1>Featured</h1>
    <?php // Define our WP Query Parameters
        $featured = new WP_Query( array(
          'posts_per_page' => 5,
          'meta_key' => 'meta-featured',
          'meta_value' => 'yes',
          'ignore_sticky_posts' => true,
      )); 

        while ($featured -> have_posts()) {
          $featured -> the_post(); ?>

    <a href="<?php the_permalink() ?>" class="sidebar__featured-content">
      <?php if(has_post_thumbnail()){
            the_post_thumbnail();
          } else {
            ?>
      <img src="<?php echo get_theme_file_uri("/images/default.jpg") ?>">
      <?php
          } ?>
      <div>
        <h1><?php the_title(); ?></h1>
        <p><?php the_time('M j, Y'); ?></p>
      </div>
    </a>

    <?php }; wp_reset_postdata();?>
  </div>
  <?php }; ?>
</div>