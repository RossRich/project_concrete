<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");

$id = $_REQUEST["category"];
//print_r($_REQUEST);
$category = collection("Категории")->findOne(["_id"=>$id]);
$products = collection("Продукция")->find(["category"=>$id])->toArray();
if(!isset($category)){
    //header('Location: /');
    //sdie;
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
                <ul class="uk-grid uk-container-center uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-match="target:'.panel_body'">
                    <? foreach($products as $product){ ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct">
                            <div class="panel_body">
                            <div class="dev-img-correct">
                                <? if(isset($product["photo"]) && !empty($product["photo"])){ ?>
                                <a href="/product.php?id=<?=$product["_id"]?>"><img src="<?=thumbnail_url($product["photo"][0]["path"], 200, 200, ["mode" => "best_fit"])?>" alt="<?=$product["name"]?>"></a>
                                <? } else { ?>
                                <a href="/product.php?id=<?=$product["_id"]?>"><img src="/images/block.png" alt="Block"></a>
                                <? } ?>
                            </div>
                            <h3><?=$product["name"]?><br><span class="des-panel-head-bold"><?=$product["price"]?></span><span class="des-panel-head-count"> руб. - <?=$product["count"]?></span></h3>
                            </div>
                            <span class="des-line"></span>
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
        <? require($home_dir."/includes/facilities.php"); ?>
        <? require($home_dir."/includes/docs.php"); ?>
        <div class="prefooter"></div>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
