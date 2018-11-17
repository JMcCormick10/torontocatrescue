 <?php
/*
Plugin Name: Toronto Cat Rescue
Plugin URI: none
Description: Organized cat data and streamlines adoption process for toronto cat rescue 
Version: 1.0.0
Author: hackstreetboys
License: GPLv2 or later


//create cat post type
//add button to sync data from pet point 


/* ----------------------------------------------- *\
                    REQUIRED FILES
\* ----------------------------------------------- */
require( dirname( __FILE__ ) .'/process/set-up.php' );
require( dirname( __FILE__ ) .'/classes/petFinder.php' );
require( dirname( __FILE__ ) .'/process/ajax-endpoints/import-cats.php' );






/* ----------------------------------------------- *\
        SETTING UP ADMIN PAGE TO IMPORT CATS
\* ----------------------------------------------- */
// function trc_set_up_import_page(){
//     add_options_page( 'Import Pet Finder Cats', 'Import Pet Finder Cats', 'manage_options', 'import-pet-finder.php', 'management_page_view');
// }
// function management_page_view(){
//     include ("views/importer-page.php");
// }

// add_action('admin_menu', 'trc_set_up_import_page');


/* ----------------------------------------------- *\
                    LOADING ASSETS
\* ----------------------------------------------- */

function trc_load_admin_resources(){
    wp_enqueue_style('trc-admin-styles', plugins_url('/assets/styles/backend.css', __FILE__ ));
    wp_enqueue_script('trc-admin-script', plugins_url('/assets/js/sync-cat-data.js', __FILE__), array('jquery'));
    wp_localize_script('trc-admin-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php'), 'trc_nonce' => wp_create_nonce('trc_nonce')));
}
add_action( 'admin_enqueue_scripts', 'trc_load_admin_resources');

function tcr_load_front_end_resources(){
    wp_enqueue_style('trc-front-end-style', plugins_url('/assets/styles/frontend.css', __FILE__));
    wp_enqueue_script('trc-front-end-js', plugins_url('/assets/js/front-end.js', __FILE__));

}
add_action('wp_enqueue_scripts', 'tcr_load_front_end_resources');
/* ----------------------------------------------- *\
                    EPOSE SHORTCODE
\* ----------------------------------------------- */


add_shortcode( 'pet_feed', 'trc_show_cat_feed' );

function trc_show_cat_feed(){
    ob_start();
        // GRAB DIFFERENT CAT BREEDS
        $cat_breed_object = petFinder::getAllCatBreeds();
        $breeds = $cat_breed_object->petfinder->breeds->breed;
        // GRAB PET DATA FROM TORONTO CAT RESCUE 
        $pet_object = petFinder::getAllPets();
        $pets = $pet_object->petfinder->pets->pet;
        require_once(__DIR__."/views/pet-archive.php");
    return ob_get_clean();
}