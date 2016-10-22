<?
$docs = collection("Документы")->find()->toArray();
?>
<div class="documents_full">
    <div class="uk-container2 uk-container-center documents">
        <ul class="uk-grid uk-grid-collapse .uk-grid-width-small-1-1 uk-grid-width-medium-1-2 uk-grid-width-large-1-2  main_ul">
            <li class="li_doc_div li_doc_div1">
                <div class="doc_div_1">
                    <h5>ПРЕДОСТАВЛЯЕМ ПОЛНЫЙ ПАКЕТ ДОКУМЕНТОВ</h5>
                    <ul class="uk-grid " data-uk-grid-match="target:'.doc_name'" >
                        <? foreach($docs as $doc){ ?>
                        <li class="uk-width-<?=$doc["uk_width_1"]?>-<?=$doc["uk_width_2"]?> uk-clearfix doc_li">
                            <a href="<?=substr($doc["doc"][0]["path"], 5)?>" class="doc_name">
                                <img src="/images/ic_description.png">
                                <span><?=$doc["name"]?></span>
                            </a>
                        </li>
                        <? } ?>
                    </ul>
                    <a href="">
                        <button>Скачать образцы</button>
                    </a>
                    <h5>ПРИНИМАЕМ ВСЕ ВИДЫ ОПЛАТЫ</h5>
                    <ul class="uk-grid">
                        <li class="uk-width-1-2">
                            <img src="/images/ic_monetization.png" alt="">
                            <span>Наличный расчет</span>
                        </li>
                        <li class="uk-width-1-2">
                            <img src="/images/ic_subject.png" alt="">
                            <span>Безналичный расчет</span>
                        </li>
                        <li class="uk-width-1-2">
                            <img src="/images/ic_credit_card.png" alt="">
                            <span>Банковской картой</span>
                        </li>
                        <li class="uk-width-1-2">
                            <img src="/images/ic_subject.png" alt="">
                            <span>Безналичный расчет с НДС</span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="li_doc_div li_doc_div2">
                <div class="doc_div_2">
                    <div class="sub_doc_div_2">
                        <h4>Отдел продаж</h4>
                        <a href="tel:<?=$phone2?>" class="phone_dep"><?=$phone2?></a>
                        <br>
                            <button data-uk-modal="{target:'#id', center:true}">Вызов менеджера</button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    </div>
