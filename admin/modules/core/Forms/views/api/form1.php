<script>

    setTimeout(function(){

        if (!window.FormData) return;

        var form        = document.getElementById("{{ $options['id'] }}"),
            msgsuccess  = form.getElementsByClassName("form-message-success").item(0),
            msgfail     = form.getElementsByClassName("form-message-fail").item(0),
            phone_fail  = form.getElementsByClassName("form-phone-fail").item(0),
            email_fail  = form.getElementsByClassName("form-email-fail").item(0),
            disableForm = function(status) {
                for(var i=0, max=form.elements.length;i<max;i++) form.elements[i].disabled = status;
            },
            success     = function(){
                if (msgsuccess) {
                    UIkit.notify($(msgsuccess).text(), {status:'success'});
                } else {
                    alert("@lang('Form submission was successfull.')");
                }
              
              	@if(isset($options["callback"]))
                  {{ $options["callback"] }}
                @endif
              
                disableForm(false);
            },
            fail        = function(){
                if (msgfail) {
                    UIkit.notify($(msgfail).text(), {status:'danger'});
                } else {
                    alert("@lang('Form submission failed.')");
                }
                disableForm(false);
            };

        if (msgsuccess) msgsuccess.style.display = "none";
        if (msgfail)    msgfail.style.display = "none";

        form.addEventListener("submit", function(e) {       
          
            e.preventDefault();
          
			
            var check = true;	
            $(this).find("[required1]").each(function(i, e) {
              if ($(e).val() == "") {
                check = false;
                $(e).addClass("empty");
              };
            });
            if (!check) {
              UIkit.notify($(msgfail).text(), {status:'danger'});
              return false;
            };
            if($(this).find(".phone_us").length){
                $phone_val = $(this).find(".phone_us").val();
                if ($phone_val.indexOf("_") != -1 || ($(this).find(".phone_us").val().length != 17 && $(this).find(".phone_us").val().length != 0)) {
                    UIkit.notify($(phone_fail).text(), {status:'danger'});
                    return false;
                };
            };
            
            if (msgsuccess) msgsuccess.style.display = "none";
            if (msgfail)    msgfail.style.display = "none";

            var xhr = new XMLHttpRequest(), data = new FormData(form);

            xhr.onload = function(){

                if (this.status == 200 && this.responseText!='false') {
<?php if (isset($options["success"])) : ?>
                    if (<?php echo $options["success"]; ?>) form.reset();
                    disableForm(false);
<?php else : ?>
                    //success();
                    //form.reset();
<?php endif; ?>                    
                } else {
<?php if (isset($options["fail"])) : ?>
                    <?php echo $options["fail"]; ?>;
                    disableForm(false);
<?php else : ?>
                    fail();
<?php endif; ?>
                }
            };

            disableForm(true);

            xhr.open('POST', "@route('/api/forms/submit/'.$name)", true);
            xhr.send(data);

        }, false);

    }, 100);

</script>

<form id="{{ $options["id"] }}" name="{{ $name }}" class="{{ $options["class"] }}" action="@route('/api/forms/submit/'.$name)" method="post" onsubmit="return false;">
<input type="hidden" name="__csrf" value="{{ $options["csrf"] }}">
@if(isset($options["mailsubject"])):
<input type="hidden" name="__mailsubject" value="{{ $options["mailsubject"] }}">
@endif