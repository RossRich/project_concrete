<footer class="uk-container-center dev-contauner-footer">
    <div class="uk-container-center dev-footer-correcr">
        <div class="uk-container-center dev-footer-content uk-container2">
            <div class="uk-grid">
                <div class="uk-width-1-2 dev-footer-container-correct">
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <div class="uk-flex uk-flex-column">
                                <a href="">О компании</a>
                                <a href="">Наши объекты</a>
                                <a href="">Отзывы клиентов</a>
                                <a href="">Корпоративный блог</a>
                                <a href="">Сотрудничество</a>
                                <a href="">Контакты</a>
                                <div class="uk-flex">
                                    <a href="<?=$social["vk"]?>" target="_blank"><img src="images/vk-social-logotype.png" alt=""></a>
                                    <a href="<?=$social["ok"]?>" target="_blank"><img src="images/odnoklassniki-logo.png" alt=""></a>
                                    <a href="<?=$social["fb"]?>" target="_blank"><img src="images/facebook-logo.png" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-2">
                            <div class="uk-flex uk-flex-column">
                                <? foreach($main_categorys as $main_category){ ?>
                                <a href="catalog.php?category=<?=$main_category["_id"]?>"><?=$main_category["name"]?></a>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                    <p><?=date("Y")?>&nbsp;&copy;&nbsp;КраснодарСтройСервис. Все права защищены.</p>
                    <p>
                        <a href="http://it-technologies.us/" target="_blank"><img src="images/IT.png" alt=""></a>Разработка и Маркетинг</p>
                </div>
                <div class="uk-width-1-2 des-footer-correct">
                    <div class="uk-grid">
                        <div class="uk-width-1-2 dev-footer-container-correct">
                            <div class="uk-flex uk-flex-column">
                                <span>Остались вопросы?</span>
                                <form action="handler.php">
                                    <div class="uk-flex">
                                        <img class="dev-footer-img-correct" src="images/ic_person_outline_black_48dp.png" alt="">
                                        <div class="input-footer">
                                            <label for="name" class="dev-footer-label">Ваше Имя</label>
                                            <input type="text" name="name" class="dev-footer-input">
                                        </div>
                                    </div>
                                    <div class="uk-flex">
                                        <img class="dev-footer-img-correct" src="images/ic_mail_outline_black_48dp.png" alt="">
                                        <div class="input-footer">
                                            <label for="adr" class="dev-footer-label">Email или Телефон</label>
                                            <input type="tel" name="adr" class="dev-footer-input">
                                        </div>
                                    </div>
                                    <div class="uk-flex dev-footer-textarea-correct uk-clearfix">
                                        <img class="dev-footer-img-correct des-footer-img-crutch" src="images/ic_create_black_48dp.png" alt="">
                                        <label class="dev-footer-label-correct" for="text">Ваше сообщение</label>
                                        <textarea class="dev-footer-textarea" rows="3" cols="25" name="text"></textarea>
                                    </div>
                                    <input type="submit" class="dev-but-footer uk-clearfix" value="отправить">
                                </form>
                            </div>
                        </div>
                        <div class="uk-width-1-2 ">
                            <div class="uk-flex uk-flex-column">
                                <span>Главный офис</span>
                                <a href="">
                                    <img src="images/ic_place.png" alt="">
                                    <span><?=$address?></span>
                                </a>
                                <span>Отдел продаж:</span>
                                <a href="">
                                    <img src="images/ic_local_phone_black_18dp.png" alt="">
                                    <span><?=$phone2?></span>
                                </a>
                                <span>Бухгалтерия:</span>
                                <a href="">
                                    <img src="images/ic_local_phone_black_18dp.png" alt="">
                                    <span><?=$phone3?></span>
                                </a>
                                <span>Производство:</span>
                                <a href="">
                                    <img src="images/ic_place.png" alt="">
                                    <span><?=$address2?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>