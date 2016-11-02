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
                    Мы работаем с такими застройщиками как:
                </p>
                <p>
                    ООО "Капитал Инвест Групп" "ооо"Капитал-Строй" "ООО МТУ "ЮКС" ООО "фирма Капитал-Инвест" ООО "Кубань Стройподряд" ООО Регион Строй Проект"ООО НПП"РосНефтеГазИнструмент"ООО "ЮСК" ООО "Донской "ООО "УниверсалПроетСтрой" ООО "Наша Тема" ООО "СтройМеталлИнвест"ООО "МИАЛ-СТРОЙ"ООО "Стройбизнес-Юг"ООО "БгСтройИндустрия"ООО "СТРОЙПОДРЯД-ЮГ"
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
