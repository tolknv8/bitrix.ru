<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$link = mysqli_connect("0.0.0.0:80", "root", "605lOGDqNT3C", "bitrx_ru");
if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}
//    $elem_page = mysql_query('SELECT * FROM b_iblock_element'); //WHERE IBLOCK_ID = 5 AND ID = ' . (int) $_GET['ID']);
//    $elem_page = mysql_fetch_assoc($elem_page);
//    echo '<h1>' . $elem_page['NAME'] . '</h1>';
//    echo '<div>' . $elem_page['DETAIL_TEXT'] . '</div>';

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>