jQuery(document).ready(function($){
   $('#trc-import-pet-finder-cats').click(function(){
    var data = {
        
        nonce: 'trc_nonce',
        action: 'trc_import_cats'
    }
    $.post(ajax_object.ajax_url, data, function(response){
        console.log(response);
   });

   function displayError(){

   }

   function displaySuccess(){

   }

   });

});