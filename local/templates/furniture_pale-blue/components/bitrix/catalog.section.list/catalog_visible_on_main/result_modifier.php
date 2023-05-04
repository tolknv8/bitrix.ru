<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
foreach ($arResult['SECTIONS'] as $key => &$item) {
    if (!$item['PICTURE'] && !empty($item['DETAIL_PICTURE'])) {
        $item['PICTURE']['SRC'] = CFile::GetFileArray($item['DETAIL_PICTURE']);
    }
}
