<?

$facilities = collection("Объекты")->find()->toArray();

?>

<div class="facilities_full_cs">
            <div class="uk-container2 uk-container-center facilities_cs">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct h3_cs">ОБЪЕКТЫ, ПОСТРОЕННЫЕ ИЗ НАШЕГО БЕТОНА</h3>
                <div class="uk-slidenav-position facilities_slidenav_cs" data-uk-slider="infinite:false">
                    <div class="dev-consumer-slader-navigation uk-clearfix slide_nav_fac">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="next">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="previous">
                    </div>
                    <div class="uk-slider-container">
                        <ul class="uk-slider uk-grid uk-grid-width-small-1-2 uk-grid-width-medium-1-2 uk-grid-width-large-1-3 facilities_ul_slider_cs">
                            <? foreach($facilities as $facility){ ?>
                            <li>
                                <div class="facilities_1-li_cs">
                                    <div class="uk-panel uk-panel-box dev-panel-correct facilities_panel_cs">
                                        <? if(isset($facility['photo'])&&!empty($facility['photo'])){?>
                                            <a href="/<?=substr($facility['photo'][0]['path'], 5)?>" data-uk-lightbox="{group:'my-group'}" title='<?=$facility["description"]?>'>
                                        <?}else{?>
                                            <a href="/images/f01.jpg" data-uk-lightbox="{group:'my-group'}" title='<?=$facility["description"]?>'>
                                        <?}?>


                                                <figure class="uk-overlay uk-overlay-hover">
                                                <? if(isset($facility['photo'])&&!empty($facility['photo'])){?>
                                                    <img class="uk-overlay-scale" src="<?=thumbnail_url($facility['photo'][0]['path'], 500, 560, ['mode'=>'crope']) ?>" alt="<?=$facility['name']?>">
                                                <?}else{?>
                                                    <img class="uk-overlay-scale" src="/images/f01p500.jpg" width="" height="" alt="<?=$facility["name"]?>">
                                                <?}?>
                                                <div class="uk-overlay-panel uk-overlay-icon facilities_overlay_icon"></div>
                                                <figcaption class="uk-overlay-panel uk-overlay-bottom uk-ignore facilities_panel_bottom"><p><?=$facility["name"]?></p>
                                                <span><?=$facility["city"]?></span>
                                                </figcaption>
                                                </figure>
                                            </a>
                                    </div>
                                </div>
                            </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
