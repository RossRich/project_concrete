<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_suffix = " | КРАСНОДАРСТРОЙСЕРВИС";


$id = $_REQUEST["id"];
$product = collection("Продукция")->findOne(["name_slug"=>$id]);
$category = collection("Категории")->findOne(["_id"=>$product["category"]]);
// print_r($category);
$page_title = $product["slogan"];
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
    
    <script type="text/javascript" src="/js/simple-ripple-effect.js"></script>
    <script src="/js/concrete_product.js"></script>
</head>

<body>
    <div class="wrapper">
        <? require($home_dir."/includes/header.php"); ?>
        <div class="des-delivery-concrete">
            <div class="des-container-correct des-contauner-content-delivery">
                <ul class="uk-breadcrumb uk-hidden-small">
                    <li><a href="/">Главная</a></li>
                    <li><a href="/catalog/<?=$category["name_slug"]?>"><?=$category["name"]?></a></li>
                    <li class="uk-active"><span><?=$product["name"]?></span></li>
                </ul>
                <h3><?=$product["slogan"]?></h3>
                <div class="des-content-panel box-wrapper">
                    <div class="uk-grid uk-grid-collapse">
                        <div class="uk-width-large-1-2 uk-hidden-small">
                            <? if(isset($product["photo"]) && !empty($product["photo"])){ ?>
                            <div class="des-panel-img">
                             <? if($category['name']=='Продажа бетона'){ ?>
                                 <img src="/images/concrete/kartochka.png" alt="Block">
                             <? } else {?>
                              			<img src="<?=thumbnail_url($product["photo"][0]["path"])?>" alt="">
                              <? } ?>
                            </div>
                            <? } else { ?>
                          <div class="des-panel-img">
                            <img src="/images/no_image_block.png" alt="Block">
                          </div>
                            <? } ?>
                            <? if($category['name']=='Продажа бетона'){ ?>
                            	<div class="des-note-text uk-clearfix">
                           	<p class="des-note">
                           		Стоимость доставки от 200 руб до 400 руб в зависимости от объема заказа и удаленности объекта. При заказе от 100 м3 доставка бесплатная!
                           	</p>
                           </div>
                            <? } ?>
                            <!-- <h4>пропорции бетона</h4> -->
                            <div class="des-panel-proportion uk-hidden">
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
                                        <h4 class="des-unique-h4"><span class="des-panel-head-bold"><?=$product["price"]?></span><span class="des-panel-head-count"> руб. <?=$product["count"]?></span></h4>
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
                                            <?php form('checkout', ['id' => 'checkout_form']); ?>
                                                <ul>
                                                    <li>
                                                       	<input for="" name="form[product]" class="hidden-name-product uk-hidden" value="<?=$product["name"]?>">
                                                       	<input for="" name="form[price]" class="hidden-name-product uk-hidden" value="<?=$product["price"]?>">
                                                        <i class="uk-icon-user uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="name" class="dev-consumer-order-panel-label">Ваше Имя</label>
                                                            <input type="text" name="form[name]" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-phone uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="form[contact]" class="dev-consumer-order-panel-label">Телефон</label>
                                                            <input type="text" data-phone-mask name="form[contact]" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-shopping-bag uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="capacity" class="dev-consumer-order-panel-label">Объем (необязательно)</label>
                                                            <input type="text" name="form[capacity]" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-map-marker uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="position" class="dev-consumer-order-panel-label">Адрес объекта (необязательно)</label>
                                                            <input type="text" name="form[position]" class="input-item-consumer-order-panel-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-tags uk-icon-medium"></i>
                                                        <div class="input-item-consumer-order-panel">
                                                            <label for="brand" class="dev-consumer-order-panel-label">Комментарий к заказу (необязательно)</label>
                                                            <input type="text" name="form[brand]" class="input-item-consumer-order-panel-input">
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
                                                <input type="submit" class="dev-but-submit-correct ripple-effect uk-clearfix" name="butOrder" value="ЗАКАЗАТЬ" data-ripple-limit=".box-wrapper" data-ripple-color="#fdaa31">
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
                <div class="uk-slidenav-position slider_our_app" data-uk-slider="{infinite: false}">
                    <div class="dev-consumer-slader-navigation uk-clearfix uk-hidden-small">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="next">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="previous">
                    </div>
                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid uk-grid-width-large-1-4 uk-grid-width-medium-1-3 uk-grid-width-small-1-2" data-uk-grid-match="target:'.panel_body'">
                            <?foreach ($products_for_page_product as $key) {?>
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct">
                                    <div class="panel_body">
                                       <a href="/catalog/<?=$category["name_slug"]?>/<?=$key["name_slug"]?>">
                                        <div class="dev-img-correct">
                                        <? if (isset($key['photo'])&&!empty($key['photo'])) {?>
                                            <img src="<?=thumbnail_url($key['photo'][0]['path'])?>" alt="<?=$index_page_product['name'] ?>">
                                        <?}else{?>
                                            <img src="/images/block.png" alt="Block">
                                        <? } ?>
                                        
                                        </div>
                                        </a>
                                        <h3><?=$key["name"]?><br><span class="des-panel-head-bold"><?=$key["price"]?></span><span class="des-panel-head-count"> руб. - <?=$key["count"]?></span></h3>
                                    </div>
                                    <span class="des-line"></span>
                                    <a href="#modalOrder" class="dev-but-order-correct" data-uk-modal>Заказать</a>
                                    <a href="/catalog/<?=$category["name_slug"]?>/<?=$key["name_slug"]?>" class="dev-but-about-correct">Подробнее</a>
                                  
                                </div>
                            </li>
                            <?}?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <? require($home_dir."/includes/technology.php"); ?>
        <? require($home_dir."/includes/facilities.php"); ?>
        <? require($home_dir."/includes/docs.php"); ?>
        <div class="prefooter"></div>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
    <? require($home_dir."/includes/modalOrder.php"); ?>
</body>

</html>
