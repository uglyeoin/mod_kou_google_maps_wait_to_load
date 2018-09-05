jQuery(function($) {
    // replace click with mouseenter if you want to activate the map on mouse hover
    // warning - mobile devices don't have a cursor so they can't trigger "hover"
    $('#mod_google_maps_wait_to_load_container a').on('click', function(e) {
        e.preventDefault();
        map = $(this).parent();

        iframe_src = map.data('iframe-src');
        iframe_width = map.data('iframe-width');
        iframe_height = map.data('iframe-height');

        map.html('<iframe src="' + iframe_src + '" width="' + iframe_width + '" height="' + iframe_height + '" allowfullscreen></iframe>');

        return false;
    });
});
