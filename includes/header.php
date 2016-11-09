<?
$main_categorys = collection("Категории")->find()->sort(["sort"=>1])->toArray();
//print_r($main_categorys);
?>
<? if($page_id == "index"){ ?>
<div class="uk-cover uk-position-relative banner banner_index">
    <video class="uk-cover-object uk-position-absolute" width="" height="" autoplay="autoplay" loop="loop" muted="muted" poster="/images/video_background.jpg">
        <source src="/video/h2644.mp4" type="">
    </video>
     <div class="uk-position-cover banner_overlay">
         <div class="header_index">
             <div class="strip_top_menu">
                 <div class="uk-container uk-container-center uk-clearfix top_cont">
                <nav>
                    <ul class="ul_top_menu list">
                        <li><a href="/about_us.php">О компании</a></li>
                        <li><a href="/facilities_page.php">Наши объекты</a></li>
                        <li><a href="/comments.php">Отзывы клиентов</a></li>
                        <li><a href="/blog_all.php">Корпоративный блог</a></li>
                        <li><a href="/partnership.php">Сотрудничество</a></li>
                        <li><a href="/contacts.php">Контакты</a></li>
                    </ul>
                </nav>
                <a href="#mob-menu" class="mob-menu" data-uk-offcanvas><i class="uk-icon-navicon"></i> МЕНЮ</a>
                <div class="mob_connect">
                    <a href="tel:<?=$phone?>" class="phone_orders"><?=$phone?></a>
                </div>
                
                <div class="on_map">
                    <a href="https://www.google.com/maps/d/viewer?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" target="_blank"><img src="/images/ic_place.png" alt=""></a>
                    <span><span class="text"><?=$address?> (</span><a href="https://www.google.com/maps/d/viewer?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" target="_blank" class="atext">На карте</a><span class="text">)</span></span>
                </div>
            </div>
             </div>
             <div class="uk-container uk-container-center header_top">
            <div class="header_top_block">
                <div class="left">
                    <div class="logo">
                        <a href="/index.php"><img src="/images/logo.png" alt=""></a>
                    </div>
                    <div class="text_logo">
                        <p class="p1">
                            <span>КраснодарСтройСервис</span>
                        </p>
                        <br>
                        <p class="p2">Лидер Краснодарского рынка по производству
                            <br>бетона и стоительных материалов</p>
                    </div>
                </div>
                <div class="right">
                    <span class="free_numb">Отдел продаж</span>
                    <br>
                    <a href="tel:<?=$phone?>" class="phone"><?=$phone?></a>
                    <br>
                    <a href="!#" class="call" data-uk-modal="{target:'#id', center:true}">Вызов менеджера</a>
                </div>
            </div>
        </div>
             <div class="uk-sticky-placeholder main_menu_full main_menu_full_index" data-uk-sticky="{media: 1024, showup: true, animation: &#39;uk-animation-slide-top&#39, clsactive:'dev-active-sticky-placeholder'}" style="margin: 0px;">
                 <div class="uk-container uk-container-center uk-clearfix main_menu">
                <nav>
                    <ul class="ul_main_menu list">
                        <? foreach($main_categorys as $main_category){ ?>
                        <li><a href="catalog.php?category=<?=$main_category["_id"]?>"><?=$main_category["name"]?></a></li>
                        <? } ?>
                    </ul>
                </nav>
            </div>
             </div>
         </div>
         <div class="uk-container uk-container-center uk-text-center sliden">
            <div class="slogan">
                <h1>Срочная доставка бетона в Краснодаре</h1>
                <p>бетон, раствор, строительные материалы всегда дешевле и быстрее</p>
                <div class="slogan_block">
                    <span class="orders">Принимаем заказы:
                    <a href=""><img src="/images/Shape-1.png" alt=""></a>
                    <a href=""><img src="/images/Shape-2.png" alt=""></a>
                    <a href=""><img src="/images/Shape-3.png" alt=""></a>
                    </span>
                    <br>
                    <a href="tel:<?=$phone?>" class="phone_orders"><?=$phone?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<? } else { ?>
<div class="banner header">
    <div class="strip_top_menu">
        <div class="uk-container uk-container-center uk-clearfix top_cont">
            <nav>
                <ul class="ul_top_menu list">
                    <li><a href="/about_us.php">О компании</a></li>
                    <li><a href="/facilities_page.php">Наши объекты</a></li>
                    <li><a href="/comments.php">Отзывы клиентов</a></li>
                    <li><a href="/blog_all.php">Корпоративный блог</a></li>
                    <li><a href="/partnership.php">Сотрудничество</a></li>
                    <li><a href="/contacts.php">Контакты</a></li>
                </ul>
            </nav>
            <a href="#mob-menu" class="mob-menu" data-uk-offcanvas><i class="uk-icon-navicon"></i><span class="mspan"> МЕНЮ</span></a>
                <div class="mob_connect">
                    <a href="tel:<?=$phone?>" class="phone_orders"><?=$phone?></a>
                </div>
            <div class="on_map">
                <a href="https://www.google.com/maps/d/viewer?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" target="_blank"><img src="/images/ic_place.png" alt=""></a>
                <span><span class="text"><?=$address?> (</span><a href="https://www.google.com/maps/d/viewer?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" class="atext" target="_blank">На карте</a><span class="text">)</span></span>
            </div>
        </div>
    </div>
    <div class="uk-container uk-container-center header_top">
        <div class="header_top_block">
            <div class="left">
                <div class="logo">
                    <a href="/index.php"><img src="/images/logo.png" alt=""></a>
                </div>
                <div class="text_logo">
                    <p class="p1">
                        <span>К</span>раснодар
                        <span>С</span>трой
                        <span>С</span>ервис
                    </p>
                    <br>
                    <p class="p2">Лидер Краснодарского рынка по производству
                        <br>бетона и стоительных материалов</p>
                </div>
            </div>
            <div class="right">
                <span class="free_numb">Бесплатный номер</span>
                <br>
                <a href="tel:<?=$phone?>" class="phone"><?=$phone?></a>
                <br>
                <a href="#!" class="call" data-uk-modal="{target:'#id', center:true}">Вызов менеджера</a>
            </div>
        </div>
    </div>
    <div class="uk-sticky-placeholder main_menu_full main_menu_full_header " data-uk-sticky="{media: 1024, showup: true, animation: &#39;uk-animation-slide-top&#39;}" style="margin: 0px;">
        <div class="uk-container uk-container-center uk-clearfix main_menu">
            <nav>
                <ul class="ul_main_menu list">
                    <? foreach($main_categorys as $main_category){ ?>
                    <li><a href="catalog.php?category=<?=$main_category["_id"]?>"><?=$main_category["name"]?></a></li>
                    <? } ?>
                </ul>
            </nav>
        </div>
    </div>
</div>
<? } ?>
<? require($home_dir."/includes/modal_get_manager.php"); ?>