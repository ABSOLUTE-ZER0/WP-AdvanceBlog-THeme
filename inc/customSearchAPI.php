<?php

add_action('rest_api_init', 'blogSearch');

function blogSearch(){
  register_rest_route('blog/v1', 'search', array(
    'methods' => 'GET',
    'callback' => "blogSearchResults"
  ));
}

function blogSearchResults($data) {
  $defaultSearchResult = new WP_Query(array(
    'post_type' => array('post', 'page'),
    's' => sanitize_text_field($data['search'])
  ));

  $customResult = array(
    'post' => array(),
    'page' => array()
  );

  while($defaultSearchResult->have_posts()){
    $defaultSearchResult->the_post();

    if(get_post_type() == 'post'){
      array_push($customResult['post'], array(
        'title' => get_the_title(),
        'link' => get_the_permalink(),
        'authorName' => get_the_author()
      ));
    };

    if(get_post_type() == 'page'){
      array_push($customResult['page'], array(
        'title' => get_the_title(),
        'link' => get_the_permalink(),
        'authorName' => get_the_author()
      ));
    };
;
  };

  return $customResult;
}