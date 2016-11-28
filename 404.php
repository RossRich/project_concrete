<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "404";
$page_suffix = " | КРАСНОДАРСТРОЙСЕРВИС";

//$partnership = collection("Сотрудничество")->find()->toArray();

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
<div class="wrapper">
    <? require($home_dir."/includes/header.php"); ?>
    <div class="contacts_full">
        <div class="uk-container2 uk-container-center contacts not_found">
            <h3 class="uk-text-center ps_h3">Страница не найдена</h3>
            <div class="uk-panel uk-panel-box con_panel agree_text">
                <img src="/images/404.png" alt="">
                <div class="nf_text">
                    <p>
                        Извините, к сожалению такой страницы не существует. 
                    </p>
                    <p>
                        Вероятно она была удалена, либо ее здесь никогда не было. 
                    </p>
                    <p>
                        Можно пропробовать найти информацию на <a href="/index.php">главной странице</a>  
                    </p>
                </div>
            </div>
         </div>
    </div>
    <? require($home_dir."/includes/footer.php"); ?>
</div>
<? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
