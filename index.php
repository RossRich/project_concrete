<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Главная";
$page_suffix = " | КраснодарСтройСервис";
$page_id = "index";

$reviews = collection("Отзывы")->find(["active"=>true])->toArray();
$index_page_category = collection("Категории")->findOne(["items_index_page"=>true]);

//var_dump($reviews);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <div class="wrapper uk-g">
        <? require($home_dir."/includes/header.php"); ?>
        <div class="advantages_full">
            <div class="uk-container2 uk-container-center advantages">
                <h3 class="uk-text-center">Доверие, заслуженное качеством и технологиями</h3>
                <ul class="uk-grid uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2" data-uk-grid-margin="{cls:'mt35'}">
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="images/ad1.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>СОВРЕМЕННОЕ ОБОРУДОВАНИЕ</h4>
                                <p>Глубокий цикл отчистки компонентов бетона</p>
                                <p>Точная система весового контроля загрузки миксеров</p>
                                <p>Полное соответствие производства продукта по ГОСТу</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="images/ad2.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>СОБСТВЕННЫЙ ПАРК СПЕЦТЕХНИКИ</h4>
                                <p>GPS контроль доставки в каждой машине</p>
                                <p>Квалифицированные водители с допусками</p>
                                <p>Собственный парк спецтехники: более 15 единиц</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="images/ad3.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>СОБСТВЕННАЯ ЛАБОРАТОРИЯ ЗАВОДА</h4>
                                <p>Предоставление полной технической документации</p>
                                <p>Проверка лабораторного образца на прочность</p>
                                <p>100% юридическая ответственность за продукт</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="images/ad4.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>ГАРАНТИЯ НИЗКОЙ ЦЕНЫ</h4>
                                <p>У нас всегда дешевле на 10%</p>
                                <p>Быстрая доставка без простоя на объекте</p>
                                <p>Гарантированное качество, за которое мы отвечаем</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <? 
        if(isset($index_page_category) && !empty($index_page_category)){ 
            $index_page_products = collection("Продукция")->find(["category" => $index_page_category["_id"]])->toArray();
        ?>
        <div class="dev-container-concreate">
            <div class="uk-container2 uk-container-center dev-container-correct">
                <h3 class="uk-text-center dev-h3-correct"><?=$index_page_category["name_index_page"]?></h3>
                <ul class="uk-grid uk-container-center uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4">
                    <? foreach($index_page_products as $index_page_product){ ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct">
                            <div class="dev-img-correct">
                                <? if(isset($index_page_product["photo"]) && !empty($index_page_product["photo"])){ ?>
                                <a href="/product.php?id=<?=$index_page_product["_id"]?>"><img src="<?=thumbnail_url($index_page_product["photo"][0]["path"], 200, 200, ["mode" => "best_fit"])?>" alt="<?=$index_page_product["name"]?>"></a>
                                <? } else { ?>
                                <a href="/product.php?id=<?=$index_page_product["_id"]?>"><img src="/images/block.png" alt="Block"></a>
                                <? } ?>
                            </div>
                            <h3><?=$index_page_product["name"]?><br><?=$index_page_product["price"]?> руб. - <?=$index_page_product["count"]?></h3>
                            <hr class="dev-line-correct">
                            <a href="/product.php?id=<?=$index_page_product["_id"]?>&order" class="dev-but-order-correct">Заказать</a>
                            <a href="/product.php?id=<?=$index_page_product["_id"]?>" class="dev-but-about-correct">Подробнее</a>
                        </div>
                    </li>
                    <? } ?>
                </ul>
            </div>
        </div>
        <? } ?>
        <div class="dev-container-order">
            <? require($home_dir."/includes/discount-form.php"); ?>
        </div>
        <div class="dev-container-material">
            <div class="uk-container2 uk-container-center dev-container-correct mat">
                <h3 class="uk-text-center dev-h3-correct">СТРОИТЕЛЬНЫЕ МАТЕРИАЛЫ И УСЛУГИ ТЕХНИКИ</h3>
                <ul class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4" data-uk-grid-match="target:'.dev-material-panel-head-correct'">
                    <? 
                    foreach($main_categorys as $main_category){ 
                        if($main_category["items_index_page"]) continue;
                    ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct dev-material-panel-correct">
                            <h3 class="dev-material-panel-head-correct"><?=$main_category["name"]?></h3>
                            <div class="dev-material-panel-img-correct">
                                <img src="/<?=substr($main_category["photo"][0]["path"], 5)?>" class="dev-material-panel-img-correct" alt="ИНЕРТНЫЕ МАТЕРИАЛЫ">
                            </div>
                            <p class="dev-material-panel-description"><?=$main_category["description"]?></p>
                            <hr class="dev-line-correct">
                            <a href="/product.php?id=<?=$main_category["_id"]?>" class="dev-material-panel-but-correct dev-but-order-correct">Подробнее</a>
                        </div>
                    </li>
                    <? } ?>
                </ul>
            </div>
        </div>
        <div class="dev-consumer-about-us" data-uk-parallax="{bgp: '100'}">
            <div class="uk-container2 uk-container-center dev-container-correct">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct">КЛИЕНТЫ О НАС</h3>
                <div class="uk-slidenav-position slider_consumer" data-uk-slider="center:true">
                    <div class="dev-consumer-slader-navigation uk-clearfix">
                        <img class="dev-consumer-icon " src="images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                        <img class="dev-consumer-icon" src="images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                    </div>
                    <div class="uk-slider-container dev-consumer-about-us-slider-correct">
                        <ul class="uk-slider uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">
                            <? foreach($reviews as $review){ ?>
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct dev-material-panel-correct dev-consumer-about-us-panel-correct">
                                    <h3 class="dev-material-panel-head-correct dev-consumer-about-us-panel-head-correct"><?=$review["title"]?></h3>
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
                                        <img src="/<?=substr($review["photo"][0]["path"], 5)?>" class="dev-material-panel-img-correct" alt="потребитель">
                                        <? } ?>
                                    </div>
                                </div>
                            </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="dev-contauner-our-partner dev-container-material uk-container-center">
            <div class="uk-container uk-container-center dev-contauner-our-partner-correct dev-container-correct">
                <h3 class="dev-h3-correct">НАШИ ПАРТНЕРЫ</h3>
                <div class="uk-slidenav-position" data-uk-slider="center:true">
                    <div class="uk-slider-container dev-our-partner-correct">
                        <ul class="uk-slider uk-grid-width-large-1-5 uk-grid-width-medium-1-3 uk-grid-width-small-1-2">
                            <li class="uk-active">
                                <div class="dev-our-partner-panel-img-correct img_neom">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgASC">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgISM">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgFAMILY">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgCM">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <img class="uk-slidenav uk-slidenav-contrast uk-slidenav-next dev-partner-slider-index-right-correct dev-partner-slider-index-height-correct dev-partner-ico-img-correct" data-uk-slider-item="next" src="images/for_slider_nav_right.png">
                    <img class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous dev-partner-slider-index-height-correct dev-partner-ico-img-correct" data-uk-slider-item="previous" src="images/for_slider_nav_left.png">
                </div>
            </div>
        </div>
        <? include($home_dir."/includes/docs.php"); ?>
        <div class="prefooter"></div>
        <? include($home_dir."/includes/footer.php"); ?>
    </div>
    <? include($home_dir."/includes/pop-up.php"); ?>
</body>

</html>