<div class="dev-consumer-about-us" data-uk-parallax="{bgp: '100'}">
            <div class="uk-container2 uk-container-center dev-container-correct">
                <h3 class="dev-consumer-about-us-head-correct dev-h3-correct">КЛИЕНТЫ О НАС</h3>
                <div class="uk-slidenav-position slider_consumer" data-uk-slider="center:false">
                    <div class="dev-consumer-slader-navigation uk-clearfix uk-hidden-small">
                        <img class="dev-consumer-icon " src="/images/ic_keyboard_arrow_right18dp.png" data-uk-slider-item="previous">
                        <img class="dev-consumer-icon" src="/images/ic_keyboard_arrow_left_18dp.png" data-uk-slider-item="next">
                    </div>
                    <div class="uk-slider-container dev-consumer-about-us-slider-correct">
                        <ul class="uk-slider uk-grid uk-grid-width-large-1-3 uk-grid-width-medium-1-2 uk-grid-width-small-1-2">
                            <? foreach($reviews as $review){ ?>
                            <li>
                                <div class="uk-panel uk-panel-box dev-panel-correct dev-consumer-about-us-panel-correct">
                                    <h3 class="dev-material-panel-head-correct dev-consumer-about-us-panel-head-correct"><?=$review["title"]?></h3>
                                    <p class="dev-consumer-about-us-panel-description-correct ">
                                        <?=$review["text"]?>
                                    </p>
                                    <p class="dev-consumer-about-us-panel-authot">
                                        <?=$review["name"]?>
                                        <br>
                                        <span><?=$review["job"]?></span>
                                    </p>
                                    <div class="dev-consumer-about-us-panel-img-correct">
                                        <? if(isset($review["photo"]) && !empty($review["photo"])){ ?>
                                        <img src="/<?=substr($review["photo"][0]["path"], 5)?>" class="dev-material-panel-img-correct" alt="<?=$review["name"]?>">
                                        <? } else {?>
                                        <i class="uk-icon-user-secret uk-icon-large"></i>      
                                        <? } ?>
                                    </div>
                                </div>
                            </li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>