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

});
