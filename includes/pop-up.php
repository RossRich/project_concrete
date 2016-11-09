<div id="mob-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <div class="mob_menu_logo">
            <a href="/index.php" class="">
                <img src="/images/logo.png" alt="КраснодарСтройСервис">
            </a>
        </div>
        <nav class="nav_mob_menu">
            <ul class="uk-nav uk-nav-parent-icon list" data-uk-nav>
                <? foreach($main_categorys as $main_category){ ?>
                    <li ><a href="catalog.php?category=<?=$main_category["_id"]?>"><?=$main_category["name"]?></a></li>
                    <? } 
                ?>
                <li class="uk-parent">
                    <a href="#">О компании</a>
                    <ul class="uk-nav-sub list mob_sub_menu">
                        <li><a href="/about_us.php">О нас</a></li>
                        <li><a href="/facilities_page.php">Наши объекты</a></li>
                        <li><a href="/comments.php">Отзывы клиентов</a></li>
                        <li><a href="/blog_all.php">Корпоративный блог</a></li>
                        <li><a href="/partnership.php">Сотрудничество</a></li>
                    </ul>
                </li>    
                <li><a href="/contacts.php">Контакты</a></li>    
            </ul>
        </nav>
    </div>
</div>