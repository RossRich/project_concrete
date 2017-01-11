<?$our_partner=collection("Наши партнеры")->find(["visibility"=>true])->toArray();
?>

<div class="dev-contauner-our-partner dev-container-material uk-container-center">
    <div class="uk-container-center dev-contauner-our-partner-correct dev-container-correct">
        <h3 class="dev-h3-correct">НАШИ ПАРТНЕРЫ</h3>
        <div class="uk-slidenav-position" data-uk-slider="center:false, infinite:false">
            <div class="uk-slider-container">
                <ul class="uk-slider uk-grid uk-grid-width-large-1-5 uk-grid-width-medium-1-4 uk-grid-width-small-1-3" data-uk-grid-match="target:'.des-img-container'">
                <? foreach ($our_partner as $key) {?>
                    <? $img_path=$key["logotip"][0]["path"]; ?>
                    <li>
                        <div class="w-block" style="background-color: #fff">
                            <div class="des-img-container">
                                <img src="<?=thumbnail_url($img_path, 500, 300 , ["mode"=>"best_fit"]);?>" width="152" height="74" alt="<?=$key["partner"] ?>">
                            </div>
                        </div>
                    </li>
                   <? } ?>
                </ul>
            </div>
            <img class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slider-item="next" src="/images/for_slider_nav_right.png">
            <img class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous dev-partner-slider-index-height-correct dev-partner-ico-img-correct" data-uk-slider-item="previous" src="/images/for_slider_nav_left.png">
        </div>
    </div>
</div>
