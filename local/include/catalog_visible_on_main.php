<?php
$GLOBALS['sectionsFilter'] = ['UF_SHOW_ON_MAIN' => true];
$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list", 
	"catalog_visible_on_main", 
	array(
		"VIEW_MODE" => "TEXT",
		"SHOW_PARENT_NAME" => "Y",
		"IBLOCK_TYPE" => "news",
		"IBLOCK_ID" => "8",
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "Y",
		"TOP_DEPTH" => "2",
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_TYPE" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y",
		"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
		"FILTER_NAME" => "sectionsFilter",
		"CACHE_FILTER" => "Y",
		"COMPONENT_TEMPLATE" => "catalog_visible_on_main",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		)
	),
	false
); ?>
