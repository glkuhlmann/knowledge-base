<?php
/*
Plugin Name: Spyderserve Knowledge Base
Plugin URI:  http://github.com/glkuhlmann/knowledge-base
Description: Post types and taxonomies for a WordPress-powered knowledge base. Integrate into your theme as you choose. Use <a href="https://wordpress.org/plugins/custom-post-type-permalinks/">Custom Post Type Permalinks</a> for further control over permalink structure.
Author:      Gary Kuhlmann and Galen Gidman
Author URI:  http://glkuhlmann.com/
Version:     1.0
Text Domain: knowledge-base
*/

/**
 * Register knowledge base post types.
 */
function kb_register_post_types() {

  $labels = array(
    'name'               => __( 'Articles', 'knowledge-base' ),
    'singular_name'      => __( 'Article', 'knowledge-base' ),
    'menu_name'          => __( 'Knowledge Base', 'knowledge-base' ),
    'name_admin_bar'     => __( 'KB Article', 'knowledge-base' ),
    'all_items'          => __( 'Articles', 'knowledge-base' ),
    'add_new_item'       => __( 'Add New Article', 'knowledge-base' ),
    'edit_item'          => __( 'Edit Article', 'knowledge-base' ),
    'new_item'           => __( 'New Article', 'knowledge-base' ),
    'view_item'          => __( 'View Article', 'knowledge-base' ),
    'search_items'       => __( 'Search Articles', 'knowledge-base' ),
    'not_found'          => __( 'No articles found.', 'knowledge-base' ),
    'not_found_in_trash' => __( 'No articles found in trash.', 'knowledge-base' )
  );

  $supports = array(
    'title',
    'editor',
    'author',
    'thumbnail',
    'excerpt',
    'revisions',
    'page-attributes'
  );

  $args = array(
    'labels'      => $labels,
    'public'      => true,
    'menu_icon'   => 'dashicons-sos',
    'rewrite'     => array(
      'slug'       => 'kbase',
      'with_front' => false
     ),
    'has_archive' => true,
    'hierarchical' => true,
    'capability_type' => 'page',
    'supports'    => $supports
  );

  register_post_type( 'spyder-kb', $args );
  
  flush_rewrite_rules();

}
add_action( 'init', 'kb_register_post_types' );

/**
 * Register knowledge base taxonomies.
 */
function kb_register_taxonomies() {

  $args = array(
    'hierarchical' => true,
    'rewrite'      => array(
     'slug'       => 'kb',
     'with_front' => false
    )
  );

  register_taxonomy( 'kb_category', 'spyder-kb', $args );

}
add_action( 'init', 'kb_register_taxonomies' );
