jQuery(function($) {
    $(function() {
        $('.chart').easyPieChart({
            barColor: '#757575',
            trackColor: '#bdbdbd',
            scaleColor: '#FFF',
            scaleLength: 0,
            lineCap: 'round',
            lineWidth: 12,
            trackWidth: undefined,
            size: 110,
            rotate: 0,
            easing: 'easeOutBounce',
            animate: {
                duration: 1000,
                enabled: true
            },
        });

    });
    
    
    $('.input-item-consumer-order-panel').focus(function() {
        $(this).parent().addClass('is-focused has-label');
    })

    $('.input-item-consumer-order-panel').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
        }
        $parent.removeClass('is-focused');
    })

});
