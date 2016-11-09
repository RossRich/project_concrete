<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Корпоративный блог | Корпоративный блог";
$page_suffix = " | КраснодарСтройСервис";

$categorys=collection('Категории')->find()->limit(4)->toArray();
$posts=collection('Блог')->find(['active'=>true])->sort(["date"=>-1])->toArray();
//print_r($posts);

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <div class="wrapper">
        <? require($home_dir."/includes/header.php"); ?>
        <div class="blog_all_full">
            <div class="uk-container2 uk-container-center blog_all">
                <h3 class="uk-text-center h3_ba">Корпоративный блог</h3>

                <div class="main_menu_full main_menu_full_header main_menu_full_ba" style="margin: 0px;">
                    <div class="uk-container uk-container-center uk-clearfix main_menu">
                        <nav>
                            <!-- Filter Controls -->
                            <ul id="my-id" class="uk-subnav ul_main_menu list ul_main_menu_ba">
                               <li data-uk-filter="" class="uk-active"><a href="">Все категории</a></li>
                                <? foreach($categorys as $category) {?>
                                <li data-uk-filter="filter-<?=$category['_id']?>"><a href=""><?=$category['name']?></a></li>
                                <? } ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="hr hr_ba"></div>
                </div>
                <!-- Dynamic Grid -->
                <div class="uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 blog_grid_ba" data-uk-grid="{controls: '#my-id', gutter: 40}" data-uk-grid-match="{target:'.panel_body'}">
                    <? foreach($posts as $post) {?>
                    <div data-uk-filter="filter-<?=$post['category']?>">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                           <div class="panel_body">
                            <figure class="uk-overlay uk-thumbnail-expand">
                              <a href="/blog.php/?id=<?=$post['_id']?>">
                               <? if(isset($post['photo']) && !empty($post['photo'])){?>
                               <img src="<?=thumbnail_url($post['photo'][0]['path'], 353, 300, ['mode'=>'crope'])?>" alt="<?=$post['head']?>">
                               <? }else{ ?>
                                <img src="/images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <? } ?>
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba"><?=$post['date']?></figcaption>
                                </a>
                            </figure>
                            <h3><?=$post['head']?></h3>
                            <p>
                                <?=$post['discription']?>
                            </p>
                            </div>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <?
                                    $postId=$post['_id'];
                                    $counterBlogAll = cockpit('datastore:findOne', 'counter', ['id' => $postId]);
                                ?>
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span><?=$counterBlogAll['counter']?></$counterBlog?></span></div>
                                <div class="uk-float-left"><a href="/blog.php/?id=<?=$post['_id']?>">Подробнее</a></div>
                            </div>
                        </div>
                    </div>
                    <? } ?>
                </div>
           </div>
        </div>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
