<?php
 
function blog_post_types() {
  register_post_type('game', array(
    'public' => true,
    'capability_type' => 'game',
    'map_meta_cap' => true,
    'show_in_rest' => true,
    "supports" => array("title", "editor", "excerpt"),
    'labels' => array(
      'name' => 'Game',
      'add_new_item' => 'Add New Game',
      'edit_item' => 'Edit Event',
      'all_items' => 'All Games',
      'singular_name' => 'Game'
    ),
    'menu_icon' => 'dashicons-games'
  ));
}
 
add_action('init', 'blog_post_types');