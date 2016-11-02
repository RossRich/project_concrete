<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Сотрудничество";
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
        <div class="uk-container2 uk-container-center contacts partnership">
            <h3 class="uk-text-center ps_h3">Сотрудничество с нашей компанией</h3>
            <div class="uk-panel uk-panel-box con_panel partnership_panel">
                <ul class="uk-grid uk-grid-collapse uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-2">
                    <li>
                        <div class="agree_text">
                            <p>
                                Компания  КраснодарСтройСервис - это современный оптовый производитель товарного бетона и раствора в Краснодаре. Для своего бетона мы используем только лучшие материалы, за качеством которых пристально следит наша лаборатория. Наш автопарк состоит из отечественных и зарубежных машин, которые доставят бетон, щебень и песок в любую точку Краснодара. 
                            </p>
                            <p>
                                Наши поставщики: ООО "Оникс" ООО "БЕТОНСТРОЙСЕРВИС"ООО "Юг Логистик"ООО "Стройкомплекс"ООО "Строй Лидер"ООО "Химком"ООО "ХИТАЛКОМ"И.П. ООО "СТРОЙПОДРЯД-Юг" ООО "Фирма Автодеталь"
                            </p>
                            <p>
                                Мы предлагаем к поставке товарный бетон самых востребованных марок в любом объеме по выгодным ценам. Для постоянным покупателей действуют специальные предложения. У нас Вы всегда можете взять в аренду автобетоносмеситель или автобетононасос на любой срок. 
                            </p>
                            <p>
                                Мы рады сотрудничеству с крупными и частными застройщиками! Для крупных застройщиков действует гибкая система скидок и индивидуальные предложения. 
                            </p>
                        </div>
                    </li>
                    <li>
                        <div class="agree_logo">
                        </div>
                    </li>
            </div>
        </div>
    </div>
    <? require($home_dir."/includes/footer.php"); ?>
</div>
<? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
