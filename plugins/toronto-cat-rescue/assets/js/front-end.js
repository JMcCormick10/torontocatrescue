jQuery(document).ready(function($){
    $('.tcr-apply-to-adopt').click(function(){
        $('.tcr-cat-modal').addClass('tcr-cat-modal-show');
        $('body').addClass('no-overflow');
        var cat_data = $(this).siblings('.tcr-cat-data');
        populateModalData(cat_data);
    });
    $('.tcr-exit-modal').click(function(){
        $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        $('body').removeClass('no-overflow');

    });

    $('.tcr-view-info').click(function(){
        $('.tcr-cat-info').show();
        $('.tcr-form-container').hide();
    });
    $('.tcr-apply-button').click(function(){
        $('.tcr-form-container').show();
        $('.tcr-cat-info').hide();
    }); 


    $(window).click(function(event){
    	console.log($(event.target));
    	console.log($('.tcr-cat-modal'));
    	if ($(event.target).hasClass('tcr-cat-modal')) {
    		$('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
    	}
    });

    function populateModalData(cat_data){
        
        $('.tcr-cat-info').html(cat_data.html());
       
    }

}); 
   
    
