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
$GLOBALS['sectionsFilter'] = ['!=SECTION_ID' => false];
?>
<div class="catalog-section">
    <? $APPLICATION->IncludeComponent(
        'bitrix:catalog.section.list',
        'catalog_visible_on_main',
        [
            'IBLOCK_TYPE'         => $arParams['IBLOCK_TYPE'],
            'IBLOCK_ID'           => $arParams['IBLOCK_ID'],
            'SECTION_ID'          => '0',
            'COUNT_ELEMENTS'      => 'Y',
            'TOP_DEPTH'           => '2',
            'SECTION_URL'         => $arParams['SECTION_URL'],
            'CACHE_TYPE'          => 'N',
            'CACHE_TIME'          => $arParams['CACHE_TIME'],
            'DISPLAY_PANEL'       => 'N',
            'ADD_SECTIONS_CHAIN'  => $arParams['ADD_SECTIONS_CHAIN'],
            'FILTER_NAME'         => 'sectionsFilter',
            'SECTION_USER_FIELDS' => $arParams['SECTION_USER_FIELDS'],
        ],
        $component
    ); ?>
</div>

<div class="catalog-section">
    <table cellpadding="8" cellspacing="8" border="0" width="100%">
        <? foreach ($arResult['ITEMS'] as $cell => $arElement): ?>
            <?
            $this->AddEditAction(
                $arElement['ID'],
                $arElement['EDIT_LINK'],
                CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT')
            );
            $this->AddDeleteAction(
                $arElement['ID'],
                $arElement['DELETE_LINK'],
                CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE'),
                ['CONFIRM' => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')]
            );
            ?>
            <? if ($cell % $arParams['LINE_ELEMENT_COUNT'] == 0): ?>
                <tr>
            <? endif; ?>

            <td valign="top" width="<?= round(100 / $arParams['LINE_ELEMENT_COUNT']) ?>%"
                style="border:1px solid #CCCCCC" id="<?= $this->GetEditAreaId($arElement['ID']); ?>">
                <table cellpadding="0" cellspacing="2" border="0">
                    <tr>
                        <? if (is_array($arElement['PREVIEW_PICTURE'])): ?>
                            <td valign="top">
                                <a href="<?= $arElement['DETAIL_PAGE_URL'] ?>"><img
                                        border="0"
                                        src="<?= $arElement['PREVIEW_PICTURE']['SRC'] ?>"
                                        alt="<?= $arElement['PREVIEW_PICTURE']['ALT'] ?>"
                                        title="<?= $arElement['PREVIEW_PICTURE']['TITLE'] ?>"
                                        class="catalog_item-img"
                                    /></a><br/>
                            </td>
                        <? elseif (is_array($arElement['DETAIL_PICTURE'])): ?>
                            <td valign="top">
                                <a href="<?= $arElement['DETAIL_PAGE_URL'] ?>"><img
                                        border="0"
                                        src="<?= $arElement['DETAIL_PICTURE']['SRC'] ?>"
                                        alt="<?= $arElement['DETAIL_PICTURE']['ALT'] ?>"
                                        title="<?= $arElement['DETAIL_PICTURE']['TITLE'] ?>"
                                        class="catalog_item-img"
                                    /></a><br/>
                            </td>
                        <? endif ?>
                        <td valign="top"><a href="<?= $arElement['DETAIL_PAGE_URL'] ?>"><b><?= $arElement['NAME'] ?></b></a><br/><br/>
                            <?
                            $pub_date = '';
                            if ($arElement['ACTIVE_FROM']) {
                                $pub_date = FormatDate(
                                    $GLOBALS['DB']->DateFormatToPhp(CSite::GetDateFormat('FULL')),
                                    MakeTimeStamp($arElement['ACTIVE_FROM'])
                                );
                            } elseif ($arElement['DATE_CREATE']) {
                                $pub_date = FormatDate(
                                    $GLOBALS['DB']->DateFormatToPhp(CSite::GetDateFormat('FULL')),
                                    MakeTimeStamp($arElement['DATE_CREATE'])
                                );
                            }

                            if ($pub_date) {
                                echo '<b>' . GetMessage('PUB_DATE') . '</b>&nbsp;' . $pub_date . '<br />';
                            }
                            ?>
                            <? foreach ($arElement['DISPLAY_PROPERTIES'] as $pid => $arProperty):
                                echo '<b>' . $arProperty['NAME'] . ':</b>&nbsp;';

                                if (is_array($arProperty['DISPLAY_VALUE'])) {
                                    echo implode('&nbsp;/&nbsp;', $arProperty['DISPLAY_VALUE']);
                                } else {
                                    echo $arProperty['DISPLAY_VALUE'];
                                }
                                ?><br/>
                            <? endforeach ?>
                            <br/>
                            <?= $arElement['PREVIEW_TEXT'] ?>
                        </td>
                    </tr>
                </table>

                <? foreach ($arElement['PRICES'] as $code => $arPrice): ?>
                    <? if ($arPrice['CAN_ACCESS']): ?>
                        <p><?= $arResult['PRICES'][$code]['TITLE']; ?>:&nbsp;&nbsp;
                            <? if ($arPrice['DISCOUNT_VALUE'] < $arPrice['VALUE']): ?>
                                <s><?= $arPrice['PRINT_VALUE'] ?></s> <span
                                    class="catalog-price"><?= $arPrice['PRINT_DISCOUNT_VALUE'] ?></span>
                            <? else: ?><span class="catalog-price"><?= $arPrice['PRINT_VALUE'] ?></span><? endif; ?>
                        </p>
                    <? endif; ?>
                <? endforeach; ?>
                <? if (is_array($arElement['PRICE_MATRIX'])): ?>
                    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="data-table">
                        <thead>
                        <tr>
                            <? if (count($arElement['PRICE_MATRIX']['ROWS']) >= 1
                                && ($arElement['PRICE_MATRIX']['ROWS'][0]['QUANTITY_FROM'] > 0
                                    || $arElement['PRICE_MATRIX']['ROWS'][0]['QUANTITY_TO'] > 0)): ?>
                                <td valign="top" nowrap><?= GetMessage('CATALOG_QUANTITY') ?></td>
                            <? endif ?>
                            <? foreach ($arElement['PRICE_MATRIX']['COLS'] as $typeID => $arType): ?>
                                <td valign="top" nowrap><?= $arType['NAME_LANG'] ?></td>
                            <? endforeach ?>
                        </tr>
                        </thead>
                        <? foreach ($arElement['PRICE_MATRIX']['ROWS'] as $ind => $arQuantity): ?>
                            <tr>
                                <? if (count($arElement['PRICE_MATRIX']['ROWS']) > 1
                                    || count(
                                        $arElement['PRICE_MATRIX']['ROWS']
                                    ) == 1
                                    && ($arElement['PRICE_MATRIX']['ROWS'][0]['QUANTITY_FROM'] > 0
                                        || $arElement['PRICE_MATRIX']['ROWS'][0]['QUANTITY_TO'] > 0)): ?>
                                    <th nowrap><?
                                        if (intval($arQuantity['QUANTITY_FROM']) > 0
                                            && intval(
                                                $arQuantity['QUANTITY_TO']
                                            ) > 0) {
                                            echo str_replace(
                                                '#FROM#',
                                                $arQuantity['QUANTITY_FROM'],
                                                str_replace(
                                                    '#TO#',
                                                    $arQuantity['QUANTITY_TO'],
                                                    GetMessage('CATALOG_QUANTITY_FROM_TO')
                                                )
                                            );
                                        } elseif (intval($arQuantity['QUANTITY_FROM']) > 0) {
                                            echo str_replace(
                                                '#FROM#',
                                                $arQuantity['QUANTITY_FROM'],
                                                GetMessage('CATALOG_QUANTITY_FROM')
                                            );
                                        } elseif (intval($arQuantity['QUANTITY_TO']) > 0) {
                                            echo str_replace(
                                                '#TO#',
                                                $arQuantity['QUANTITY_TO'],
                                                GetMessage('CATALOG_QUANTITY_TO')
                                            );
                                        }
                                        ?></th>
                                <? endif ?>
                                <? foreach ($arElement['PRICE_MATRIX']['COLS'] as $typeID => $arType): ?>
                                    <td><?
                                        if ($arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['DISCOUNT_PRICE']
                                            < $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['PRICE']):?>
                                            <s><?= FormatCurrency(
                                                    $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['PRICE'],
                                                    $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['CURRENCY']
                                                ) ?></s><span class="catalog-price"><?= FormatCurrency(
                                                    $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['DISCOUNT_PRICE'],
                                                    $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['CURRENCY']
                                                ); ?></span>
                                        <? else: ?>
                                            <span class="catalog-price"><?= FormatCurrency(
                                                    $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['PRICE'],
                                                    $arElement['PRICE_MATRIX']['MATRIX'][$typeID][$ind]['CURRENCY']
                                                ); ?></span>
                                        <? endif ?>&nbsp;
                                    </td>
                                <? endforeach ?>
                            </tr>
                        <? endforeach ?>
                    </table><br/>
                <? endif ?>
                <? if ($arParams['DISPLAY_COMPARE']): ?>
                    <noindex>
                        <a href="<? echo $arElement['COMPARE_URL'] ?>" rel="nofollow"><? echo GetMessage(
                                'CATALOG_COMPARE'
                            ) ?></a>&nbsp;
                    </noindex>
                <? endif ?>
            </td>

            <? $cell++;
            if ($cell % $arParams['LINE_ELEMENT_COUNT'] == 0):?>
                </tr>
            <? endif ?>

        <? endforeach; ?>

        <? if ($cell % $arParams['LINE_ELEMENT_COUNT'] != 0): ?>
            <? while (($cell++) % $arParams['LINE_ELEMENT_COUNT'] != 0): ?>
                <td>&nbsp;</td>
            <? endwhile; ?>
            </tr>
        <? endif ?>
    </table>
    <? if ($arParams['DISPLAY_BOTTOM_PAGER']): ?>
        <br/><?= $arResult['NAV_STRING'] ?>
    <? endif; ?>
</div>

