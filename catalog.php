<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");

$id = $_REQUEST["category"];
$category = collection("Категории")->findOne(["name_slug"=>$id]);
$products = collection("Продукция")->find(["category"=>$category["_id"]])->sort(["price"=>-1])->toArray();
if(!isset($category)){
    //header('Location: /');
    //die;
}
$page_title = $category["name"];
$page_suffix = " | КРАСНОДАРСТРОЙСЕРВИС";

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
                <h3 class="uk-text-center dev-h3-correct h3_catalog"><?=$category['haed_in_catalog']?></h3>
                <? if(!empty($products)){ ?>
                <ul class="uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-4" data-uk-grid-match="target:'.panel_body'" data-uk-grid-margin>
                    <? foreach($products as $product){ ?>
                    <li>
                        <div class="uk-panel uk-panel-box dev-panel-correct">
                            <div class="panel_body">
                            <div class="dev-img-correct">
                                <? if(isset($product["photo"]) && !empty($product["photo"])){ ?>
                                <a href="/catalog/<?=$category["name_slug"]?>/<?=$product["name_slug"]?>">
                                   <? if($category['name']=='Инертные материалы'){?>
                                       <img src="<?=thumbnail_url($product["photo"][0]["path"],480,320,['made'=>'crope'])?>" alt="<?=$product["name"]?>">
                                   <? } else {?>
                                        <img src="<?=thumbnail_url($product["photo"][0]["path"])?>" alt="<?=$product["name"]?>">
                                    <? } ?>
                                </a>
                                <? } else { ?>
                                <a href="/catalog/<?=$category["name_slug"]?>/<?=$product["name_slug"]?>">
                                    <img src="/images/block.png" alt="Block">
                                </a>
                                <? } ?>
                            </div>
                            <h3><?=$product["name"]?><br><span class="des-panel-head-bold"><?=$product["price"]?></span><span class="des-panel-head-count"> руб. - <?=$product["count"]?></span></h3>
                            </div>
                            <span class="des-line"></span>
                            <a href="/catalog/<?=$category["name_slug"]?>/<?=$product["name_slug"]?>" class="dev-but-order-correct">Заказать</a>
                            <a href="/catalog/<?=$category["name_slug"]?>/<?=$product["name_slug"]?>" class="dev-but-about-correct">Подробнее</a>
                        </div>
                    </li>
                    <? } ?>
                </ul>
                <? } else { ?>
                <h2 class="uk-text-danger uk-text-center">Продукция в данной категории отсутствует</h2>
                <div class="uk-clearfix"></div>
                <? } ?>
            </div>
        </div>
        <div class="dev-container-order dev_container_order_cs">
            <div class="uk-container2 uk-container-center dev-container-order-correct">
                <h3 class="uk-text-center dev-order-head dev-h3-correct">ПОЛУЧИТЕ СКИДКУ НА АРЕНДУ БЕТОНАНАСОСА ПРИ ЗАКАЗЕ БЕТОНА</h3>
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
