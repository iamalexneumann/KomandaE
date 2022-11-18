<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var CMain $APPLICATION
 * @var CMain $CurDir
 * @var CSite $arSite
 * @var COption $siteparam_scripts_head
 * @var COption $siteparam_scripts_body_before
 * @var COption $siteparam_main_logo
 * @var COption $siteparam_logo_name
 * @var COption $siteparam_logo_description
 * @var COption $siteparam_main_phone
 * @var COption $siteparam_main_phone_tel
 */
use Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID; ?>">
<head>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <?php
    echo $siteparam_scripts_head;
    use Bitrix\Main\UI\Extension;
    use Bitrix\Main\Page\Asset;
    Extension::load(
        [
            'ui.bootstrap5',
            'ui.fonts.font-awesome',
            'ui.fonts.montserrat',
            'ui.lazysizes',
        ]
    );
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . '/main.js');
    $APPLICATION->ShowHead();
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/safari-pinned-tab.svg" color="#2a2b87">
    <link rel="shortcut icon" href="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/favicon.ico">
    <meta name="msapplication-TileColor" content="#2a2b87">
    <meta name="msapplication-config" content="<?= SITE_TEMPLATE_PATH; ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#2a2b87">
</head>
<body>
    <?= $siteparam_scripts_body_before; ?>
    <?php $APPLICATION->ShowPanel(); ?>
    <header class="main-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="logo logo_header"
                   title="<?= htmlspecialchars($siteparam_logo_name); ?>"
                    <?php if ($CurDir !== '/'): ?> href="/"<?php endif; ?>>
                    <img src="<?= $siteparam_main_logo; ?>" class="logo__img" width="75" height="75" alt="<?= htmlspecialchars($siteparam_logo_name); ?>">
                    <span class="logo__wrapper">
                        <span class="logo__name"><?= htmlspecialchars($siteparam_logo_name); ?></span>
                        <?php if ($siteparam_logo_description): ?>
                        <span class="logo__description"><?= htmlspecialchars($siteparam_logo_description); ?></span>
                        <?php endif; ?>
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" aria-expanded="false"
                        data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-label="<?= Loc::getMessage('HEADER_NAVBAR_ARIA_LABEL'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbar">
                    <div class="ms-auto">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "main_menu",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "main_submenu",
                                "COMPOSITE_FRAME_MODE" => "A",
                                "COMPOSITE_FRAME_TYPE" => "AUTO",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "2",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "main_menu",
                                "USE_EXT" => "Y",
                                "COMPONENT_TEMPLATE" => "main_menu"
                            ),
                            false
                        ); ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="main-area">
        <div class="container">
            <header class="page-header">
                <h1 class="page-header__title"><?php $APPLICATION->ShowTitle(false); ?></h1>
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb",
                    Array(
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => SITE_ID,
                    ),
                    false
                ); ?>
            </header>