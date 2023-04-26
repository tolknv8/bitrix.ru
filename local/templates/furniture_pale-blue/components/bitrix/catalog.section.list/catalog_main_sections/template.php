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

<div class="owl-carousel">
    <?php foreach ($arResult['SECTIONS'] as $arItem): ?>
        <div>
            <a href="<?= $arItem['LIST_PAGE_URL'] ?>">
                <?= $arItem['NAME'] ?>
                <?= $arItem['ELEMENT_CNT_TITLE'] ?>
                <img src="<? echo $arItem['PICTURE']['SRC'] ?>">
            </a>

        </div>
    <?php endforeach; ?>
</div>
<script>$(document).ready(function() {
        $(".owl-carousel").owlCarousel();
    });</script>
