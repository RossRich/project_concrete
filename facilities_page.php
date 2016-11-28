<?
$home_dir = $_SERVER["DOCUMENT_ROOT"];
require_once($home_dir."/admin/bootstrap.php");
require_once($home_dir."/includes/regions.php");
$page_title = "Наши объекты";
$page_suffix = " | КРАСНОДАРСТРОЙСЕРВИС";

//$partnership = collection("Сотрудничество")->find()->toArray();

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <? require($home_dir."/includes/top-scripts.php"); ?>
</head>

<body>
<div class="wrapper">
    <? require($home_dir."/includes/header.php"); ?>
    <div class="contacts_full">
        <div class="uk-container2 uk-container-center contacts partnership facilities_page">
            <h3 class="uk-text-center ps_h3">Наши объекты</h3>
            <div class="uk-panel uk-panel-box con_panel agree_text">
                <p>
                    Мы поставляем материалы для строительства объектов различного назначения по Краснодару и Краснодарскому краю.
                </p>
                <p>
                    Среди наших клиентов: <br>
                    крупные строительные организации;<br>
                    объекты государственного строительства;<br>
                    частные застройщики (строительство домов, коттеджей).
                </p>
                <p>
                    Мы работаем с такими застройщиками как: 
                </p>
                <p>
                    <ul class="uk-grid uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2">
                        <li>
                            <ul class="list list_fac">
                                <li>ООО "Капитал Инвест Групп"     </li>
                                <li>ООО "Капитал-Строй"            </li>
                                <li>ООО МТУ "ЮКС"                  </li>
                                <li>ООО "Капитал-Инвест"           </li>
                                <li>ООО "Кубань Стройподряд"       </li>
                                <li>ООО "Регион Строй Проект"      </li>
                                <li>ООО "ЮСК"                      </li>
                                <li>ООО «Рассвет»                  </li>
                                <li>ООО «Капитал-Бетон»            </li>
                            </ul>
                        </li>
                        <li>
                            <ul class="list list_fac">
                                <li>ООО "Донской"                   </li>
                                <li>ООО "УниверсалПроектСтрой"       </li>
                                <li>ООО "Наша Тема"                 </li>
                                <li>ООО "СтройМеталлИнвест"         </li>
                                <li>ООО "Миал-Строй"                </li>
                                <li>ООО "Стройбизнес-Юг"            </li>
                                <li>ООО "Стройподряд-Юг"            </li>
                                <li>ООО «АлМакс-Строй»              </li>
                                <li>ООО «Любимый город»             </li>
                            </ul>
                        </li>
                    </ul>
                </p>

            </div>
            <? require($home_dir."/includes/facilities.php"); ?>
        </div>
    </div>
    <? require($home_dir."/includes/footer.php"); ?>
</div>
<? require($home_dir."/includes/pop-up.php"); ?>
</body>

</html>
