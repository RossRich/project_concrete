<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "О компании";
$page_suffix = " | КраснодарСтройСервис";

$reviews = collection("Отзывы")->find(["active"=>true])->toArray();
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
        <div class="about_us_full">
            <div class="uk-container2 uk-container-center about_us">
                <h3 class="uk-text-center">О компании</h3>
                <ul class="uk-grid uk-grid-collapse  uk-grid-width-small-1-1 uk-grid-width-medium-1-1 uk-grid-width-large-1-2">
                    <li>
                        <div class="uk-panel uk-panel-box au_panel">
                           <h4>КраснодарСтройСервис</h4>
                            <p>КраснодарСтройСервис – лидер краснодарского рынка по производству бетона и строительных материалов. Наша кампания осуществляет производство, реализацию и доставку высококачественных бетонных, известняковых и песчано-цементных смесей, фундаментных блоков (ФБС), инертных материалов (все виды гравия, щебеня, песка и керамзита), газобетона, шлакоблоков, кирпича и др. по всему Краснодарскому краю.</p>
                            <p>Многочисленный автопарк спец. техники, позволяет осуществлять выполнение заказов в кратчайшие сроки, в нем вы можете взять в аренду миксера, бетононасос (заливка конструкций любой сложности), также можем поставить на объект строительства башенный кран, роторный насос. Сотрудники компании имеют большой опыт работы в различных областях строительства, который помогает успешно реализовывать проекты наших заказчиков. </p>
                            <p>Выдаем сертификаты и всю необходимую лицензированную документацию, принимаем все виды оплат.</p>
                            
                        </div>
                    </li>
                    <li>
                        <div class="uk-panel uk-panel-box au_img">
                            <img src="/images/factory.png" alt="О компании">
                        </div>
                    </li>
                </ul>    
            </div>
        </div>
        <? require($home_dir."/includes/advantages_trust.php"); ?>
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
        <? require($home_dir."/includes/consumer_about_us.php"); ?>
        <? require($home_dir."/includes/our_partners.php"); ?>
        <? require($home_dir."/includes/footer.php"); ?>
    </div>
    <? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
