<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$id = $_REQUEST["id"];
// print_r($id);
$page_title = "Статья | Корпоративный блог";
$page_suffix = " | КраснодарСтройСервис";
//var_dump($home_dir);
$categorys=collection('Категории')->find()->limit(4)->toArray();
$post=collection('Блог')->findOne(['_id'=>$id]);


// counter
if (!isset($_COOKIE['Ind_Counter'])) $_COOKIE['Ind_Counter'] = 0;
$_COOKIE['Ind_Counter']++;
SetCookie('Ind_Counter', $_COOKIE['Ind_Counter'], 0x6FFFFFFF);
$counter=$_COOKIE['Ind_Counter'];

$entry = ['counter' => $counter];
cockpit('collections:save_entry', 'Блог', $entry);

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <div class="wrapper">
        <? require($home_dir."/includes/header.php"); ?>
        <main>
            <div class="uk-container uk-container-center des-blog">
                <ul class="uk-breadcrumb uk-text-center uk-hidden-medium uk-hidden-small">
                    <li><a href="index.html">Главная </a></li>
                    <li><a href="/blog_all.php">Корпоративный блог</a></li>
                    <li class="uk-active"><span><?=$post['head']?></span></li>
                </ul>
                <h3><?=$post['head']?></h3>
                <div class="uk-grid uk-grid-collapse uk-container-center des-blog-content">
                    <main class="uk-width-large-3-4 uk-width-medium-1-1 uk-row-first">
                        <div class="uk-panel uk-panel-box">
                            <div class="uk-panel-teaser">
                                <div class="uk-thumbnail-expand">
                                  <? if(isset($post['photo']) && !empty($post['photo'])){?>
                                  <img src="<?=thumbnail_url($post['photo'][0]['path'], 847, 503, ['mode'=>'best_fit'])?>" alt="<?=$post['head']?>">
                                  <? }else{ ?>
                                    <img src="/images/beton_2_kategoriya.png" alt="">
                                    <? } ?>
                                </div>
                            </div>
                            <p>
                              <?=$post['content']?>
                            </p>
                            <div class="social">
                                <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                <script src="//yastatic.net/share2/share.js"></script>
                                <ul class="uk-grid uk-grid-width-1-1">
                                    <li class="uk-text-right">
                                        <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter" data-counter=""></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </main>
                    <aside class="uk-width-medium-1-4 uk-hidden-medium uk-hidden-small">
                        <main>
                            <div class="categories">
                                <h3>Категории</h3>
                                <ul class="uk-list uk-list-space ">
                                  <? foreach($categorys as $category){?>
                                    <? if($category['_id']==$post['category']){ ?>
                                    <li class="active"><?=$category['name']?></li>
                                    <? }else{ ?>
                                    <li class=""><?=$category['name']?></li>
                                      <? } ?>
                                    <!-- <li>Инертные материалы</li>
                                    <li>Строительные материалы</li>
                                    <li>Спецтехника</li>
                                    <li>Строительство</li> -->
                                    <? } ?>
                                </ul>
                            </div>
                            <div class="popular">
                                <h3>популярное</h3>
                                <ul class="uk-list uk-list-space">
                                    <li>
                                        <div class="uk-panel uk-panel-box">
                                            <header class="uk-comment-header">
                                                <img class="uk-comment-avatar uk-border-circle" src="/images/11ab0134867677.56e090a40fcce_cr.png" alt="">
                                                <h4 class="uk-comment-title">ЗАЛИВКА БЕТОНА</h4>
                                                <div class="uk-comment-meta">12 сентября 2016</div>
                                            </header>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-panel uk-panel-box">
                                            <header class="uk-comment-header">
                                                <img class="uk-comment-avatar uk-border-circle" src="/images/11ab0134867677.56e090a40fcce_cr.png" alt="">
                                                <h4 class="uk-comment-title">ЗАЛИВКА БЕТОНА</h4>
                                                <div class="uk-comment-meta">12 сентября 2016</div>
                                            </header>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-panel uk-panel-box">
                                            <header class="uk-comment-header">
                                                <img class="uk-comment-avatar uk-border-circle" src="/images/11ab0134867677.56e090a40fcce_cr.png" alt="">
                                                <h4 class="uk-comment-title">ЗАЛИВКА БЕТОНА</h4>
                                                <div class="uk-comment-meta">12 сентября 2016</div>
                                            </header>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-panel uk-panel-box">
                                            <header class="uk-comment-header">
                                                <img class="uk-comment-avatar uk-border-circle" src="/images/11ab0134867677.56e090a40fcce_cr.png" alt="">
                                                <h4 class="uk-comment-title">ЗАЛИВКА БЕТОНА</h4>
                                                <div class="uk-comment-meta">12 сентября 2016</div>
                                            </header>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="uk-panel uk-panel-box">
                                            <header class="uk-comment-header">
                                                <img class="uk-comment-avatar uk-border-circle" src="/images/11ab0134867677.56e090a40fcce_cr.png" alt="">
                                                <h4 class="uk-comment-title">ЗАЛИВКА БЕТОНА</h4>
                                                <div class="uk-comment-meta">12 сентября 2016</div>
                                            </header>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </main>
                    </aside>
                </div>
                <div class="des-blog-slider uk-container-center">
                    <h3>СВЕЖИЕ ЗАПИСИ</h3>
                    <div class="uk-slidenav-position slider_blog" data-uk-slider>
                        <div class="dev-consumer-slader-navigation uk-clearfix uk-hidden-small">
                            <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                            <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                        </div>
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1" data-uk-grid-match="target:'.panel_body'">
                                <li>
                                    <div class="uk-panel uk-panel-box">
                                        <div class="panel_body">
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay uk-thumbnail-expand">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>
                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
                                        </div>
                                        <span class="des-line"></span>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="uk-panel uk-panel-box">
                                        <div class="panel_body">
                                            <div class="uk-panel-teaser">
                                                <figure class="uk-overlay">
                                                    <img src="/images/news.jpg" alt="">
                                                    <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                                </figure>

                                            </div>
                                            <h3>Как правильно заливать бетон для фундамента</h3>
                                            <p>
                                                Перед началом заливки монолитного основания следует рассчитать
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt velit ipsam fugiat quas unde at consequuntur commodi esse quaerat quidem culpa, earum atque officiis modi aliquid quisquam dolorem ipsa deleniti.
                                            </p>
                                            </div>
                                        <span class="des-line"></span>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="uk-panel uk-panel-box">
                                        <div class="panel_body">
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay uk-thumbnail-expand">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>
                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
                                        </div>
                                        <span class="des-line"></span>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="uk-panel uk-panel-box">
                                        <div class="panel_bodyy">
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay uk-thumbnail-expand">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>
                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
                                        </div>
                                        <span class="des-line"></span>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slider-item="previous"></a>
                        <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next"></a>
                    </div>
                </div>
            </div>
        </main>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
