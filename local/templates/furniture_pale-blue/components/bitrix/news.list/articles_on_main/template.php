<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
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

    <?php foreach ($arResult['ITEMS'] as $arItem): ?>
        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"><b><?= $arItem['NAME'] ?></b></a><br/>
        <div class="one_news">
            <?php if ($arItem['PREVIEW_PICTURE']): ?>
                <img
                    class="preview_picture"
                    src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"
                    width="<?= $arItem['PREVIEW_PICTURE']['WIDTH'] ?>"
                    height="<?= $arItem['PREVIEW_PICTURE']['HEIGHT'] ?>"
                    alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>"
                    title="<?= $arItem['PREVIEW_PICTURE']['TITLE'] ?>"
                    class="news_img"
                />
            <?php endif ?>
            <div class="news_container">
                <?= $arItem['PREVIEW_TEXT'] ?>
                <br><br>
                <?php if ($arItem['DISPLAY_PROPERTIES']['AUTHOR']['VALUE']): ?>
                    <b><?= $arItem['DISPLAY_PROPERTIES']['AUTHOR']['VALUE'] ?></b>
                <?php endif ?>
            </div>
        </div>

    <? endforeach; ?>
</div>
