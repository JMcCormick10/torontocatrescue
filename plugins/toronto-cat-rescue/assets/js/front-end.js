jQuery(document).ready(function($) {
	function modal_close() {
    	$('body').removeClass('no-overflow');
        $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        $('.tcr-cat-modal .carousel').slick('unslick');
        $('.tcr-cat-id').val('');
    	$('.tcr-cat-name').val('');
    }

    function concatValues(obj) {
        var value = '';
        for (var prop in obj) {
            value += '.' + obj[prop];
        }
        return value;
    }

    $('.tcr-apply-to-adopt').click(function() {
    	$('.tcr-cat-id').val($(this).data('cat-id'));
    	$('.tcr-cat-name').val($(this).data('cat-name'));
        $('.tcr-cat-modal').addClass('tcr-cat-modal-show');
        $('body').addClass('no-overflow');
        var cat_data = $(this).siblings('.tcr-cat-data');
        populateModalData($(this).data('cat'));
        $('.tcr-cat-modal .carousel').slick({
            variableWidth: true,
            centerMode: true
        });
        $('.tcr-cat-modal .carousel .slick-prev').html('<span class="fa fa-angle-left"></span>');
        $('.tcr-cat-modal .carousel .slick-next').html('<span class="fa fa-angle-right"></span>');
        $('.tcr-cat-modal .carousel').on('breakpoint', function(event, slick, currentSlide, nextSlide) {
            $('.tcr-cat-modal .carousel .slick-prev').html('<span class="fa fa-angle-left"></span>');
            $('.tcr-cat-modal .carousel .slick-next').html('<span class="fa fa-angle-right"></span>');
        });
    });
    $('.tcr-exit-modal').click(function() {
    	modal_close();
    });

    $(window).click(function(event) {
        if ($(event.target).hasClass('tcr-cat-modal')) {
    		modal_close();
        }
    })

    $('.tcr-view-info').click(function() {
    	$('.tcr-apply-button').removeClass('active');
    	$(this).addClass('active');
        $('.tcr-cat-info').show();
        $('.tcr-form-container').hide();
    });

    $('.tcr-apply-button').click(function() {
    	$('.tcr-view-info').removeClass('active');
    	$(this).addClass('active');
        $('.tcr-form-container').show();
        $('.tcr-cat-info').hide();
    });

    function populateModalData(data) {
        $('.tcr-cat-info').html($('#' + data).html());
    }

    $(window).click(function(event) {
        if ($(event.target).hasClass('tcr-cat-modal')) {
            $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        }
    })

    $('.tcr-select-option').each(function() {
        $(this).select2({
            placeholder: 'Select ' + $(this).prev().text(),
            width: 'resolve'
        });
    })

    // init Isotope
    var $container = $('.tcr-archive-list').isotope({
        itemSelector: '.tcr-item',
    });

    // store filter for each group
    var filters = {};
    $('.tcr-select-option').change(function(event) {
        var select = $(event.currentTarget);
        // get group key
        var filterGroup = select.attr('data-filter-group');
        if (select.val() != null) {
        	// set filter for group
	        filters[filterGroup] = select.val();
	        // combine filters
	        var filterValue = concatValues(filters);
	        // set filter for Isotope
	        $container.isotope({ filter: filterValue });
	        console.log($container.data('isotope').filteredItems.length);
	        console.log(filterValue);
	        if ($container.data('isotope').filteredItems.length <= 0) {
	        	console.log('fadein');
	            $('#tcr-no-cats').fadeIn();
	        } else {
	        	console.log('fadeout');
	            $('#tcr-no-cats').fadeOut();
	        }
        }
    });

    $('.tcr-clear-filter').click(function(){
    	$('.tcr-select-option').each(function() {
	        $(this).val([]).trigger('change');
	    })
	    $container.isotope({
	        filter: '*'
	    });
    	filters = {};
    	$('#tcr-no-cats').fadeOut();
    })
});