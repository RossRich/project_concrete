// form_validation_heared
$(function() {
    $("#form_header_send_manager").validate({
        rules: {
            "form[name]": {
                required: true,
                minlength: 2
            },
            "form[tel]": {
                required: true,
                digits: true,
                minlength: 10
            }
        },
        messages: {
            "form[name]": {
                required: "Поле обязательное для заполнения",
                minlength: "Минимальный размер 2 символа"
            },
            "form[tel]": {
                required: "Поле обязательное для заполнения",
                digits: "Введите корректный номер телефона без '+7'"
            }
        },
        focusCleanup: true,
        focusInvalid: false,
        // invalidHandler: function(event, validator) {

        //         console.log("ale");

        // }
        onkeyup: function(element) {
            $(".js-form-message").text("");
            if(validator.numberOfInvalids()>1){
                alert(1);
            }
        },
        success: "valid",
        submitHandler: function() {
        },
        // highlight: function(element, errorClass) {
        //     $(element).fadeOut(function() {
        //         $(element).fadeIn();
        //     });
        // }
    });

});
