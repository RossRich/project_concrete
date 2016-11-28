<!-- <div class="uk-container2 uk-container-center dev-container-order-correct">
    <h3 class="uk-text-center dev-order-head dev-h3-correct">ПОЛУЧИТЕ ГАРАНТИРОВАННУЮ СКИДКУ ПРИ ЗАКАЗЕ НА САЙТЕ</h3> -->
		<? if(isset($page_id) && $page_id=='index'){ ?>
    <? form('discount', ['id'=>'des_discount_form']);?>
      <? }else{ ?>
       <? form('discount_nasos', ['id'=>'des_discount_form']);?>
      <? } ?>
        <ul class="uk-grid uk-grid-width-medium-1-1 uk-grid-width-large-1-3 uk-grid-width-small-1-1 dev-order-li-correct uk-grid-large" data-uk-grid-margin>
            <li>
                <div class="uk-flex">
                    <i class="uk-icon-user uk-icon-large dev-img-ico-correct"></i>
                    <div class="input-item">
                        <label for="name" class="dev-order-label">Ваше Имя</label>
                        <input type="text" name="form[name]" class="dev-order-input">
                    </div>
                </div>
            </li>
            <li>
                <div class="uk-flex">
                    <i class="uk-icon-phone uk-icon-large dev-img-ico-correct"></i>
                    <div class="input-item">
                        <label for="tel" class="dev-order-label">Ваш Телефон</label>
                        <input type="text" data-phone-mask name="form[tel]" class="dev-order-input">
                    </div>
                </div>
            </li>
            <li>
                <input type="submit" class="dev-but-submit-correct" value="получить скидку">
            </li>
        </ul>
    </form>
<!-- </div> -->
