<?php

/**
 * Register a custom post type called "Photo Album".
 *
 * @see get_post_type_labels() for label keys.
 */
function apphotography_init_post_types() {
    $labels = array(
        'name'                  => esc_html_x( 'Photo Albums', 'Post type general name', 'apphotography' ),
        'singular_name'         => esc_html_x( 'Photo Album', 'Post type singular name', 'apphotography' ),
        'menu_name'             => esc_html_x( 'Photo Albums', 'Admin Menu text', 'apphotography' ),
        'name_admin_bar'        => esc_html_x( 'Photo Album', 'Add New on Toolbar', 'apphotography' ),
        'add_new'               => esc_html__( 'Add New', 'apphotography' ),
        'add_new_item'          => esc_html__( 'Add New Photo Album', 'apphotography' ),
        'new_item'              => esc_html__( 'New Photo Album', 'apphotography' ),
        'edit_item'             => esc_html__( 'Edit Photo Album', 'apphotography' ),
        'view_item'             => esc_html__( 'View Photo Album', 'apphotography' ),
        'all_items'             => esc_html__( 'All Photo Albums', 'apphotography' ),
        'search_items'          => esc_html__( 'Search Photo Albums', 'apphotography' ),
        'parent_item_colon'     => esc_html__( 'Parent Photo Albums:', 'apphotography' ),
        'not_found'             => esc_html__( 'No Photo Albums found.', 'apphotography' ),
        'not_found_in_trash'    => esc_html__( 'No Photo Albums found in Trash.', 'apphotography' ),
        'featured_image'        => esc_html_x( 'Photo Album Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'apphotography' ),
        'set_featured_image'    => esc_html_x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'apphotography' ),
        'remove_featured_image' => esc_html_x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'apphotography' ),
        'use_featured_image'    => esc_html_x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'apphotography' ),
        'archives'              => esc_html_x( 'Photo Album archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'apphotography' ),
        'insert_into_item'      => esc_html_x( 'Insert into Photo Album', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'apphotography' ),
        'uploaded_to_this_item' => esc_html_x( 'Uploaded to this Photo Album', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'apphotography' ),
        'filter_items_list'     => esc_html_x( 'Filter Photo Albums list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'apphotography' ),
        'items_list_navigation' => esc_html_x( 'Photo Albums list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'apphotography' ),
        'items_list'            => esc_html_x( 'Photo Albums list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'apphotography' ),
    );
    // above resetting label names from left to right 

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        // can see in back end
        'show_ui'            => true,
        // can see in menu options
        'show_in_menu'       => true,
        // allow to use query var in url , the post-slug
        'query_var'          => true,
        // recommended that slugs be plural
        'rewrite'            => array( 'slug' => 'albums' ),
        // act with capabilities as a post
        'capability_type'    => 'post',
        // has access to archive to load all books
        'has_archive'        => true,
        // accesses a page, which is hieerarchial, want post to just be post, no parent or children
        'hierarchical'       => false,
        // can put on left hand of our site
        'menu_position'      => null,
        // use dashicons to customizethe menu
        'menu_icon'      => 'dashicons-book-alt',
        // to allow use of gutenburg blocks
        'show_in_rest' => true,
        // want it to have support for all these elements, usually would remove comments
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
    );
//  call our arguments, add text domain to post type, so wont be overriden by others
    // register_post_type( 'apphotography_photo', $args );
    register_post_type( 'apphoto_album', $args );



    // events post type
    $labels = array(
        'name'                  => esc_html__('Events', 'bygone_theme'),
        'singular_name'         => esc_html__('Event', 'bygone_theme'),
        'menu_name'             => esc_html__('Events', 'bygone_theme'),
        'name_admin_bar'        => esc_html__('Event', 'bygone_theme'),
        'add_new'               => esc_html__('Add New', 'bygone_theme'),
        'add_new_item'          => esc_html__('Add New Event', 'bygone_theme'),
        'new_item'              => esc_html__('New Event', 'bygone_theme'),
        'edit_item'             => esc_html__('Edit Event', 'bygone_theme'),
        'view_item'             => esc_html__('View Event', 'bygone_theme'),
        'all_items'             => esc_html__('All Events', 'bygone_theme'),
        'search_items'          => esc_html__('Search Events', 'bygone_theme'),
        'parent_item_colon'     => esc_html__('Parent Events:', 'bygone_theme'),
        'not_found'             => esc_html__('No events found.', 'bygone_theme'),
        'not_found_in_trash'    => esc_html__('No events found in Trash.', 'bygone_theme'),
        'archives'              => esc_html__('Event archives', 'bygone_theme'),
        'insert_into_item'      => esc_html__('Insert into event', 'bygone_theme'),
        'uploaded_to_this_item' => esc_html__('Uploaded to this event', 'bygone_theme'),
        'filter_items_list'     => esc_html__('Filter events list', 'bygone_theme'),
        'items_list_navigation' => esc_html__('Events list navigation', 'bygone_theme'),
        'items_list'            => esc_html__('Events list', 'bygone_theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-calendar',
        'show_in_rest'       => true,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('bygone_theme_event', $args);















}
// change function name here and up top
// can register multiple in one action
add_action( 'init', 'apphotography_init_post_types' );
