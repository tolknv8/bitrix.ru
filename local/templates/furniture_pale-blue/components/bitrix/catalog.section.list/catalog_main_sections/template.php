<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true); ?>
<div>
    <?php foreach ($arResult['SECTIONS'] as $arItem): ?>
        <div style="background-image: url("")">
            <a href="<?= $arItem['LIST_PAGE_URL'] ?>"><?= $arItem['NAME']?></a>
        </div>
    <?php endforeach; ?>
</div>