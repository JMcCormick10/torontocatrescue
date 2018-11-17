<?php

add_action('wp_ajax_trc_import_cats', 'trc_import_cats');
function trc_import_cats(){


    //the curl request
    /*LOOP THROUGH EACH CAT
        -CHECK CAT ID DOESN'T ALREADY EXIST
    */
    if (trc_does_cat_already_exist()){
        exit();
    }
        
    /*--INSERT CAT AS POST

        --INSERT NEEDED CAT META DATA

        -RETURN RESPONSE
    */
    
    echo 'success'; 
    exit();

    function trc_does_cat_already_exist($pet_finder_id){

        $args = array(
            'post_type' => 'cat',
            'meta_query' => array(
                array(
                    'key'   => 'pet_finder_id',
                    'value' => $pet_finder_id 
                  ),
            ),   
        );

        $query = new WP_Query($args);
        return $query->have_posts();
    }

    function trc_insert_cat_post(){

    }

    function trc_insert_cat_post_meta(){

    }
}