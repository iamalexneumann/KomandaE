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
 * @var CBitrixComponentTemplate $this
 */
use Bitrix\Main\Localization\Loc;

if ($arResult['ITEMS']) {
    foreach ($arResult['ITEMS'] as $key => &$arItem) {
        $item_picture = $arItem['PREVIEW_PICTURE'];
        if ($item_picture) {
            $arItemPictureFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    'width' => 540,
                    'height' => 960,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            );

            $arItemPictureLqipFileTmp = \CFile::ResizeImageGet(
                $item_picture,
                [
                    'width' => 54,
                    'height' => 96,
                ],
                BX_RESIZE_IMAGE_PROPORTIONAL,
                true
            );

            if ($arItemPictureFileTmp['src']) {
                $arItemPictureFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureFileTmp['src'], true);
            }

            if ($arItemPictureLqipFileTmp['src']) {
                $arItemPictureLqipFileTmp['src'] = \CUtil::GetAdditionalFileURL($arItemPictureLqipFileTmp['src'], true);
            }

            $arItem['PICTURE'] = array_change_key_case($arItemPictureFileTmp, CASE_UPPER);
            $arItem['PICTURE_LQIP'] = array_change_key_case($arItemPictureLqipFileTmp, CASE_UPPER);
        }

        if ($arItem['DISPLAY_PROPERTIES']['ATT_EXPERIENCE']['VALUE']) {
            $arItem['EXPERIENCE'] = get_experience(
                $arItem['DISPLAY_PROPERTIES']['ATT_EXPERIENCE']['VALUE'],
                Loc::getMessage('COACHES_LIST_EXPERIENCE_DECLENSION_ONE'),
                Loc::getMessage('COACHES_LIST_EXPERIENCE_DECLENSION_FOUR'),
                Loc::getMessage('COACHES_LIST_EXPERIENCE_DECLENSION_FIVE')
            );
        }
    }
}