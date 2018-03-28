<?php
// Register Custom Post Type
function register_cpt_video() {

    $labels = array(
        'name'                  => _x( 'Videos', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Videos', 'text_domain' ),
        'name_admin_bar'        => __( 'Videos', 'text_domain' ),
        'archives'              => __( 'Video Archives', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent video:', 'text_domain' ),
        'all_items'             => __( 'Videos', 'text_domain' ),
        'add_new_item'          => __( 'Add New Video', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Video', 'text_domain' ),
        'edit_item'             => __( 'Edit Video', 'text_domain' ),
        'update_item'           => __( 'Update Video', 'text_domain' ),
        'view_item'             => __( 'View video', 'text_domain' ),
        'search_items'          => __( 'Search videos', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into video', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this video', 'text_domain' ),
        'items_list'            => __( 'Videos list', 'text_domain' ),
        'items_list_navigation' => __( 'Videos list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Video', 'text_domain' ),
        'description'           => __( 'Videos', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'taxonomies'            => array( 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-heart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'video', $args );

}
add_action( 'init', 'register_cpt_video', 0 );

function getVimeoVideoIdFromUrl($url = '') {
    
        $regs = array();
    
        $id = '';
    
        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
            $id = $regs[3];
        }
    
        return $id;
    
    }


