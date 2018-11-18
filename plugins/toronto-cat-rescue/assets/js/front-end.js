jQuery(document).ready(function($) {
    $('.tcr-apply-to-adopt').click(function() {
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

    function populateModalData(cat_data){

        $('.tcr-cat-info').html(cat_data.html());

    }

    $(window).click(function(event) {
        if ($(event.target).hasClass('tcr-cat-modal')) {
            $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        }
    })

    $('.tcr-select-option').each(function(){
    	console.log($(this).prev().text());
    	$(this).select2({
    		placeholder: 'Select '+$(this).prev().text(),
    		width: 'resolve'
    	});
    })

    // flatten object by concatting values
    function concatValues(obj) {
        // console.log(obj);
        var value = '';
        for (var prop in obj) {
            value += '.'+obj[prop];
        }
        return value;
    }

    // init Isotope
    var $container = $('.tcr-archive-list').isotope({
        itemSelector: '.tcr-item'
    });

    // store filter for each group
    var filters = {};
    $('.tcr-select-option').change(function(event) {
        var select = $(event.currentTarget);
        // get group key
        var filterGroup = select.attr('data-filter-group');
        // set filter for group
        filters[filterGroup] = select.val();
        // combine filters
        var filterValue = concatValues(filters);
        // set filter for Isotope
        console.log(filterValue);
        $container.isotope({ filter: filterValue });
    });
});
