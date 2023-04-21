<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
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
?>
<div class="news-list">

    <?php foreach ($arResult["ITEMS"] as $arItem): ?>

    <?php
//        echo '<pre>';
//        var_dump($arItem);
//        echo '</pre>';
//        echo '<pre>';
//        var_dump($arItem['DETAIL_TEXT'], $arItem['PREVIEW_PICTURE']['SRC']);
//        echo '</pre>';
//        die;


        ?>
    <?php echo '<pre>';
    if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):
        echo $arItem["PREVIEW_TEXT"];
    endif;
        echo '</pre>';?>
        <?php echo '<pre>';?>
    <img
        class="preview_picture"
        border="0"
        src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
        width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>"
        height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>"
        alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"
        title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>"
        style="margin:0px 0px 75px 75px"
    />
        <?php echo '</pre>';?>
    <?php endforeach; ?>
</div>
