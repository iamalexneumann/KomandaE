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
<div class="coaches-list">
    <?php
    foreach ($arResult['ITEMS'] as $arItem_key => $arItem):
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_EDIT'));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem['IBLOCK_ID'], 'ELEMENT_DELETE'),
            [
                'CONFIRM' => Loc::getMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'),
            ]
        );
    ?>
    <article class="coaches-list__item coach-item" id="<?= $this->GetEditAreaId($arItem['ID']) ;?>">
        <a href="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>"
           class="coach-item__img-link"
           data-fancybox="coaches-list"
           data-caption="<?= $arItem['NAME']; ?>">
            <img src="<?= $arItem['PICTURE_LQIP']['SRC']; ?>"
                 data-src="<?= $arItem['PICTURE']['SRC']; ?>"
                 class="coach-item__img lazyload blur-up"
                 alt="<?= $arItem['NAME']; ?>"
                 width="<?= $arItem['PICTURE']['WIDTH']; ?>"
                 height="<?= $arItem['PICTURE']['HEIGHT']; ?>">
        </a>
        <div class="coach-item__wrapper">
            <h<?=$param_small_card_tag_title; ?> class="coach-item__title">
                <?= $arItem['NAME']; ?>
            </h<?=$param_small_card_tag_title; ?>>
            <?php if ($arItem['EXPERIENCE']): ?>
            <div class="coach-item__experience">
                <?= Loc::getMessage('COACHES_LIST_EXPERIENCE_TITLE'); ?>: <?= $arItem['EXPERIENCE']; ?>
            </div>
            <?php endif; ?>
            <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_SERVICES']['LINK_ELEMENT_VALUE']): ?>
            <div class="coach-item__services-list">
                <?= Loc::getMessage('COACHES_LIST_SERVICES_TITLE'); ?>:
                <?php foreach ($arItem['DISPLAY_PROPERTIES']['ATT_SERVICES']['LINK_ELEMENT_VALUE'] as $service_key => $service): ?>
                <a href="<?= $service['DETAIL_PAGE_URL']; ?>" class="coach-item__services-link"><?= $service['NAME']; ?></a><?php if ($service_key < count($arItem['DISPLAY_PROPERTIES']['ATT_SERVICES']['LINK_ELEMENT_VALUE'])) echo ', '; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVEMENTS']['~VALUE']): ?>
            <div class="coach-item__achievements">
                <?php
                if ($arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVEMENTS']['~VALUE']) {
                    $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_ACHIEVEMENTS']['~VALUE'],
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
                } ?>
            </div>
            <?php endif; ?>
            <?php if ($arItem['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']): ?>
            <div class="coach-item__detail-text">
                <?php
                if ($arItem['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE']) {
                    $APPLICATION->IncludeComponent(
                        "sprint.editor:blocks",
                        ".default",
                        Array(
                            "JSON" => $arItem['DISPLAY_PROPERTIES']['ATT_DETAIL_TEXT']['~VALUE'],
                        ),
                        $component,
                        Array(
                            "HIDE_ICONS" => "Y"
                        )
                    );
                } ?>
            </div>
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