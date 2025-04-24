<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавить доктора");
?>

<?php
$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add", 
	".default", 
	array(
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "lists",
		"PROPERTY_CODES" => array(
			0 => "66",
			1 => "NAME",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "66",
			1 => "NAME",
		),
		"GROUPS" => array(
			0 => "2",
		),
		"STATUS_NEW" => "N",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"MAX_FILE_SIZE" => "10485760",
		"CUSTOM_TITLE_NAME" => "ФИО",
		"SEF_MODE" => "N",
		"USE_CAPTCHA" => "N",
		"SUCCESS_URL" => "/doctors/",
		"SET_TITLE" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"NAV_ON_PAGE" => "10",
		"USER_MESSAGE_ADD" => "",
		"USER_MESSAGE_EDIT" => "",
		"DEFAULT_INPUT_SIZE" => "30",
		"RESIZE_IMAGES" => "N",
		"STATUS" => "ANY",
		"ALLOW_EDIT" => "Y",
		"ALLOW_DELETE" => "Y",
		"MAX_USER_ENTRIES" => "100000",
		"MAX_LEVELS" => "100000",
		"LEVEL_LAST" => "Y",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => ""
	),
	false
);
?>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>
