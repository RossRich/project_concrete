jQuery(function($) {

    // index
    $('.dev-order-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');

        var name = $(this).attr("name");
        if (name == "name") {
            $(this).parent().siblings(".uk-icon-user").addClass("des-ico-active-order");
        }
        if (name == "tel") {
            $(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active-order");
            $(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active-order");
        }

    });

    $('.dev-order-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
            $parent.siblings(".uk-icon-user").removeClass("des-ico-active-order");
            $parent.siblings(".uk-icon-envelope").removeClass("des-ico-active-order");
            $parent.siblings(".uk-icon-phone").removeClass("des-ico-active-order");
        }
        $parent.removeClass('is-focused');
    });


    // foote
    $('.dev-footer-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');
        var name = $(this).attr("name");
        if (name == "name") {
            $(this).parent().siblings(".uk-icon-user").addClass("des-ico-active-footer");
        }
        if (name == "tel" || name == "adr") {
            $(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active-footer");
            $(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active-footer");
        }
    });

    $('.dev-footer-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
            $parent.siblings(".uk-icon-user").removeClass("des-ico-active-footer");
            $parent.siblings(".uk-icon-envelope").removeClass("des-ico-active-footer");
            $parent.siblings(".uk-icon-phone").removeClass("des-ico-active-footer");
        }
        $parent.removeClass('is-focused');
    });


    // textarea_script
    $('.dev-footer-textarea').focus(function() {
        $(this).parent().siblings(".uk-icon-pencil").addClass("des-ico-active-footer");
        $(this).siblings(".dev-footer-label-correct").addClass("des-ico-active-footer");
        $(this).addClass("des-textarea-active-footer");

    });

    $('.dev-footer-textarea').blur(function() {
        if ($(this).val() == "") {
            $(this).parent().siblings(".uk-icon-pencil").removeClass("des-ico-active-footer");
            $(this).siblings(".dev-footer-label-correct").removeClass("des-ico-active-footer");
            $(this).removeClass("des-textarea-active-footer");
        }
    });


    // modal.dialog
    $('.dev-get-manager-input').focus(function() {
        $(this).parent().addClass('is-focused has-label');
        var name = $(this).attr("name");
        if (name == "name") {
            $(this).parent().siblings(".uk-icon-user").addClass("des-ico-active-footer");
        }
        if (name == "tel" || name == "adr") {
            $(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active-footer");
            $(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active-footer");
        }
    });

    $('.dev-get-manager-input').blur(function() {
        $parent = $(this).parent();
        if ($(this).val() == "") {
            $parent.removeClass('is-focused has-label');
            $parent.siblings(".uk-icon-user").removeClass("des-ico-active-footer");
            $parent.siblings(".uk-icon-envelope").removeClass("des-ico-active-footer");
            $parent.siblings(".uk-icon-phone").removeClass("des-ico-active-footer");
        }
        $parent.removeClass('is-focused');
    });

});
