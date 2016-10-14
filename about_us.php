<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "О компании";
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
        <div class="about_us_full">
            <div class="uk-container2 uk-container-center about_us">
                <h3 class="uk-text-center">О компании</h3>
                <ul class="uk-grid uk-grid-collapse  uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2">
                    <li>
                        <div class="uk-panel uk-panel-box au_panel">
                           <h4>КраснодарСтройСервис</h4>
                            <p>Поставщик строительных материалов. Мы осуществляем продажу, доставку бетона и сетройматериалов в Краснодаре и пригороде для производства монолитных работ, в том числе арматуры и бетона для фундаментов.</p>
                            <p>Кроме основных материалов, мы производим и доставляем блоки фундаментные (ФБС), растворы известковые, растворы цементные и оказываем сопутствующие услуги: выполняем подачу бетона бетононасосом и вывозим строительный мусор.</p>
                            <p>Наши сотрудники имеют опыт работы в различных областях строительства, который помогает им успешно реализовывать проекты наших заказчиков в рамках профиля компании.</p>
                            
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box">
                            <img src="/images/factory.png" alt="О компании">
                        </div>
                    </li>
                </ul>    
            </div>
        </div>
        <div class="advantages_full">
            <div class="uk-container2 uk-container-center advantages">
                <h3 class="uk-text-center">Доверие, заслуженное качеством и технологиями</h3>
                <ul class="uk-grid uk-grid-collapse uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2">
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/ad1.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>СОВРЕМЕННОЕ ОБОРУДОВАНИЕ</h4>
                                <p>Глубокий цикл отчистки компонентов бетона</p>
                                <p>Точная система весового контроля загрузки миксеров</p>
                                <p>Полное соответствие производства продукта по ГОСТу</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/ad2.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>СОБСТВЕННЫЙ ПАРК СПЕЦТЕХНИКИ</h4>
                                <p>GPS контроль доставки в каждой машине</p>
                                <p>Квалифицированные водители с допусками</p>
                                <p>Собственный парк спецтехники: более 15 единиц</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/ad3.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>СОБСТВЕННАЯ ЛАБОРАТОРИЯ ЗАВОДА</h4>
                                <p>Предоставление полной технической документации</p>
                                <p>Проверка лабораторного образца на прочность</p>
                                <p>100% юридическая ответственность за продукт</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box uk-clearfix ad_panel">
                            <div class="ad_logo">
                                <img src="/images/ad4.png" alt="">
                            </div>
                            <div class="ad_text">
                                <h4>ГАРАНТИЯ НИЗКОЙ ЦЕНЫ</h4>
                                <p>У нас всегда дешевле на 10%</p>
                                <p>Быстрая доставка без простоя на объекте</p>
                                <p>Гарантированное качество, за которое мы отвечаем</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="uslugi_full_au">
            <div class="uslugi_parallax_au"  data-uk-parallax="{ scale: '2'}"></div>
            <div class="uk-container2 uk-container-center dev-container-correct uslugi_au">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct uslugi_h3_au">КраснодарСтройСервис</h3>
                <ul class="uk-grid uk-grid-collapse uk-container-center uk-grid-width-small-1-1 uk-grid-width-medium-1-3 uk-grid-width-large-1-3">
                    <li>     
                        <div class="us_block_au us_block_au1 ">  
                            <img src="/images/ic_navigate_right.png" alt="" >
                            <div class="us_textblock_au us_text1">
                                <h4><a href="">БЕТОН И РАСТВОР</a></h4>
                                <p>продажа качественного бетона, продажа качественного бетона, раствора</p>
                            </div>
                        </div>
                        <div class="us_block_au us_block_au1 ">  
                            <img src="/images/ic_navigate_right.png" alt="" >
                            <div class="us_textblock_au us_text1">
                                <h4><a href="">ИНЕРТНЫЕ МАТЕРИАЛЫ</a></h4>
                                <p>продажа щебня, песка, гальки и чего-то еще, продажа щебня, песка, гальки</p>
                            </div>
                        </div>
                        <div class="us_block_au us_block_au1 ">  
                            <img src="/images/ic_navigate_right.png" alt="" >
                            <div class="us_textblock_au us_text1">
                                <h4><a href="">АРЕНДА СПЕЦТЕХНИКИ</a></h4>
                                <p>Бетономашина, бетононасос, и еще бетономашина. Бетононасос, и еще</p>
                            </div>
                        </div>                      
                    </li>
                    <li>
                        <div class="us_block_au us_logo_au" >
                            <img src="/images/logo2.png" alt="КраснодарСтройСервис">
                        </div>
                    </li>
                    <li>
                        <div class="us_block_au us_block_au2">
                            <img src="/images/ic_navigate_left.png" alt="" >
                            <div class="us_textblock_au us_text2">
                                <h4><a href="">ФБС</a></h4>
                                <p>продажа кеачественного бетона, продажа качественного бетона</p>
                            </div>
                        </div>
                        <div class="us_block_au us_block_au2">
                            <img src="/images/ic_navigate_left.png" alt="" >
                            <div class="us_textblock_au us_text2">
                                <h4><a href="">СТРОИТЕЛЬНЫЕ МАТЕРИАЛЫ</a></h4>
                                <p>продажа щебень, песок, галька и что то еще, продажа щебень, песок, галька</p>
                            </div>
                        </div>
                        <div class="us_block_au us_block_au2">
                            <img src="/images/ic_navigate_left.png" alt="" >
                            <div class="us_textblock_au us_text2">
                                <h4><a href="">СТРОИТЕЛЬСТВО</a></h4>
                                <p>услуги по строительству и жилых объекстов, услуги по строительству</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="achievements_full">
            <div class="uk-container2 uk-container-center achievements">
               <h3 class="uk-text-center">Наши достижения</h3>
               <ul class="uk-grid uk-grid-collapse  uk-grid-width-small-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4">
                   <li>
                       <div class="uk-panel uk-panel-box uk-text-center ach_panel">
                           <span>350</span>
                           <p>человек  делают бетон для Вас</p>
                       </div>
                   </li>
                   <li>
                       <div class="uk-panel uk-panel-box uk-text-center ach_panel">
                           <span>15</span>
                           <p>лет безупречной работы</p>
                       </div>
                   </li>
                   <li>
                       <div class="uk-panel uk-panel-box uk-text-center ach_panel">
                           <span>25 000</span>
                           <p>кубометров бетона каждый месяц</p>
                       </div>
                   </li>
                   <li>
                       <div class="uk-panel uk-panel-box uk-text-center ach_panel">
                           <span>50</span>
                           <p>единиц техники для вашего обслуживания</p>
                       </div>
                   </li>
               </ul>
                
            </div>
        </div>
        <div class="dev-consumer-about-us" data-uk-parallax="{bgp: '100'}">
            <div class="uk-container2 uk-container-center dev-container-correct">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct">КЛИЕНТЫ О НАС</h3>
                <div class="uk-slidenav-position slider_consumer" data-uk-slider="center:true">
                    <div class="dev-consumer-slader-navigation uk-clearfix">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                    </div>
                    <div class="uk-slider-container dev-consumer-about-us-slider-correct">
                        <ul class="uk-slider uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-1">
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct dev-material-panel-correct dev-consumer-about-us-panel-correct">
                                    <h3 class="dev-material-panel-head-correct dev-consumer-about-us-panel-head-correct">Благодарю компанию</h3>
                                    <p class="dev-consumer-about-us-panel-description-correct ">
                                        Капитал Бетон за качество продукта и сервис. Уже долгое время сотрудничаем и построили совместно более 5 объектов. Всем советую не пожалеете
                                    </p>
                                    <p class="dev-consumer-about-us-panel-authot">
                                        Антон Васильев
                                        <br>
                                        <span>Прораб КСК Строй</span>
                                    </p>
                                    <div class="dev-consumer-about-us-panel-img-correct">
                                        <img src="/images/CONSUMER.png" class="dev-material-panel-img-correct" alt="потребитель">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct dev-material-panel-correct dev-consumer-about-us-panel-correct">
                                    <h3 class="dev-material-panel-head-correct dev-consumer-about-us-panel-head-correct">Благодарю компанию</h3>
                                    <p class="dev-consumer-about-us-panel-description-correct ">
                                        Капитал Бетон за качество продукта и сервис. Уже долгое время сотрудничаем и построили совместно более 5 объектов. Всем советую не пожалеете
                                    </p>
                                    <p class="dev-consumer-about-us-panel-authot">
                                        Антон Васильев
                                        <br>
                                        <span>Прораб КСК Строй</span>
                                    </p>
                                    <div class="dev-consumer-about-us-panel-img-correct">
                                        <img src="/images/CONSUMER.png" class="dev-material-panel-img-correct" alt="потребитель">
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct dev-material-panel-correct dev-consumer-about-us-panel-correct">
                                    <h3 class="dev-material-panel-head-correct dev-consumer-about-us-panel-head-correct">Благодарю компанию</h3>
                                    <p class="dev-consumer-about-us-panel-description-correct ">
                                        Капитал Бетон за качество продукта и сервис. Уже долгое время сотрудничаем и построили совместно более 5 объектов. Всем советую не пожалеете
                                    </p>
                                    <p class="dev-consumer-about-us-panel-authot">
                                        Антон Васильев
                                        <br>
                                        <span>Прораб КСК Строй</span>
                                    </p>
                                    <div class="dev-consumer-about-us-panel-img-correct">
                                        <img src="/images/CONSUMER.png" class="dev-material-panel-img-correct" alt="потребитель">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="dev-contauner-our-partner dev-container-material uk-container-center">
            <div class="uk-container uk-container-center dev-contauner-our-partner-correct dev-container-correct">
                <h3 class="dev-h3-correct">НАШИ ПАРТНЕРЫ</h3>
                <div class="uk-slidenav-position" data-uk-slider="center:true">
                    <div class="uk-slider-container dev-our-partner-correct">
                        <ul class="uk-slider uk-grid-width-large-1-5 uk-grid-width-medium-1-3 uk-grid-width-small-1-2">
                            <li class="uk-active">
                                <div class="dev-our-partner-panel-img-correct img_neom">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgASC">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgISM">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgFAMILY">
                                </div>
                            </li>
                            <li>
                                <div class="dev-our-partner-panel-img-correct imgCM">
                                </div>
                            </li>
                        </ul>
                    </div>
                    <img class="uk-slidenav uk-slidenav-contrast uk-slidenav-next dev-partner-slider-index-right-correct dev-partner-slider-index-height-correct dev-partner-ico-img-correct" data-uk-slider-item="next" src="/images/for_slider_nav_right.png">
                    <img class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous dev-partner-slider-index-height-correct dev-partner-ico-img-correct" data-uk-slider-item="previous" src="/images/for_slider_nav_left.png">
                </div>
            </div>
        </div>
        <? include($home_dir."/includes/footer.php"); ?>
    </div>
    <? include($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
