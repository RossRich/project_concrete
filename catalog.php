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

//var_dump($products);
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
                <!-- <form action="handler.php">
                    <ul class="uk-grid uk-container-center uk-grid-width-medium-1-1 uk-grid-width-large-1-3 uk-grid-width-small-1-1 dev-order-li-correct">
                        <li>
                            <div class="uk-flex">
                                <img class="dev-img-ico-correct" src="/images/ic_person_outline_black_48dp_ORDER.png" alt="">
                                <div class="input-item">
                                    <label for="name" class="dev-order-label">Ваше Имя</label>
                                    <input type="text" name="name" class="dev-order-input">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex">
                                <img class="dev-img-ico-correct" src="/images/ic_call_black_18dp.png" alt="">
                                <div class="input-item">

                                    <label for="tel" class="dev-order-label">Ваш Телефон</label>
                                    <input type="tel" name="tel" class="dev-order-input" pattern="[8]{0-9}([0-9]{3})[0-9]{2}-[0-9]{2}-[0-9]{3}">
                                </div>
                            </div>
                        </li>
                        <li>
                            <input type="submit" class="dev-but-submit-correct" value="получить скидку">
                        </li>
                    </ul>
                </form> -->
                <? require($home_dir."/includes/discount-form.php"); ?>
            </div>
        </div>
        <? require($home_dir."/includes/technology.php"); ?>
        <div class="facilities_full_cs">
            <div class="uk-container2 uk-container-center facilities_cs">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct h3_cs">ОБЪЕКТЫ, ПОСТРОЕННЫЕ ИЗ НАШЕГО БЕТОНА</h3>
                <div class="uk-slidenav-position facilities_slidenav_cs" data-uk-slider="center:true, infinite:false">
                    <div class="dev-consumer-slader-navigation uk-clearfix">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                    </div>
                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1 facilities_ul_slider_cs">
                            <li>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>

                                            </a>
                                        </div>
                                    </li>
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f02.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f03.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>

                                            </a>
                                        </div>
                                    </li>
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f04.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f05.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>

                                            </a>
                                        </div>
                                    </li>
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f06.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f07.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>

                                            </a>
                                        </div>
                                    </li>
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f08.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f09.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>

                                            </a>
                                        </div>
                                    </li>
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f10.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f11.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>

                                            </a>
                                        </div>
                                    </li>
                                    <li class="facilities_1-li_cs">
                                        <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                            <a href="/images/f12.jpg" data-uk-lightbox="{group:'my-group'}" title="ЖК 'Дом'">
                                                <div class="facilities_img_cs">
                                                    <img src="/images/objects.png" alt="">
                                                </div>
                                                <div class="facilities_panel_top_cs">
                                                    <img src="/images/ic_zoom.png" alt="">
                                                </div>
                                                <div class="facilities_panel_bottom_cs">
                                                    <p>ЖК "Дом"</p>
                                                    <span>г. Краснодар</span>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
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
