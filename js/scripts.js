jQuery(function($) {
    $('.dev-order-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');
    })

    $('.dev-order-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
        }
        $parent.removeClass('is-focused');
    })
})