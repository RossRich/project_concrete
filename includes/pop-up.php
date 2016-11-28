<div id="mob-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="mob_menu_logo">
            <a href="/" class="">
                <img src="/images/logo.png" alt="КраснодарСтройСервис">
            </a>
        </div>
        <nav class="nav_mob_menu">
            <ul class="uk-nav uk-nav-parent-icon list" data-uk-nav>
                <? foreach($main_categorys as $main_category){ ?>
                    <li ><a href="/catalog/<?=$main_category["name_slug"]?>"><?=$main_category["name"]?></a></li>
                    <? } 
                ?>
                <li class="uk-parent">
                    <a href="#">О компании</a>
                    <ul class="uk-nav-sub list mob_sub_menu">
                        <li><a href="/o-kompanii">О нас</a></li>
                        <li><a href="/nashi-objekty">Наши объекты</a></li>
                        <li><a href="/otzyvy-klientov">Отзывы клиентов</a></li>
                        <li><a href="/korporativnyj-blog">Корпоративный блог</a></li>
                        <li><a href="/sotrudnichestvo">Сотрудничество</a></li>
                    </ul>
                </li>    
                <li><a href="/kontakty">Контакты</a></li>
            </ul>
        </nav>
    </div>
</div>