<!-- <!DOCTYPE html>
<html lang="ru">
<body>
    <button class="uk-button" data-uk-modal="{target:'#des-id-modal-apply', center:true}">Модальное окно "Ваша заявка отправлена"</button> -->
    <div class="des-modal-dialog">
        <div id="des-id-modal-apply" class="uk-modal">
            <div class="des-modal-send-container">
                <div class="uk-modal-dialog  uk-clearfix">
                    <i class="uk-icon-close uk-modal-close"></i>
                    <div class="uk-thumbnail-expand">
                        <img src="/images/modal_claud.png" alt="">
                    </div>
                    <h3>Ваша заявка отправлена!</h3>
                    <p>В ближайшее время с Вами свяжется наш менеджер для уточнения информации. Если у вас возникли вопросы, звоните <a href="tel:<?=$phoneCity?>" type="tel" onclick="yaCounter41038489.reachGoal('clickOnPhone'); return true;">&nbsp;&nbsp;<?=$phoneCity?></a>
                    <br>
                    <a href="tel:<?=$phoneMobile?>" type="tel" onclick="yaCounter41038489.reachGoal('clickOnPhone'); return true;"><?=$phoneMobile?></a></p>
                    <a class="uk-modal-close">Закрыть</a>
                </div>
            </div>
        </div>
    </div>
<!-- </body>

</html>
</body>

</html> -->
