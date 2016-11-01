<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir . "/admin/bootstrap.php");
require_once($home_dir . "/includes/regions.php");
$page_title = "Отзывы";
$page_suffix = " | КраснодарСтройСервис";

$reviews = collection("Отзывы")->find(["active"=>true])->toArray();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir . "/includes/top-scripts.php"); ?>
</head>

<body>
<div class="wrapper">
    <? require($home_dir . "/includes/header.php"); ?>
    <div class="contacts_full">
        <div class="uk-container2 uk-container-center comments">
            <h3 class="uk-text-center ps_h3">Отзывы клиентов</h3>
            <div class="uk-panel uk-panel-box">
                <? foreach($reviews as $review){ ?>
                    <div class="uk-panel uk-panel-box dev-panel-correct dev-consumer-about-us-panel-correct">
                            <div class="uk-clearfix comment_head ">
                                <h3 class="dev-material-panel-head-correct dev-consumer-about-us-panel-head-correct"><?=$review["title"]?></h3>
                                <p class="comment_date">
                                    <?=$review["date"]?>
                                </p>
                            </div>
                            <p class="dev-consumer-about-us-panel-description-correct ">
                                <?=$review["text"]?>
                            </p>

                            <p class="dev-consumer-about-us-panel-authot">
                                <?=$review["name"]?>
                                <br>
                                <span><?=$review["job"]?></span>
                            </p>
                            <div class="dev-consumer-about-us-panel-img-correct">
                                <? if(isset($review["photo"]) && !empty($review["photo"])){ ?>
                                    <img src="/<?=substr($review["photo"][0]["path"], 5)?>" class="dev-material-panel-img-correct" alt="<?=$review["name"]?>">
                                <? } else {?>
                                    <i class="uk-icon-user-secret uk-icon-large"></i>
                                <? } ?>
                            </div>
                    </div>
                 <? } ?>
            </div>
        </div>
    </div>
    <? require($home_dir . "/includes/footer.php"); ?>
</div>
<? require($home_dir . "/includes/pop-up.php"); ?>
</body>

</html>
