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
        if (name == "form[name]") {
            $(this).parent().siblings(".uk-icon-user").addClass("des-ico-active");
        } else if (name == "form[contact]") {
            $(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active");
            $(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active");
        } else if (name == "form[capacity]") {
            $(this).parent().siblings(".uk-icon-shopping-bag").addClass("des-ico-active");
             console.log("test");
        } else if (name == "form[brand]") {
            $(this).parent().siblings(".uk-icon-tags").addClass("des-ico-active");
        } else if (name == "form[position]") {
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

    // сброс формы

    $('#checkout_form').on('reset', function(e) {
        var element = $('.input-item-consumer-order-panel-input').parent();
        element.removeClass('has-label');
        element.siblings(".uk-icon-user").removeClass("des-ico-active");
        element.siblings(".uk-icon-envelope").removeClass("des-ico-active");
        element.siblings(".uk-icon-phone").removeClass("des-ico-active");
        element.siblings(".uk-icon-tags").removeClass("des-ico-active");
        element.siblings(".uk-icon-shopping-bag").removeClass("des-ico-active");
        element.siblings(".uk-icon-map-marker").removeClass("des-ico-active");
        
        // call modal window after reset form
        var modal = UIkit.modal("#des-id-modal-apply",{center:true});
        if (modal.isActive()) {
            modal.hide();
        } else {
            modal.show();
        }
    });
});
