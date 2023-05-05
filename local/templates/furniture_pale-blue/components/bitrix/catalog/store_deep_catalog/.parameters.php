<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arTemplateParameters = [
    'DETAIL_SHOW_PICTURE'      => [
        'NAME'     => GetMessage('SHOW_PICTURE_DETAIL'),
        'TYPE'     => 'CHECKBOX',
        'MULTIPLE' => 'N',
        'DEFAULT'  => 'Y',
        'PARENT'   => 'DETAIL_SETTINGS',
    ],
    'SECTION_SHOW_PARENT_NAME' => [
        'NAME'     => GetMessage('SHOW_PARENT_NAME'),
        'TYPE'     => 'CHECKBOX',
        'MULTIPLE' => 'N',
        'DEFAULT'  => 'N',
        'PARENT'   => 'ADDITIONAL_SETTINGS',
    ],
];
?>
