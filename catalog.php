<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");

$id = $_REQUEST["category"];
$category = collection("Категории")->findOne(["_id"=>$id]);
$products = collection("Продукция")->find(["category"=>$id])->toArray();
if(!isset($category)){
    // header('Location: /');
    // die;
}
$page_title = $category["name"];
$page_suffix = " | КраснодарСтройСервис";

//var_dump($products);л
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <div class="wrapper">
        <? require($home_dir."/includes/header.php"); ?>
        <div class="dev-container-concreate">
            <div class="uk-container2 uk-container-center dev-container-correct">
                <h3 class="uk-text-center dev-h3-correct">Доставка бетона и раствора в Краснодаре</h3>
                <? if(!empty($products)){ ?>
                <ul class="uk-grid uk-container-center uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4">
                    <? foreach($products as $product){ ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct">
                            <div class="dev-img-correct">
                                <? if(isset($product["photo"]) && !empty($product["photo"])){ ?>
                                <a href="/product.php?id=<?=$product["_id"]?>"><img src="<?=thumbnail_url($product["photo"][0]["path"], 200, 200, ["mode" => "best_fit"])?>" alt="<?=$product["name"]?>"></a>
                                <? } else { ?>
                                <a href="/product.php?id=<?=$product["_id"]?>"><img src="/images/block.png" alt="Block"></a>
                                <? } ?>
                            </div>
                            <h3><?=$product["name"]?><br><?=$product["price"]?> руб. - <?=$product["count"]?></h3>
                            <hr class="dev-line-correct">
                            <a href="/product.php?id=<?=$product["_id"]?>&order" class="dev-but-order-correct">Заказать</a>
                            <a href="/product.php?id=<?=$product["_id"]?>" class="dev-but-about-correct">Подробнее</a>
                        </div>
                    </li>
                    <? } ?>
                </ul>
                <? } else { ?>
                <h2 class="uk-text-danger uk-text-center">Продуция в данной категории отсутствует</h2>
                <div class="uk-clearfix"></div>
                <? } ?>
            </div>
        </div>
        <div class="dev-container-order dev_container_order_cs">
            <div class="uk-container2 uk-container-center dev-container-order-correct">
                <h3 class="uk-text-center dev-order-head dev-h3-correct">ПОЛУЧИТЕ ГАРАНТИРОВАННУЮ СКИДКУ ПРИ ЗАКАЗЕ НА САЙТЕ</h3>
                <? require($home_dir."/includes/discount-form.php"); ?>
            </div>
        </div>
        <? require($home_dir."/includes/technology.php"); ?>
        <div class="facilities_full_cs">
            <div class="uk-container2 uk-container-center facilities_cs">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct h3_cs">ОБЪЕКТЫ, ПОСТРОЕННЫЕ ИЗ НАШЕГО БЕТОНА</h3>
                <div class="uk-margin facilities_slidenav_cs" data-uk-slideset="{small: 2, medium: 4, large: 6}">
                    <div class="dev-consumer-slader-navigation uk-clearfix">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slideset-item="next" >
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slideset-item="previous">
                    </div>
                    <div class="uk-slidenav-position uk-margin">
                        <ul class="uk-slideset uk-grid uk-flex-center uk-grid-width-1-1 uk-grid-width-large-1-3 uk-grid-width-medium-1-4 uk-grid-width-small-1-2 facilities_ul_slider_cs">
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
