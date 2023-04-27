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
                <img src="<? echo $arItem['PICTURE']['SRC'] ?>">
                <?= $arItem['NAME'] ?>
                <?= $arItem['ELEMENT_CNT_TITLE'] ?>
            </a>

        </div>
    <?php endforeach; ?>
</div>
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            },
            navClass: ['owl-prev-local', 'owl-next-local'],
            center: true
        })
    });
</script>
