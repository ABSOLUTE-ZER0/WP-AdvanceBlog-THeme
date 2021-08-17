<?php 

add_action('rest_api_init', "blogLike");

function blogLike() {
  register_rest_route("blog/v1", "like", array(
    'methods' => "POST",
    "callback" => 'addLike',
  ));

  register_rest_route("blog/v1", "like", array(
    'methods' => "DELETE",
    "callback" => 'deleteLike',
  ));
}

function addLike($data) {

  if(is_user_logged_in()){

    $postId = sanitize_text_field($data['postId']);

    $checkLiked = new WP_Query(array(
      'author' => get_current_user_id(),
      'post_type' => 'like',
      'meta_query' => array(
        array(
          'key' => "liked_post",
          "compare" => "=",
          "value" => $postId 
        )
      )
    ));

    if($checkLiked->found_posts == 0){
      return array(
        "id"  => wp_insert_post(array(
          'post_type' => 'like',
          'post_status' => 'publish',
          'post_title' => 'like',
          'meta_input' => array(
            'liked_post' => $postId,
          ),
        )),
      "status" => "liked"
      );
    } else {
      die("Post already liked!");
    }
  } else {
    die("Only logged in users can like a post!");
  }
}

function deleteLike($data) {
    $likeId = sanitize_text_field($data['likeId']);

    if(get_current_user_id() == get_post_field('post_author', $likeId)){
      wp_delete_post($likeId, true);
      return "unliked";
    } else {
      die($likeId);
    }
}