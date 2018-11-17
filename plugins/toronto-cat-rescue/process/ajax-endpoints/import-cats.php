<?php

add_action('wp_ajax_trc_import_cats', 'trc_import_cats');
function trc_import_cats(){
    if (!check_ajax_referer('trc_nonce', 'nonce')){
        echo 'Stop trying to hack';
        exit();
    }


}