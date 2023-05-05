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
?>

    <div>
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
<?
$arDefaultUrlTemplates404 = [
    'list'    => 'index.php',
    'element' => '#ELEMENT_ID#.php',
];

$arDefaultVariableAliases404 = [];
$arDefaultVariableAliases    = [];
$arComponentVariables        = ['IBLOCK_ID', 'ELEMENT_ID'];
$SEF_FOLDER                  = '';
$arUrlTemplates              = [];

if ($arParams['SEF_MODE'] == 'Y') {

    $arVariables = [];

    $arUrlTemplates = CComponentEngine::MakeComponentUrlTemplates(
        $arDefaultUrlTemplates404,
        $arParams['SEF_URL_TEMPLATES']
    );

    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
        $arDefaultVariableAliases404,
        $arParams['VARIABLE_ALIASES']
    );

    $componentPage = CComponentEngine::ParseComponentPath(
        $arParams['SEF_FOLDER'],
        $arUrlTemplates,
        $arVariables
    );

    if (strlen($componentPage) <= 0) {
        $componentPage = 'list';
    }

    CComponentEngine::InitComponentVariables(
        $componentPage,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables);

    $SEF_FOLDER = $arParams['SEF_FOLDER'];
} else {
    $arVariables = [];

    $arVariableAliases = CComponentEngine::MakeComponentVariableAliases(
        $arDefaultVariableAliases,
        $arParams['VARIABLE_ALIASES']
    );

    CComponentEngine::InitComponentVariables(
        false,
        $arComponentVariables,
        $arVariableAliases,
        $arVariables
    );

    $componentPage = '';

    if (intval($arVariables['ELEMENT_ID']) > 0) {
        $componentPage = 'element';
    } else {
        $componentPage = 'list';
    }

}

$arResult = [
    'FOLDER'        => $SEF_FOLDER,
    'URL_TEMPLATES' => $arUrlTemplates,
    'VARIABLES'     => $arVariables,
    'ALIASES'       => $arVariableAliases,
];

$this->IncludeComponentTemplate($componentPage);

?>