<link rel="stylesheet" href="/local/templates/furniture_pale-blue/components/bitrix/catalog.section.list/catalog_main_sections/owlcarousel/owl.carousel.min.css">
<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="/local/templates/furniture_pale-blue/components/bitrix/catalog.section.list/catalog_main_sections/owlcarousel/owl.carousel.min.js"></script>
<?php
$APPLICATION->IncludeComponent(
    'bitrix:catalog.section.list', 'catalog_main_sections',
    [
        'VIEW_MODE'             => 'TEXT',
        'SHOW_PARENT_NAME'      => 'Y',
        'IBLOCK_TYPE'           => 'catalog',
        'IBLOCK_ID'             => 6,
        'SECTION_ID'            => $_REQUEST['SECTION_ID'],
        'SECTION_CODE'          => '',
        'SECTION_URL'           => '',
        'COUNT_ELEMENTS'        => 'Y',
        'TOP_DEPTH'             =>  2,
        'SECTION_USER_FIELDS'   => [
            0 => '',
            1 => '',
        ],
        'ADD_SECTIONS_CHAIN'    => 'Y',
        'CACHE_TYPE'            => 'Y',
        'CACHE_TIME'            => '36000000',
        'CACHE_NOTES'           => '',
        'CACHE_GROUPS'          => 'Y',
        'COUNT_ELEMENTS_FILTER' => 'CNT_ACTIVE',
        'SECTION_FIELDS'        => [
            0 => '',
            1 => '',
        ],
        'FILTER_NAME'           => 'sectionsFilter',
        'CACHE_FILTER'          => 'N',
    ],
    false
);
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

<?php require $_SERVER['DOCUMENT_ROOT'] . '/local/include/articles_list.php';
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php'); ?>