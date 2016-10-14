<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Статья | Корпоративный блог";
$page_suffix = " | КраснодарСтройСервис";


//var_dump($home_dir);
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
                <ul class="uk-breadcrumb uk-text-center">
                    <li><a href="index.html">Главная </a></li>
                    <li><a href="blog_all.html">Корпоративный блог</a></li>
                    <li class="uk-active"><span>Как правильно заливать бетон</span></li>
                </ul>
                <h3>КАК ПРАВИЛЬНО ЗАЛИВАТЬ БЕТОН ДЛЯ ФУНДАМЕНТА</h3>
                <div class="uk-grid uk-grid-collapse uk-container-center des-blog-content">
                    <main class="uk-width-medium-3-4 uk-row-first">
                        <div class="uk-panel uk-panel-box">
                            <div class="uk-panel-teaser">
                                <img src="/images/beton_2_kategoriya.png" alt="КАК ПРАВИЛЬНО ЗАЛИВАТЬ БЕТОН ДЛЯ ФУНДАМЕНТА">
                            </div>
                            <p>Ленточный фундамент чаще всего используют в частной застройке при возведении коттеджей, гаражей, бань. Он обходится дешевле фундамента сплошной конструкции, при этом функциональнее, чем фундамент свайного типа, и идеально подходит для строений с используемым подвалом.</p>
                            <p>Ленточный фундамент своими руками Необходимые материалы</p>
                            <p>Заливной ленточный фундамент выполняют из бетона марки 200. Его можно заказать или приготовить самостоятельно. Учтите, что это весьма трудоемкая работа, и фундамент, залитый небольшими порциями, будет неоднородным. Состав бетона для заливки фундамента: цемент, крупнозернистый песок, гравий в соотношении 1:2:2,5.</p>
                            <p>Кроме бетона для фундамента понадобятся: Струганая доска толщиной 20 мм для опалубки; Стальной пруток 8-12 мм и проволока для армирования фундамента; Речной песок для песчаной подушки. Подготовительные работы</p>
                            <div class="social">
                                <!--
                                <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                                <script src="//yastatic.net/share2/share.js"></script>
-->
                                <ul>
                                    <li class="uk-text-middle">Поделится</li>
                                    <li>
                                        <div class="ya-share2" data-services="collections,vkontakte,facebook,odnoklassniki,moimir,gplus,twitter" data-counter=""></div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </main>
                    <aside class="uk-width-medium-1-4">
                        <main>
                            <div class="categories">
                                <h3>Категории</h3>
                                <ul class="uk-list uk-list-space ">
                                    <li class="active">Бетон</li>
                                    <li>Инертные материалы</li>
                                    <li>Строительные материалы</li>
                                    <li>Спецтехника</li>
                                    <li>Строительство</li>
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
                        <div class="dev-consumer-slader-navigation uk-clearfix">
                            <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                            <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                        </div>
                        <div class="uk-slider-container">
                            <ul class="uk-slider uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">
                                <li>
                                    <div class="uk-panel uk-panel-box" uk-clearfix>
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>
                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="uk-panel uk-panel-box" uk-clearfix>
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>

                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="uk-panel uk-panel-box" uk-clearfix>
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>

                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
                                        <div class="uk-clearfix">
                                            <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                            <div class="uk-float-left"><a href="blog.html">Подробнее</a></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="uk-panel uk-panel-box" uk-clearfix>
                                        <div class="uk-panel-teaser">
                                            <figure class="uk-overlay">
                                                <img src="/images/news.jpg" alt="">
                                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom dev-slired-panel-overlay_ba">12 сентября 2016</figcaption>
                                            </figure>
                                        </div>
                                        <h3>Как правильно заливать бетон для фундамента</h3>
                                        <p>
                                            Перед началом заливки монолитного основания следует рассчитать
                                        </p>
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