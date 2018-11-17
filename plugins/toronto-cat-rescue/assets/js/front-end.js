jQuery(document).ready(function($){
    $('.tcr-apply-to-adopt').click(function(){
        $('.tcr-cat-modal').addClass('tcr-cat-modal-show');
        $('body').addClass('no-overflow');
    })
    $('.tcr-exit-modal').click(function(){
        $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        $('body').removeClass('no-overflow');
    })
    $(window).click(function(event){
    	console.log($(event.target));
    	console.log($('.tcr-cat-modal'));
    	if ($(event.target).hasClass('tcr-cat-modal')) {
    		$('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
    	}
    })
});