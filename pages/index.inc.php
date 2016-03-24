<?php
	$Basedir = dirname(__FILE__);
	
	$page = rex_request("page", "string");
	$subpage = rex_request("subpage", "string");
	$func = rex_request("func", "string");
	
	include_once $REX["INCLUDE_PATH"]."/layout/top.php";
	
	$subpages = array(
		array("settings", $addon_i18n->msg('rex_firedepartment_ctype_settings')),
		array("operations", $addon_i18n->msg('rex_firedepartment_ctype_operations')),
	);
	
	rex_title($addon_i18n->msg('rex_firedepartment_title'), $subpages);
	
	switch($subpage) {
		case "settings":
			require $Basedir ."/settings.inc.php";
		break;
		case "operations":
			require $Basedir ."/operations.inc.php";
		break;
		default:
			require $Basedir ."/settings.inc.php";
		break;
	}
	
	include_once $REX["INCLUDE_PATH"]."/layout/bottom.php";
?>