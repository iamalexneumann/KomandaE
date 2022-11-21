<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="page-contacts">
    <div class="row page-contacts__row">
        <div class="col-xl-8 col-lg-7 page-contacts__col-map">
            <?php if ($siteparam_api_key_yandex_map): ?>
            <script src="https://api-maps.yandex.ru/2.1?apikey=<?= $siteparam_api_key_yandex_map; ?>&lang=<?= LANGUAGE_ID; ?>"></script>
            <script>
                ymaps.ready(function () {
                    const mainMap = new ymaps.Map("main-map", {
                        center: [<?= $siteparam_coors_yandex_map; ?>],
                        zoom: <?= $siteparam_zoom_yandex_map; ?>
                    });

                    mainPlacemark = new ymaps.Placemark([<?= $siteparam_coors_yandex_map; ?>], {
                        hintContent: "<?= htmlspecialchars($siteparam_logo_name); ?>",
                    }, {
                        iconLayout: 'default#image',
                        iconImageHref: '<?= SITE_TEMPLATE_PATH; ?>/img/pin.png',
                        iconImageSize: [72, 75],
                        iconImageOffset: [-36, -75],
                    });

                    mainMap.geoObjects.add(mainPlacemark);
                });
            </script>
            <div id="main-map" class="page-contacts__map"></div>
            <?php endif; ?>
        </div>
        <div class="col-xl-4 col-lg-5 page-contacts__col-contacts">
            <?php if ($siteparam_address): ?>
            <div class="page-contacts__item page-contacts__item_address">
                <?= $siteparam_address; ?>
            </div>
            <?php endif; ?>
            <a class="page-contacts__phone-link" href="tel:<?= $siteparam_main_phone_tel; ?>"
               title="Позвонить"><?= $siteparam_main_phone; ?></a>
            <div class="page-contacts__item page-contacts__item_email">
                <i class="page-contacts__icon fa-regular fa-envelope"></i>
                <a href="mailto:<?= $siteparam_email; ?>" title="Написать E-mail"><?= $siteparam_email; ?></a>
            </div>
            <button type="button"
                    class="btn btn-warning page-contacts__callback-btn"
                    data-bs-toggle="modal"
                    data-bs-target="#callbackModal"
                    data-bs-source="Кнопка на странице Контакты">Заказать звонок</button>
            <?php if ($siteparam_whatsapp_number || $siteparam_telegram_link): ?>
            <ul class="messengers page-contacts__messengers">
                <?php if ($siteparam_whatsapp_number): ?>
                <li class="messengers__item">
                    <a href="https://wa.me/<?php echo $siteparam_whatsapp_number_tel; echo $siteparam_whatsapp_message ?: '' ?>"
                       class="messengers__link"
                       target="_blank"
                       title="Написать в WhatsApp"><i class="messengers__icon fa-brands fa-whatsapp"></i></a>
                </li>
                <?php endif; ?>
                <?php if ($siteparam_telegram_link): ?>
                <li class="messengers__item">
                    <a href="<?= $siteparam_telegram_link; ?>"
                       class="messengers__link"
                       target="_blank"
                       title="Написать в Telegram"><i class="messengers__icon fa-brands fa-telegram"></i></a>
                </li>
                <?php endif; ?>
            </ul>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>