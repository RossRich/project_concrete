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


    $('.input-item-consumer-order-panel-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');

        var name = $(this).attr("name");
        if (name == "name") {
            $(this).parent().siblings(".uk-icon-user").addClass("des-ico-active");
        } else if (name == "tel") {
            $(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active");
        } else if (name=="capacity"){
            // console.log(name);
            $(this).parent().siblings(".uk-icon-tags").addClass("des-ico-active");
        }else if (name=="brand"){
            // console.log(name);
            $(this).parent().siblings(".uk-icon-shopping-bag").addClass("des-ico-active");
        }else if (name=="position"){
            $(this).parent().siblings(".uk-icon-map-marker").addClass("des-ico-active");
        }
    });

    $('.input-item-consumer-order-panel-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
            $(this).parent().siblings(".uk-icon-user").removeClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-envelope").removeClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-phone").removeClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-tags").removeClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-shopping-bag").removeClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-map-marker").removeClass("des-ico-active");
        }
        $parent.removeClass('is-focused');
    });

});
