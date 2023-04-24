
<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Каталог');
$APPLICATION->IncludeComponent(
    'bitrix:catalog.section.list', '',
    [
        'VIEW_MODE'           => 'TEXT',
        'SHOW_PARENT_NAME'    => 'Y',
        'IBLOCK_TYPE'         => 'catalog',
        'IBLOCK_ID'           => 6,
        'SECTION_ID'          => $_REQUEST['SECTION_ID'],
        'SECTION_CODE'        => '',
        'SECTION_URL'         => '',
        'COUNT_ELEMENTS'      => 'Y',
        'TOP_DEPTH'           => '2',
        'SECTION_FIELDS'      => Array('PREVIEW_TEXT', 'PREVIEW_IMAGE') ,
        'SECTION_USER_FIELDS' => '',
        'ADD_SECTIONS_CHAIN'  => 'Y',
        'CACHE_TYPE'          => 'Y',
        'CACHE_TIME'          => '36000000',
        'CACHE_NOTES'         => '',
        'CACHE_GROUPS'        => 'Y',
    ]
);
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>