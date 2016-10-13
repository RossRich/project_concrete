<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/uikit.css">
    <link rel="stylesheet" href="css/modal.css">
    <script src="jquery/jquery-3.1.0.min.js"></script>
    <script src="js/uikit.js"></script>
    <title>Document</title>
</head>

<body>
    <button class="uk-button" data-uk-modal="{target:'#id', center:true}">Модальное окно "Ваша заявка отправлена"</button>
    <div class="des-modal-dialog">
        <div id="id" class="uk-modal">
            <div class="des-modal-container">
                <div class="uk-modal-dialog  uk-clearfix">
                    <i class="uk-icon-close uk-modal-close"></i>
                    <div class="uk-thumbnail-expand">
                        <img src="images/modal_claud.png" alt="">
                    </div>
                    <h3>Ваша заявка отправлена!</h3>
                    <p>В ближайшее время с Вами свяжится наш менеджер для уточнение информации если у вас возникли вопросы звоните 8 (918) 44-99-703</p>
                    <a class="uk-modal-close">Закрыть</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>