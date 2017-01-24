        <footer class="uk-container-center dev-contauner-footer">
            <div class="uk-container-center dev-footer-correcr">
                <div class="uk-container-center dev-footer-content uk-container2">
                    <div class="uk-grid uk-container-center uk-grid-collapse">
                        <div class="uk-width-large-4-10 uk-hidden-medium uk-hidden-small uk-width-small-1-1">
                            <div class="dev-footer-container-correct">
                                <div class="uk-grid">
                                    <div class="uk-width-5-10">
                                        <div class="uk-flex uk-flex-column">
                                            <a href="/about_us.php">О компании</a>
                                            <a href="/facilities_page.php">Наши объекты</a>
                                            <a href="/comments.php">Отзывы клиентов</a>
                                            <a href="/blog_all.php">Корпоративный блог</a>
                                            <a href="/partnership.php">Сотрудничество</a>
                                            <a href="/contacts.php">Контакты</a>
                                        </div>
                                    </div>
                                    <div class="uk-width-5-10">
                                        <div class="uk-flex uk-flex-column">
                                           <? foreach($main_categorys as $category){ ?>
                                            <a href="/catalog.php?category=<?=$category['_id']?>"><?=$category['name']?></a>
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                                    <? require_once($home_dir.'/includes/footer_social.php'); ?>
                            </div>
                        </div>
                        <div class="uk-width-large-6-10 uk-width-medium-1-1 uk-width-small-1-1">
                            <div class="des-footer-correct">
                                <div class="uk-grid uk-grid-collapse">
                                    <div class="uk-width-1-2 uk-hidden-small">
                                        <div class="dev-footer-container-correct">
                                            <span>Остались вопросы?</span>
                                            <? form('questionsConsumer',['id'=>'des_footer_form']); ?>
                                                <ul>
                                                    <li><i class="uk-icon-user uk-icon-medium"></i>
                                                        <div class="input-footer">
                                                            <label for="name" class="dev-footer-label">Ваше Имя</label>
                                                            <input type="text" name="form[name]" class="dev-footer-input">
                                                        </div>
                                                    </li>
                                                    <li><i class="uk-icon-envelope uk-icon-medium"></i>
                                                        <div class="input-footer">
                                                            <label for="form[mail]" class="dev-footer-label">Email</label>
                                                            <input type="email" name="form[mail]" class="dev-footer-input">
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <i class="uk-icon-pencil uk-icon-medium des-footer-img-crutch"></i>
                                                        <div class="dev-footer-textarea-correct">
                                                            <label class="dev-footer-label-correct" for="text">Ваше сообщение</label>
                                                            <textarea class="dev-footer-textarea" rows="4" cols="24" name="form[text]"></textarea>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <input type="submit" class="dev-but-footer" value="отправить">
                                            </form>
                                            <div class="uk-visible-medium">
                                                    <? require($home_dir.'/includes/footer_social.php'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-width-large-1-2 uk-width-medium-1-2  uk-width-small-1-1">
                                      <div class="dev-footer-container-correct">
                                        <span class="des-mob-style">Главный офис:</span>
                                        <ul>
                                            <li><i class="uk-icon-map-marker uk-icon-small "></i><a href="https://www.google.com/maps/d/viewer?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" type="map" target="_blank"><?=$address;?></a></li>
                                            <li><i class="uk-icon-phone uk-icon-small "></i><a href="tel:<?=$phone2;?>" type="tel" onclick="yaCounter41038489.reachGoal('clickOnPhone'); return true;"><span><?=$phone2;?></span> - Отдел продаж</a></li>
                                            <li><i class="uk-icon-phone uk-icon-small "></i><a href="tel:<?=$phoneMobile;?>" type="tel" onclick="yaCounter41038489.reachGoal('clickOnPhone'); return true;"><span><?=$phoneMobile;?></span> - Отдел продаж</a></li>
                                            <li><i class="uk-icon-phone uk-icon-small "></i><a href="tel:<?=$phone3;?>" type="tel" onclick="yaCounter41038489.reachGoal('clickOnPhone'); return true;"><span><?=$phone3;?></span> - Бухгалтерия</a></li>
                                        </ul>
                                        <span class="des-mob-style">Производство:</span>
                                        <ul>
                                            <li><i class="uk-icon-justify uk-icon-map-marker uk-icon-small "></i><a href="https://www.google.com/maps/d/viewer?mid=1fF7W5wh8kvybdq6pNXFrI7_CAnU" target="_blank"><?=$address2;?></a></li>
                                        </ul>
                                        <div class="uk-visible-small ">
                                                <? require($home_dir.'/includes/footer_social.php'); ?>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
            <? require($home_dir."/includes/modal_window_send.php"); ?>
