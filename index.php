<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

?>


    <p>
        Наша компания существует на Российском рынке с 1993 года. За это время «Мебельная компания» прошла большой путь
        от
        маленькой торговой фирмы до одного из крупнейших производителей корпусной мебели в России.
    </p>
    <p>
        «Мебельная компания» осуществляет производство мебели на высококлассном оборудовании с применением минимальной
        доли
        ручного труда, что позволяет обеспечить высокое качество нашей продукции. Налажен производственный процесс как
        массового и индивидуального характера, что с одной стороны позволяет обеспечить постоянную номенклатуру изделий
        и
        индивидуальный подход – с другой.
    </p>
    <h3>Наша продукция</h3>
<? /*$APPLICATION->IncludeComponent(
		"bitrix:furniture.catalog.index",
		"",
		Array(
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"IBLOCK_BINDING" => "section",
			"IBLOCK_ID" => "2",
			"IBLOCK_TYPE" => "products"
		)
	);*/ ?>
<? /*$APPLICATION->IncludeComponent(
		"bitrix:furniture.catalog.index",
		"",
		Array(
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "A",
			"IBLOCK_BINDING" => "element",
			"IBLOCK_ID" => "3",
			"IBLOCK_TYPE" => "products"
		)
	);*/ ?>
<?php $APPLICATION->IncludeComponent(
    "bitrix:news.list", "articles_on_main",
    [
        "DISPLAY_DATE"                    => "Y",
        "DISPLAY_NAME"                    => "Y",
        "DISPLAY_PICTURE"                 => "Y",
        "DISPLAY_PREVIEW_TEXT"            => "Y",
        "AJAX_MODE"                       => "Y",
        "IBLOCK_TYPE"                     => "articles",
        "IBLOCK_ID"                       => "5",
        "NEWS_COUNT"                      => "4",
        "SORT_BY1"                        => "TIMESTAMP_X",
        "SORT_ORDER1"                     => "DESC",
        "SORT_BY2"                        => "SORT",
        "SORT_ORDER2"                     => "ASC",
        "FIELD_CODE" => Array("CREATED_USER_NAME"),
        "SET_TITLE"                       => "N",
        "SET_BROWSER_TITLE"               => "N",
        "SET_META_KEYWORDS"               => "Y",
        "SET_META_DESCRIPTION"            => "Y",
        "SET_LAST_MODIFIED"               => "Y",
        "INCLUDE_IBLOCK_INTO_CHAIN"       => "Y",
        "ADD_SECTIONS_CHAIN"              => "Y",
        "HIDE_LINK_WHEN_NO_DETAIL"        => "Y",
        "INCLUDE_SUBSECTIONS"             => "Y",
        "CACHE_TYPE"                      => "A",
        "CACHE_TIME"                      => "3600",
        "CACHE_FILTER"                    => "Y",
        "CACHE_GROUPS"                    => "Y",
        "DISPLAY_TOP_PAGER"               => "N",
        "DISPLAY_BOTTOM_PAGER"            => "Y",
        "PAGER_TITLE"                     => "Новости",
        "PAGER_SHOW_ALWAYS"               => "Y",
        "PAGER_DESC_NUMBERING"            => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL"                  => "N",
        "PAGER_BASE_LINK_ENABLE"          => "Y",
        "SET_STATUS_404"                  => "Y",
        "PAGER_PARAMS_NAME"               => "arrPager",
        "AJAX_OPTION_JUMP"                => "N",
        "AJAX_OPTION_STYLE"               => "Y",
        "AJAX_OPTION_HISTORY"             => "N",
    ]
); ?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>