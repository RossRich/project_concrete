<?php

// API

$app->bind("/api/forms/submit/:form", function($params) use($app) {

    $form = $params["form"];

    // Security check

    if ($formhash = $this->param("__csrf", false)) {

        if ($formhash != $this->hash($form)) {
            return false;
        }

    } else {
        return false;
    }

      //-------------- reCAPTCHA ---------------------
    /*
    if(isset($_POST['g-recaptcha-response'])){
        $captcha=$_POST['g-recaptcha-response'];
        if(!$captcha){
             return false;
        }
      	$secretKey = "6LeRyBkTAAAAAI40m9Qa_KAQJSQX1JoEd31Ewo3J";
      	$ip = $_SERVER['REMOTE_ADDR'];
      	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
      	$responseKeys = json_decode($response,true);
      	if(intval($responseKeys["success"]) !== 1) {
            return false;
        }
    }
    */
  //------------------------------------------------
    
    $frm = $this->db->findOne("common/forms", ["name"=>$form]);

    if (!$frm) {
        return false;
    }

    if ($formdata = $this->param("form", false)) {

        // custom form validation
        if ($this->path("custom:forms/{$form}.php") && false===include($this->path("custom:forms/{$form}.php"))) {
            return false;
        }

        if (isset($frm["email"])) {

            $emails          = array_map('trim', explode(',', $frm['email']));
            $filtered_emails = [];
            
            if (isset($formdata["agent_email"])) $emails[] = $formdata["agent_email"];

            foreach($emails as $to){

                // Validate each email address individually, push if valid
                if (filter_var($to, FILTER_VALIDATE_EMAIL)){
                    $filtered_emails[] = $to;
                }
            }
            
            if (isset($frm["subject"])) $subject = $frm["subject"];
            else $subject = "Получено сообщение с сайта";

            if (count($filtered_emails)) {

                $frm['email'] = implode(',', $filtered_emails);

                // There is an email template available
                if ($template = $this->path("custom:forms/emails/{$form}.php")) {
                    $body = $this->renderer->file($template, $formdata, false);
                // Prepare template manually
                } else {
                    $body = [];

                    foreach ($formdata as $key => $value) {
                        $body[] = "<b>{$key}:</b>\n<br>";
                        $body[] = (is_string($value) ? $value:json_encode($value))."\n<br>";
                    }

                    $body = implode("\n<br>", $body);
                }

                $options = $this->param("form_options", []);
                
                if (isset($formdata["email"])) $options["from"] = $formdata["email"];

                $this->mailer->mail($frm["email"], $this->param("__mailsubject", $subject), $body, $options);
            }
        }

        if (isset($frm["entry"]) && $frm["entry"]) {

            $collection = "form".$frm["_id"];
            $entry      = ["data" => $formdata, "created"=>time()];
            $this->db->insert("forms/{$collection}", $entry);
        }

        return json_encode($formdata);

    } else {
        return "false";
    }

});


$this->module("forms")->extend([

    "get_form" => function($name) use($app) {

        static $forms;

        if (null === $forms) {
            $forms = [];
        }

        if (!isset($forms[$name])) {
            $forms[$name] = $app->db->findOne("common/forms", ["name"=>$name]);
        }

        return $forms[$name];
    },

    "form" => function($name, $options = []) use($app) {

        $options = array_merge(array(
            "id"    => uniqid("form"),
            "class" => "",
            "csrf"  => $app->hash($name)
        ), $options);

        $app->renderView("forms:views/api/form.php", compact('name', 'options'));
    },

    "collectionById" => function($formId) use($app) {

        $entrydb = "form{$formId}";

        return $app->db->getCollection("forms/{$entrydb}");
    },

    "entries" => function($name) use($app) {

        $form = $this->get_form($name);

        if (!$form) {
            return false;
        }

        $entrydb = "form".$form["_id"];

        return $app->db->getCollection("forms/{$entrydb}");
    }
]);


if (!function_exists('form')) {

    function form($name, $options = []) {
        cockpit("forms")->form($name, $options);
    }
}

// ADMIN
if (COCKPIT_ADMIN && !COCKPIT_REST) include_once(__DIR__.'/admin.php');
