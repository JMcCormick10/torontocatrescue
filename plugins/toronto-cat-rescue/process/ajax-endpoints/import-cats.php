<?php

add_action('wp_ajax_trc_import_cats', 'trc_import_cats');

function trc_import_cats(){

    
    $pet_object = petFinder::getAllPets();
    $pets = $pet_object->petfinder->pets->pet;
    


    foreach ($pets as $pet){
        $cat_id;
        if (trc_does_cat_already_exist($pet['id'])){
            //get the existing cat post id
            $cat_id;
        }
        else{
            //insert the cat post
            trc_insert_cat_post();
            $cat_id;
        }

        //insert/overwrite cat post meta
        trc_insert_cat_post_meta($cat_id);

        /*
            META VALUES TO STORE
            options as serialized array
            status
            age
            size
            media photos
            id 
            breeds
            name
            sex
            description
            mix
        */
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