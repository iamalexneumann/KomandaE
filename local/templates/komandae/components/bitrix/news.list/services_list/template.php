<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * @var array $arParams
 * @var array $arResult
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @global CDatabase $DB
 * @var array $arLangMessages
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $templateFile
 * @var string $templateFolder
 * @var string $parentTemplateFolder
 * @var string $componentPath
 * @var array $templateData
 * @var CBitrixComponent $component
 */
$this->setFrameMode(true);
use Bitrix\Main\Localization\Loc;

$param_small_card_tag_title = $arParams['SMALL_CARD_TAG_TITLE'] ?? '2';
?>
<?php if (count($arResult['ITEMS']) > 0): ?>
<div class="services-list">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <article class="services-list__item services-item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
        <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="services-item__img-link">
            <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                 data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                 class="services-item__img lazyload blur-up"
                 alt="<?= $arItem['NAME']; ?>"
                 width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                 height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
        </a>
        <div class="services-item__wrapper">
            <h<?=$param_small_card_tag_title; ?> class="services-item__title">
                <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="services-item__title-link"><?= $arItem['NAME']; ?></a>
            </h<?=$param_small_card_tag_title; ?>>
            <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['~VALUE']): ?>
            <div class="services-item__preview-text">
                <?php
                $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_PREVIEW_TEXT']['~VALUE'],
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                ); ?>
            </div>
            <a href="<?= $arItem['DETAIL_PAGE_URL']; ?>" class="services-item__link" rel="nofollow"><?= Loc::getMessage('SERVICES_LIST_LINK_MORE'); ?></a>
            <?php endif; ?>
        </div>
    </article>
    <?php endforeach; ?>
</div>
<?php
if ($arParams['DISPLAY_BOTTOM_PAGER']) {
    echo $arResult['NAV_STRING'];
}
?>
<?php endif; ?>