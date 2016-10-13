<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Корпоративный блог | Корпоративный блог";
$page_suffix = " | КраснодарСтройСервис";


//var_dump($home_dir);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? include($home_dir."/includes/top-scripts.php"); ?>
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
                                <li data-uk-filter="filter-a"><a href="">Бетон</a></li>
                                <li data-uk-filter="filter-b"><a href="">Инертные материалы</a></li>
                                <li data-uk-filter="filter-c"><a href="">Строительные материалы</a></li>
                                <li data-uk-filter="filter-d"><a href="">Спецтехника</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="hr hr_ba"></div>
                </div>
                
                <!-- Dynamic Grid -->
                <div class="uk-grid-small uk-grid-width-small-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-3 blog_grid_ba" data-uk-grid="{controls: '#my-id', gutter: 40}">
                    <div data-uk-filter="filter-a">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-b">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-c">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-d">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-a">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-b">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-c">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-a">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>    
                    </div>
                    <div data-uk-filter="filter-a">
                        <div class="uk-panel uk-panel-box dev-panel-correct blog_panel" >
                            <figure class="uk-overlay">
                                <img src="images/news.jpg" class="" width="353" height="300" alt="Заливка бетона">
                                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-bottom overlay_ba">12 сентября 2016</figcaption>
                            </figure>
                            <h3>Как правильно заливать бетон для фундамента</h3>
                            <p>
                                Перед началом заливки монолитного основания следует рассчитать время работ. При значительных объемах 
                            </p>
                            <hr class="dev-line-correct">
                            <div class="uk-clearfix panel_bottom">
                                <div class="uk-float-right"><i class="uk-icon-eye uk-icon-small"></i><span>523</span></div>
                                <div class="uk-float-left"><a href="">Подробнее</a></div>
                            </div>
                        </div>
                    </div>                
                </div>
           </div>
        </div>
        <? include($home_dir."/includes/footer.php"); ?>
    </div>
    <? include($home_dir."/includes/pop-up.php"); ?>
</body>

</html>