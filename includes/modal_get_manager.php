        <div id="id" class="uk-modal">
            <div class="des-modal-container">
                <div class="uk-modal-dialog  uk-clearfix">
                    <i class="uk-icon-close uk-modal-close"></i>
                    <div class="uk-thumbnail-expand">
                        <img src="images/modal_get_manager.png" alt="">
                    </div>
                    <h3>Вызов менеджера</h3>
                    <div class="des-input-manager">
                        <? form('call_manger');?>
                            <ul>
                                <li>
                                    <i class="uk-icon-user uk-icon-medium"></i>
                                    <div class="input-item-form">
                                        <label for="name" class="dev-get-manager-label">Ваше Имя</label>
                                        <input type="text" name="form[name]" class="dev-get-manager-input" required>
                                    </div>
                                </li>
                                <li>
                                    <i class="uk-icon-phone uk-icon-medium"></i>
                                    <div class="input-item-form">
                                        <label for="tel" class="dev-get-manager-label">Ваш Телефон</label>
                                        <input type="tel" name="form[tel]" class="dev-get-manager-input" required>
                                    </div>
                                </li>
                                <li>
                                    <button type="submit">Отправить</button>
                                    <a class="uk-modal-close">Закрыть</a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
