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

<!--    --><?php
//        echo '<pre>';
//        var_dump($arItem);
//        echo '</pre>';
//        echo '<pre>';
//        var_dump($arItem['DETAIL_TEXT']);
//        echo '</pre>';
//        die;
//    ?>
    <?php
        if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
            <b> <?php echo $arItem["NAME"];?> </b>
    <?php endif;?>
    <div class="one_news">
        <img
            class="preview_picture"
            src="<?=$arItem['PREVIEW_PICTURE']['SRC']?>"
            width="<?=$arItem['PREVIEW_PICTURE']['WIDTH']?>"
            height="<?=$arItem['PREVIEW_PICTURE']['HEIGHT']?>"
            alt="<?=$arItem['PREVIEW_PICTURE']['ALT']?>"
            title="<?=$arItem['PREVIEW_PICTURE']['TITLE']?>"
            class="news_img"
        />
        <div class="news_container">
            <?php echo $arItem["PREVIEW_TEXT"]?>
            <p>
                <?php
                    $name = explode(" ",$arItem["CREATED_USER_NAME"], 2);
                    echo $name[1];
                ?>
            </p>
        </div>
        <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
            <a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" style="visibility: hidden"><b><?echo $arItem["NAME"]?></b></a><br />
        <?endif;?>

    </div>

    <?php endforeach; ?>
</div>
<style>
    .one_news{display: flex; align-items: center; margin-top: 10px; margin-bottom: 10px;}
    .one_news .news_img{/*flex-direction: row;*/}
    .one_news .news_container{/*flex-direction: row;*/ margin-left: 15px}
</style>
