<!DOCTYPE html>
<html lang="ru">

<head>
    <? include($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
    <button class="uk-button" data-uk-modal="{target:'#id', center:true}">Модальное окно "Вызов менеджера "</button>
    <div class="des-modal-dialog">
        <div id="id" class="uk-modal">
            <div class="des-modal-container">
                <div class="uk-modal-dialog  uk-clearfix">
                    <i class="uk-icon-close uk-modal-close"></i>
                    <div class="uk-thumbnail-expand">
                        <img src="/images/modal_get_manager.png" alt="">
                    </div>
                    <h3>Вызов менеджера</h3>
                    <div class="des-input-manager">
                        <form action="">
                            <ul>
                                <li>
                                    <i class="uk-icon-user uk-icon-medium"></i>
                                    <div class="input-item">
                                        <label for="name" class="dev-get-manager-label">Ваше Имя</label>
                                        <input type="text" name="name" class="dev-get-manager-input">
                                    </div>
                                </li>
                                <li>
                                    <i class="uk-icon-phone uk-icon-medium dev-img-ico-correct"></i>
                                    <div class="input-item">
                                        <label for="tel" class="dev-get-manager-label">Ваш Телефон</label>
                                        <input type="tel" name="tel" class="dev-get-manager-input">
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
    </div>
</body>

</html>