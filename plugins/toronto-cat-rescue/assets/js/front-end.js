jQuery(document).ready(function($) {
    $('.tcr-apply-to-adopt').click(function() {
        $('.tcr-cat-modal').addClass('tcr-cat-modal-show');
        $('body').addClass('no-overflow');
    })
    $('.tcr-exit-modal').click(function() {
        $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        $('body').removeClass('no-overflow');
    })
    $(window).click(function(event) {
        if ($(event.target).hasClass('tcr-cat-modal')) {
            $('.tcr-cat-modal').removeClass('tcr-cat-modal-show');
        }
    })

    $('.tcr-select-option').select2();

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