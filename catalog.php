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
    <? include($home_dir."/includes/top-scripts.php"); ?>
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
        <div class="advantages_full advantages_full_cs">
            <div class="uk-container2 uk-container-center advantages">
                <h3 class="uk-text-center">ТЕХНОЛОГИЯ ПРОИЗВОДСТВА БЕТОНА И РАСТВОРОВ</h3>
                <ul class="uk-grid uk-grid-collapse uk-container-center uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2">
                    <li class="ad_panel_cs">
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/add1.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>Апробированый цемент</h4>
                                <p>Определяющим фактором производства бетонных</p>
                                <p>смесей является качество цемента. Наша лаборатория</p>
                                <p>тщательно проверяет качество используемого цемента</p>
                            </div>
                        </div>
                    </li>
                    <li class="ad_panel_cs">
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/add2.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>Максимальное смешивание</h4>
                                <p>Высокотехнологичное оборудование завода позволяет</p>
                                <p>достигнуть максимального смешивания всех</p>
                                <p>компонентов до необходимой однородности</p>
                            </div>
                        </div>
                    </li>
                    <li class="ad_panel_cs">
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/add3.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>Качественные примеси</h4>
                                <p>Не менее важным фактором является используемые</p>
                                <p>наполнители. Мы оцениваем зерновой состав,</p>
                                <p>содержание полевидных и глинистых примесей,</p>
                                <p>степень загрязненности</p>
                            </div>
                        </div>
                    </li>
                    <li class="ad_panel_cs">
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/add4.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>Использование очищенной воды</h4>
                                <p>Мало учитываемый фактор - это качество воды. Но он</p>
                                <p>не менее важен для производства бетона. Поэтому мы</p>
                                <p>делаем анализ на содержание примесей для ее очистки</p>
                                <p>в дальнейшем использовании</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="facilities_full_cs">
            <div class="uk-container2 uk-container-center facilities_cs">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct h3_cs">ОБЪЕКТЫ, ПОСТРОЕННЫЕ ИЗ НАШЕГО БЕТОНА</h3>
                <div class="uk-slidenav-position facilities_slidenav_cs" data-uk-slider="center:true">
                    <div class="dev-consumer-slader-navigation uk-clearfix">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                    </div>
                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1 facilities_ul_slider_cs">
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
        <div class="documents_full">
            <div class="uk-container2 uk-container-center documents">
                <ul class="uk-grid uk-grid-collapse uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2 main_ul">
                    <li class="li_doc_div li_doc_div1">
                        <div class="doc_div_1">
                            <h5>ПРЕДОСТАВЛЯЕМ ПОЛНЫЙ ПАКЕТ ДОКУМЕНТОВ</h5>
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-1-5">
                                    <a href="">
                                        <img src="/images/ic_description.png" alt="">
                                        <span>Рапорт</span>
                                    </a>
                                </li>
                                <li class="uk-width-3-10">
                                    <a href="">
                                        <img src="/images/ic_description.png" alt="">
                                        <span>Путевой лист</span>
                                    </a>
                                </li>
                                <li class="uk-width-1-2">
                                    <a href="">
                                        <img src="/images/ic_description.png" alt="">
                                        <span>Справка — ЭСМ 7</span>
                                    </a>
                                </li>
                                <li class="uk-width-1-5">
                                    <a href="">
                                        <img src="/images/ic_description.png" alt="">
                                        <span>Счет</span>
                                    </a>
                                </li>
                                <li class="uk-width-3-10">
                                    <a href="">
                                        <img src="/images/ic_description.png" alt="">
                                        <span>Счет-фактуру</span>
                                    </a>
                                </li>
                                <li class="uk-width-1-2">
                                    <a href="">
                                        <img src="/images/ic_description.png" alt="">
                                        <span>Акт выполненных работ</span>
                                    </a>
                                </li>
                            </ul>
                            <a href="">
                                <button>Скачать образцы</button>
                            </a>
                            <h5>ПРИНИМАЕМ ВСЕ ВИДЫ ОПЛАТЫ</h5>
                            <ul class="uk-grid uk-grid-collapse">
                                <li class="uk-width-1-2">
                                    <img src="/images/ic_monetization.png" alt="">
                                    <span>Наличный расчет</span>
                                </li>
                                <li class="uk-width-1-2">
                                    <img src="/images/ic_subject.png" alt="">
                                    <span>Безналичный расчет</span>
                                </li>
                                <li class="uk-width-1-2">
                                    <img src="/images/ic_credit_card.png" alt="">
                                    <span>Банковской картой</span>
                                </li>
                                <li class="uk-width-1-2">
                                    <img src="/images/ic_subject.png" alt="">
                                    <span>Безналичный расчет с НДС</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="li_doc_div li_doc_div2">
                        <div class="doc_div_2">
                            <h4>Отдел продаж</h4>
                            <a href="tel:8 918 44 99 703" class="phone_dep">8 (918) 44-99-703</a>
                            <br>
                            <a href="">
                                <button>Вызов менеджера</button>
                            </a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
        <div class="prefooter"></div>
        <? include($home_dir."/includes/footer.php"); ?>
    </div>
    <? include($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
