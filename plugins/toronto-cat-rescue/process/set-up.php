<?php 


/* ----------------------------------------------- *\
                CREATING POST TYPE
\* ----------------------------------------------- */

function trc_register_cat_post_type(){
    register_post_type('cats', // Register Custom Post Type
        array(
        'labels' => array(
            'name' =>'Cats', // Rename these to suit
            'singular_name' =>'Cats',
            'add_new' => 'Add New Cat',
            'add_new_item' => 'Add New Cat',
            'edit' => 'Edit',
            'edit_item' => 'Edit Cat',
            'new_item' => 'New Cat',
            'view' => 'View Cat',
            'view_item' => 'View Cat',
            'search_items' => 'Search Cat',
            'not_found' => 'No Cat',
            'not_found_in_trash' => 'No Cats found in trash',
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, 
    ));
}

add_action('init', 'trc_register_cat_post_type' );


/* ----------------------------------------------- *\
                CREATING MENU PAGE
\* ----------------------------------------------- */




