<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_footer_logo
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 * @var COption $siteparam_email
 * @var COption $siteparam_address
 * @var COption $siteparam_whatsapp_number
 * @var COption $siteparam_whatsapp_number_tel
 * @var COption $siteparam_whatsapp_message
 * @var COption $siteparam_telegram_link
 * @var COption $siteparam_scripts_body_after
 */
use Bitrix\Main\Localization\Loc;
?>
        </div>
    </main>
    <footer class="main-footer">
        <div class="footer-content">
            <div class="container">
                <div class="row">

                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                &#169; <?= htmlspecialchars($siteparam_logo_name); ?>, 2016-<?= date('Y'); ?> <?= Loc::getMessage('FOOTER_COPYRIGHT_YEARS_TEXT'); ?>. <?= Loc::getMessage('FOOTER_COPYRIGHT_RIGHTS_TEXT'); ?>.
                <div class="footer-copyright__links">
                    <a href="/privacy-policy/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_PRIVACY_LINK_TEXT'); ?></a>
                    <a href="/sitemap/" class="footer-copyright__link"><?= Loc::getMessage('FOOTER_COPYRIGHT_SITEMAP_LINK_TEXT'); ?></a>
                </div>
            </div>
        </div>
    </footer>

    <?= $siteparam_scripts_body_after; ?>
    </body>
</html>