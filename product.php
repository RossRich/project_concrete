<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_suffix = " | КраснодарСтройСервис";


$id = $_REQUEST["id"];
$product = collection("Продукция")->findOne(["_id"=>$id]);
$category = collection("Категории")->findOne(["_id"=>$product["category"]]);
//print_r($category);
$page_title = $product["name"];
if(!isset($product)){
    header('Location: /');
    die;
}
//var_dump($home_dir);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
    <link rel="stylesheet" href="/css/pie-chart-master.css">
    <link rel="stylesheet" href="/css/simple-ripple-effect.css" />
    <script src="/js/easyPieChart/jquery.plugin.js"></script>
    <script src="/js/easyPieChart/jquery.easing.min.js"></script>
    <script src="/js/easyPieChart/easypiechart.js"></script>
    <script src="/js/easyPieChart/renderer/canvas.js"></script>
    <script src="/js/concrete_product.js"></script>
    <script type="text/javascript" src="/js/simple-ripple-effect.js"></script>
</head>

<body>
    <div class="wrapper">
        <? require($home_dir."/includes/header.php"); ?>
        <div class="des-delivery-concrete">
            <div class="des-container-correct des-contauner-content-delivery">
                <ul class="uk-breadcrumb uk-hidden-small">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog.php?category=<?$category["_id"]?>"><?=$category["name"]?></a></li>
                    <li class="uk-active"><span><?=$product["name"]?></span></li>
                </ul>
                <h3><?=$product["slogan"]?></h3>
                <div class="des-content-panel box-wrapper">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-large-1-2 uk-hidden-small uk-hidden-medium">
                            <? if(isset($product["photo"]) && !empty($product["photo"])){ ?>
                            <div class="des-panel-img">
                              <img src="/<?=substr($product["photo"][0]["path"], 5)?>" alt="">
                            </div>
                            <? } else { ?>
                                <div class="des-panel-img">
                            <img src="/images/no_image_block.png" alt="Block">
                          </div>
                            <? } ?>
                            <h4>пропорции бетона</h4>
                            <div class="des-panel-proportion">
                                <ul class="uk-grid uk-grid-width-1-4 uk-grid-collapse">
                                    <li>
                                        <div class="chart" data-percent="20" data-scale-color="#ffb400">
                                            <span class="percent"><p><span>1</span>
                                            <br>цемент</p>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chart" data-percent="100" data-scale-color="#ffb400">
                                            <span class="percent"><p><span>5</span>
                                            <br>щебень</p>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chart" data-percent="80" data-scale-color="#ffb400">
                                            <span class="percent"><p><span>4</span>
                                            <br>песок</p>
                                            </span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="chart" data-percent="20" data-scale-color="#ffb400">
                                            <span class="percent"><p><span>1</span>
                                            <br>вода</p>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-large-1-2 uk-width-medium-1-1 uk-width-small-1-1">
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-1-1">
                                    <div class="des-panel-discription">
                                        <h3><?=$product["name"]?></h3>
                                        <h4 class="des-unique-h4"><?=$product["price"]?> руб. <?=$product["count"]?></h4>
                                        <div class="des-test-visible">
                                            <ul class="uk-tab" data-uk-tab="{connect:'#des-panel-id'}">
                                                <li class="uk-active"><a href="">ХАРАКТЕРИСТИКИ</a></li>
                                                <li><a href="">ПРИМЕНЕНИЕ</a></li>
                                            </ul>
                                            <ul id="des-panel-id" class="uk-switcher">
                                                <li class="des-panel-li-fix">
                                                    <p><?=$product["properties"]?></p>
                                                </li>
                                                <li class="des-panel-li-fix">
                                                    <p><?=$product["use"]?></p>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="des-test-invisible">
                                            <h4>Для заказа товара пожалуйста заполните данные</h4>
                                            <form action="">
                                                <ul>
                                                    <li>
                                                        <i class="uk-icon-user uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="name" class="dev-consumer-order-panel-label">Ваше Имя</label>
                                                            <input type="text" name="name" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-phone uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="tel" class="dev-consumer-order-panel-label">Email или телефон</label>
                                                            <input type="tel" name="tel" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-tags uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="brand" class="dev-consumer-order-panel-label">Марка бетона</label>
                                                            <input type="text" name="brand" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-shopping-bag uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="capacity" class="dev-consumer-order-panel-label">Объем</label>
                                                            <input type="number" name="capacity" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-map-marker uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="position" class="dev-consumer-order-panel-label">Адрес объекта</label>
                                                            <input type="text" name="position" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="uk-width-1-1">
                                    <div class="des-panel-bottom">
                                        <ul class="uk-grid uk-grid-width-large-1-2 uk-grid-width-medium-1-2 uk-grid-width-small-1-2" data-uk-grid-margin>
                                            <li>
                                                <input type="button" class="dev-but-submit-correct ripple-effect uk-clearfix" name="butOrder" value="ЗАКАЗАТЬ" data-ripple-limit=".box-wrapper" data-ripple-color="#fdaa31">
                                            </li>
                                            <li>
                                                <p><span>отдел продаж</span><br><?=$phone2?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="des-get-concrete-pomp">
            <div class="des-get-concrete-pomp-container uk-container2 uk-container-center">
                <h3 class="dev-order-head dev-h3-correct">ПОЛУЧИТЕ СКИДКУ НА АРЕНДУ БЕТОНАНАСОСА ПРИ ЗАКАЗЕ БЕТОНА</h3>
                <? require($home_dir."/includes/discount-form.php"); ?>
                <img class="des-concrete-pomp-img" src="/images/GTL-b12.png" alt="">
            </div>
        </div>
        <div class="des-our-app">
        <? $products_for_page_product = collection("Продукция")->find()->toArray();
        // print_r($products_for_page_product);
        ?>
            <div class="des-our-app-content des-container-correct">
                <h3 class="dev-h3-correct">ВОЗМОЖНО ВАМ ПОТРЕБУЕТСЯ</h3>
                <div class="uk-slidenav-position slider_our_app" data-uk-slider>
                    <div class="dev-consumer-slader-navigation uk-clearfix uk-hidden-small">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                    </div>
                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-width-small-1-2" data-uk-grid-match="target:'.panel_body'">
                            <?foreach ($products_for_page_product as $key) {?>
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct">
                                    <div class="panel_body">
                                        <div class="dev-img-correct">
                                        <? if (isset($key['photo'])&&!empty($key['photo'])) {?>
                                            <img src="<?=thumbnail_url($key['photo'][0]['path'], 160, 160, ['mode' => 'best_fit'])?>" alt="<?=$index_page_product['name'] ?>">
                                        <?}else{?>
                                            <img src="/images/block.png" alt="Block">
                                        <? } ?>
                                        </div>
                                        <p><?=$key['name'] ?><br><?=$key['price'] ?> <span>руб. - <?=$key['count'] ?></span></p>
                                    </div>
                                    <hr class="dev-line-correct">
                                    <a href="product.php?id<?=$key['_id'] ?>&order" class="dev-but-order-correct">Заказать</a>
                                    <a href="product.php?id<?=$key['_id'] ?>" class="dev-but-about-correct">Подробнее</a>
                                </div>
                            </li>
                            <?}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <? require($home_dir."/includes/technology.php"); ?>
        <div class="facilities_full_cs facilities_full_cp">
            <div class="uk-container2 uk-container-center facilities_cs">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct h3_cs">ОБЪЕКТЫ, ПОСТРОЕННЫЕ ИЗ НАШЕГО БЕТОНА</h3>
                <div class="uk-slidenav-position facilities_slidenav_cs" data-uk-slider="center:true, infinite:false">
                    <div class="dev-consumer-slader-navigation uk-clearfix">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="next">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="previous">
                    </div>
                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1 facilities_ul_slider_cs">
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                        <figure class="uk-overlay uk-overlay-hover">
                                        <img class="uk-overlay-scale" src="/images/objects.png" width="" height="" alt="">
                                        <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                        <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p>ЖК "Дом"</p>
                                        <span>г. Краснодар</span>
                                        </figcaption>
                                        </figure>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <? require($home_dir."/includes/docs.php"); ?>
        <div class="prefooter"></div>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
