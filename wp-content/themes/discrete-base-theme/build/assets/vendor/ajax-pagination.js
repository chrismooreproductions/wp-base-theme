(function($) {

    $(document).on( 'click', '.nav-menu a', function( event ) {
		event.preventDefault();
        // page = find_page_number( $(this).clone() );
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: ({
                action: 'ajax_pagination'
            }),
            dataType: "json",
            contentType: "application/json",
            success: function( result ) {
                alert( result );
            },
            error: function ( result ) {
                alert( JSON.stringify({result}) );
            }
    	});
	})
}) ( jQuery );
