<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Доктора");
?>

<a href="/doctors/add.php">Добавить доктора</a><br>
<a href="/specialization/add.php">Добавить специализацию</a><br><br>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "",
    [
        "IBLOCK_ID" => 12, // ← тут укажи ID инфоблока "Доктора"
        "IBLOCK_TYPE" => "lists",
        "NEWS_COUNT" => 20,
        "SORT_BY1" => "ID",
        "SORT_ORDER1" => "DESC",
        "PROPERTY_CODE" => ["FIO", "PHONE", "EXPERIENCE", "PHOTO", "SPECIALIZATION"],
        "SET_TITLE" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600"
    ],
    false
);
?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
