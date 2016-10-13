<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Контакты";
$page_suffix = " | КраснодарСтройСервис";


//var_dump($home_dir);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? include($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <div class="wrapper">
        <? require($home_dir."/includes/header.php"); ?>
        <div class="contacts_full">
            <div class="uk-container2 uk-container-center contacts">
                <h3 class="uk-text-center">Контакты</h3>
                <div class="uk-panel uk-panel-box con_panel">
                    <ul class="uk-grid uk-grid-collapse uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2">
                        <li>
                            <div class="con_text">
                                <h5>Главный офис</h5>
                                <p>
                                   <img src="images/ic_con1.png" alt="">
                                   35000, г. Краснодар, ул. Московская 91/2
                                </p>
                                <p>
                                  <img src="images/ic_con2.png" alt="">
                                   8 (918) 44-99-703 - Отдел продаж
                                </p>
                                <p>
                                   <img src="images/ic_con2.png" alt="">
                                   8 (989) 265-65-90 - Бухгалтерия
                                </p>
                                <p>
                                   <img src="images/ic_con3.png" alt="">
                                   info@kss-beton.ru
                                </p>
                                <h5 class="h5_2">Производство</h5>
                                <p>
                                   <img src="images/ic_con1.png" alt="">
                                   35000, г. Краснодар, ул. Калинина 1
                                </p>
                             </div>
                         </li>
                        <li>
                            <iframe src="https://www.google.com/maps/d/embed?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" width="100%" height="100%"></iframe>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <? include($home_dir."/includes/footer.php"); ?>
    </div>
    <? include($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
