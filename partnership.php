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
        <div class="uk-container2 uk-container-center contactpartnership">
            <h3 class="uk-text-center ps_h3">Сотрудничество с нашей компанией</h3>
            <div class="uk-panel uk-panel-box con_panel partnership_panel">
                <p>
                Компания  КраснодарСтройСервис - это современный оптовый производитель товарного бетона и раствора в Краснодаре. Для своего бетона мы используем только лучшие материалы, за качеством которых пристально следит наша лаборатория. Наш автопарк состоит из отечественных и зарубежных машин, которые доставят бетон, щебень и песок в любую точку Краснодара. 
                </p> <p>Мы предлагаем к поставке товарный бетон самых востребованных марок в любом объеме по выгодным ценам. Для постоянным покупателей действуют специальные предложения. У нас Вы всегда можете взять в аренду автобетоносмеситель или автобетононасос на любой срок. 
                </p> <p>Мы рады сотрудничеству с оптовыми покупателями и ответственными поставщиками! 
<!--                    --><?//=$partnership["paragraph1"]?>
                </p>
            </div>
        </div>
    </div>
    <? require($home_dir."/includes/footer.php"); ?>
</div>
<? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
