<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Главная";
$page_suffix = " | КРАСНОДАРСТРОЙСЕРВИС";
$page_id = "index";

$reviews = collection("Отзывы")->find(["active"=>true])->toArray();
$index_page_category = collection("Категории")->findOne(["items_index_page"=>true]);


// var_dump($reviews);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <div class="wrapper uk-g">
        <? require($home_dir."/includes/header.php"); ?>
        <? require($home_dir."/includes/advantages_trust.php"); ?>
        <?
        if(isset($index_page_category) && !empty($index_page_category)){
            $index_page_products = collection("Продукция")->find(["category" => $index_page_category["_id"]])->toArray();?>
        <div class="dev-container-concreate">
            <div class="uk-container2 uk-container-center dev-container-correct">
                <h3 class="uk-text-center dev-h3-correct"><?=$index_page_category["name_index_page"]?></h3>
                <ul class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-match="target:'.panel_body'" data-uk-grid-margin>
                    <? foreach($index_page_products as $index_page_product){ ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct">
                            <div class="panel_body">
                                <div class="dev-img-correct">
                                    <? if(isset($index_page_product["photo"]) && !empty($index_page_product["photo"])){ ?>
                                    <a href="/catalog/<?=$index_page_category["name_slug"]?>/<?=$index_page_product["name_slug"]?>"><img src="<?=thumbnail_url($index_page_product["photo"][0]["path"])?>" alt="<?=$index_page_product["name"]?>"></a>
                                    <? } else { ?>
                                    <a href="/catalog/<?=$index_page_category["name_slug"]?>/<?=$index_page_product["name_slug"]?>"><img src="/images/block.png" alt="Block"></a>
                                    <? } ?>
                                </div>
                                <h3><?=$index_page_product["name"]?><br><span class="des-panel-head-bold"><?=$index_page_product["price"]?></span><span class="des-panel-head-count"> руб. - <?=$index_page_product["count"]?></span></h3>
                            </div>
                            <span class="des-line"></span>
                            <a href="#modalOrder" class="dev-but-order-correct" data-uk-modal>Заказать</a>
                            <a href="/catalog/<?=$index_page_category["name_slug"]?>/<?=$index_page_product["name_slug"]?>" class="dev-but-about-correct">Подробнее</a>
                        </div>
                    </li>
                    <? } ?>
                </ul>
            </div>
        </div>
        <? } ?>
        <div class="dev-container-order">
        <div class="uk-container2 uk-container-center dev-container-order-correct">
            <h3 class="uk-text-center dev-order-head dev-h3-correct">ПОЛУЧИТЕ ГАРАНТИРОВАННУЮ СКИДКУ ПРИ ЗАКАЗЕ НА САЙТЕ</h3>
              <? require($home_dir."/includes/discount-form.php"); ?>
            </div>
        </div>
        <div class="dev-container-material">
            <div class="uk-container-center dev-container-correct uk-container2">
                <h3 class="uk-text-center dev-h3-correct">СТРОИТЕЛЬНЫЕ МАТЕРИАЛЫ И УСЛУГИ ТЕХНИКИ</h3>
                <ul class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-4" data-uk-grid-match="target:'.panel_body'" data-uk-grid-margin>
                    <?
                    $main_categorys = collection("Категории")->find()->toArray();
                    foreach($main_categorys as $main_category){
                        if($main_category["items_index_page"]) continue;
                    ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct dev-material-panel-correct">
                            <div class="panel_body">
                                <h3 class="dev-material-panel-head-correct"><?=$main_category["name"]?></h3>
                                <div class="dev-material-panel-img-correct">
                                    <img src="/<?=substr($main_category["photo"][0]["path"], 5)?>" class="dev-material-panel-img-correct" alt="">
                                </div>
                                <p class="dev-material-panel-description"><?=$main_category["description"]?></p>
                            </div>
                                <span class="des-line"></span>
                                <a href="/catalog/<?=$main_category["name_slug"]?>" class="dev-material-panel-but-correct dev-but-order-correct">Подробнее</a>
                        </div>
                    </li>
                    <? } ?>
                </ul>
            </div>
        </div>
        <? require($home_dir."/includes/consumer_about_us.php"); ?>
        <? require($home_dir."/includes/our_partners.php"); ?>
        <? require($home_dir."/includes/docs.php"); ?>
        <div class="prefooter"></div>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
    <? require($home_dir."/includes/modalOrder.php"); ?>
</body>

</html>
