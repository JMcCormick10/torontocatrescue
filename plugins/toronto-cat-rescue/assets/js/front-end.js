jQuery(document).ready(function($){
    $('.tcr-apply-to-adopt').click(function(){
        $('.tcr-cat-modal').addClass('tcr-cat-modal-show');

        var cat_data = $(this).siblings('.tcr-cat-data');
        populateModalData(cat_data);
    });
    $('.tcr-exit-modal').click(function(){
        $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');

    });

    function populateModalData(cat_data){
        
        $('.tcr-cat-info').html(cat_data.html());
       
    }
}); 