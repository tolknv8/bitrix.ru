<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
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
$this->setFrameMode(true);

$this->addExternalCss('/local/templates/furniture_pale-blue/markup/js/owlcarousel/owl.carousel.min.css');
?>

<div class="owl-carousel">
    <?php foreach ($arResult['SECTIONS'] as $arItem): ?>
        <div class="block-container" style="background-image: url('<?= $arItem['PICTURE']['SRC'] ?>');">
            <a href="<?= $arItem['LIST_PAGE_URL'] ?>"
               class="catalog_block">
                <?= $arItem['NAME'] ?>
                <?= $arItem['ELEMENT_CNT_TITLE'] ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>