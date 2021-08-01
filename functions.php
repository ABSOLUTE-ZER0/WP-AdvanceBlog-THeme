<?php

function blog_header_files() {
  wp_enqueue_script("blog_main_script", get_theme_file_uri("/build/index.js"), array('jquery'),1.0, true);
  wp_enqueue_style("blog_main_styles", get_theme_file_uri("/build/style-index.css"));
  if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
    wp_enqueue_script('comment-reply', 'wp-includes/js/comment-reply', array(), false, true);
}
} 
 
function blog_features() {
  register_nav_menu('mainTopHeader', "Main Top Header");
  add_theme_support('title-tag');
}

add_action("wp_enqueue_scripts", "blog_header_files");
add_action("after_setup_theme", "blog_features");
add_theme_support('title-tag');
add_theme_support( 'post-thumbnails' );

// creating featured checkbox

function sm_custom_meta() {
  add_meta_box( 'sm_meta', __( 'Featured Posts', 'sm-textdomain' ), 'sm_meta_callback', 'post' );
}
function sm_meta_callback( $post ) {
  $featured = get_post_meta( $post->ID );
  ?>

<p>
  <div class="sm-row-content">
    <label for="meta-featured">
      <input type="checkbox" name="meta-featured" id="meta-featured" value="yes"
        <?php if ( isset ( $featured['meta-featured'] ) ) checked( $featured['meta-featured'][0], 'yes' ); ?> />
      <?php _e( 'Featured this post', 'sm-textdomain' )?>
    </label>

  </div>
</p>

<?php
}
add_action( 'add_meta_boxes', 'sm_custom_meta' );


// storing featured checkbox value for each post

function sm_meta_save( $post_id ) {
 
  // Checks save status
  $is_autosave = wp_is_post_autosave( $post_id );
  $is_revision = wp_is_post_revision( $post_id );
  $is_valid_nonce = ( isset( $_POST[ 'sm_nonce' ] ) && wp_verify_nonce( $_POST[ 'sm_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

  // Exits script depending on save status
  if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
      return;
  }

// Checks for input and saves
if( isset( $_POST[ 'meta-featured' ] ) ) {
  update_post_meta( $post_id, 'meta-featured', 'yes' );
} else {
  update_post_meta( $post_id, 'meta-featured', '' );
}

}
add_action( 'save_post', 'sm_meta_save' );


function gb_comment_form_tweaks ($fields) {
    //add placeholders and remove labels
    $fields['author'] = '<div><i class="fas fa-user"></i><input type="text" name="name" placeholder="Name *" required="required"></div>';

    $fields['email'] = '<div><i class="far fa-envelope"></i><input type="email" name="email" placeholder="Email *" required="required"></div>';	

    //unset comment so we can recreate it at the bottom
    unset($fields['comment']);

    $fields['comment'] = '<div><i class="fas fa-comment"></i><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" placeholder="Comment *" required="required"></textarea></div>';

    //remove website
    $comment_field = $fields['cookies'];
    unset($fields['url']);
    unset( $fields['cookies'] );
    $fields['cookies'] = $comment_field;

    return $fields;
}

add_filter('comment_form_fields', 'gb_comment_form_tweaks');


//custom sidebar

function my_custom_sidebar() {
  register_sidebar(
      array (
          'name' => __( 'Custom', 'Advanced Blog' ),
          'id' => 'primary',
          'description' => __( 'Custom Sidebar', 'Advanced Blog' ),
          'before_widget' => '<div class="widget-content">',
          'after_widget' => "</div>",
          'before_title' => '<h3 class="widget-title">',
          'after_title' => '</h3>',
      )
  );
}
add_action( 'widgets_init', 'my_custom_sidebar' );



function wpb_set_post_views($postID) {
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
  }else{
      $count++;
      update_post_meta($postID, $count_key, $count);
  }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


function wpb_track_post_views ($post_id) {
  if ( !is_single() ) return;
  if ( empty ( $post_id) ) {
      global $post;
      $post_id = $post->ID;    
  }
  wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


function wpb_get_post_views($postID){
  $count_key = 'wpb_post_views_count';
  $count = get_post_meta($postID, $count_key, true);
  if($count==''){
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0";
  }
  return $count;
}


# Will return true if there is more than one page (either before or after).
function is_paginate_comments( $post_id = 0 ) {
  return get_option( 'page_comments' )  && ( $pagi = (int) get_query_var( 'comments_per_page' ) ) && wp_count_comments( $post_id )->total_comments > $pagi;
}




# Will return true if there is a next page
function pagination_check() {
  global $wp_query;
  return ($wp_query->max_num_pages > 1);
}


function postCard($cardPosts) {
  while ($cardPosts -> have_posts()) {
    $cardPosts -> the_post();
  $categories = get_the_category();
  ?>
<div class="col">
  <div class="posts-card__hover"></div>
  <div class="card posts-card">

    <img onclick="window.location.href = '<?php the_permalink() ?>';" class="card-img-top"
      src="<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url();} else { echo get_theme_file_uri("/images/default.jpg");} ?>" />

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
      src="<?php if(has_post_thumbnail()) { echo get_the_post_thumbnail_url();} else { echo get_theme_file_uri("/images/default.jpg");} ?>" />

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