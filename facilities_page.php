<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Наши объекты";
$page_suffix = " | КраснодарСтройСервис";

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
        <div class="uk-container2 uk-container-center contacts partnership facilities_page">
            <h3 class="uk-text-center ps_h3">Наши объекты</h3>
            <div class="uk-panel uk-panel-box con_panel agree_text">
                <p>
                    Наша компания осуществляла поставки бетона на многие объекты, в основном новостройки Краснодара.
                </p>
                <p>
                    Отгрузка бетона производится не только на объекты инфраструктуры города и объекты гражданского строительства, но и в промышленные зоны.
                </p>
            </div>
            <? require($home_dir."/includes/facilities.php"); ?>
        </div>
    </div>
    <? require($home_dir."/includes/footer.php"); ?>
</div>
<? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
