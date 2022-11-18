<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
	die();
}
use Bitrix\Main\Localization\Loc;

$arTemplateParameters = [
    "FOOTER_MENU_CLASS" => [
        "NAME" => Loc::getMessage('FOOTER_MENU_CLASS'),
        "TYPE" => "STRING",
        "DEFAULT" => "",
    ]
];