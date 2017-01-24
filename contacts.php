<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Контакты";
$page_suffix = " | КРАСНОДАРСТРОЙСЕРВИС";


//var_dump($home_dir);
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
            <div class="uk-container2 uk-container-center contacts">
                <h3 class="uk-text-center">Контакты</h3>
                <div class="uk-panel uk-panel-box con_panel">
                    <ul class="uk-grid uk-grid-collapse uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-2">
                        <li>
                            <div class="con_text">
                                <h5>Главный офис</h5>
                                <p>
                                  <a href="https://www.google.com/maps/d/embed?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" target="_blanck">
                                   <img src="/images/ic_con1.png" alt="">
                                        <?=$address;?>
                                    </a>
                                </p>
                                <p>
                                 <a href="tel:<?=$phone2;?>" type="tel">
                                  <img src="/images/ic_con2.png" alt="">
                                        <?=$phone2;?> - Отдел продаж
                                    </a>
                                </p>
                                <p>
                                 <a href="tel:<?=$phoneMobile;?>" type="tel">
                                  <img src="/images/ic_con2.png" alt="">
                                        <?=$phoneMobile;?> - Отдел продаж
                                    </a>
                                </p>
                                <p>
                                   <a href="tel:<?=$phone3;?>" type="tel"><img src="/images/ic_con2.png" alt="">
                                        <?=$phone3;?> - Бухгалтерия
                                    </a>
                                </p>
                                <p>
                                  <a href="mailto:<?=$email;?>" type="email">
                                   <img src="/images/ic_con3.png" alt="">
                                   <?=$email;?>
                                   </a>
                                </p>
                                <h5 class="h5_2">Производство</h5>
                                <p>
                                  <a href="https://www.google.com/maps/d/embed?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" target="_blanck">
                                   <img src="/images/ic_con1.png" alt="">
                                        <?=$address2;?>
                                    </a>
                                </p>
                             </div>
                         </li>
                        <li>
                            <div class="map_frame">
                                <iframe src="https://www.google.com/maps/d/embed?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" width="100%" height="100%"></iframe>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
