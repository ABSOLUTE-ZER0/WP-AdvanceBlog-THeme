<?php 
get_header(); 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$category = get_category( get_query_var( 'cat' ) );?>

<div class="archivepage">
  <div class="archivepage__image">
    <img src="<?php
    if(is_category() and (function_exists('z_taxonomy_image_url'))){
      if(empty(z_taxonomy_image_url($category->term_id))){
        echo get_theme_file_uri("/images/default.jpg"); 
      } else{
        echo z_taxonomy_image_url($category->term_id);
      }
    } else {
      echo get_theme_file_uri("/images/default.jpg");
    }?>">
  </div>


  <div class="archivepage__details">
    <h1 class="archivepage__details-title titleStyle3">
      <?php 
    if(is_category()){
      single_cat_title();
    } 
    else if(is_author()){
      echo "Posts By" ; the_author();
    }
    else{
      the_archive_title();
    }
    ?>
    </h1>
    <div class="archivepage__details-excerpt">
      <p><?php the_archive_description() ?>
      </p>
    </div>
  </div>

  <div class="archivepage__main container">
    <div class="archivepage__main-content">

      <?php ?>


      <div class="posts archivepage__main-content-posts">


        <h1 class="titleStyle2">Related Posts</h1>
        <?php if($paged != 1 and pagination_check()){ ?>
        <div style="margin-bottom: 3rem;" class="pagination-div">
          <div class="pagination-container ">
            <?php echo paginate_links(); ?>
          </div>
        </div>
        <?php }; ?>

        <div class="row row-cols-1 row-cols-md-1 row-cols-lg-2 g-4">

          <?php postCardDefault(); ?>

          <?php if(pagination_check()) { ?>

          <div class="pagination-div">
            <div class="pagination-container">
              <?php echo paginate_links(); ?>
            </div>
          </div>
          <?php }; 
                wp_reset_postdata();
              ?>
        </div>
      </div>
    </div>

    <?php get_sidebar( 'primary' ); ?>
  </div>
  <?php 
get_footer();
?>