<?php
	$addonName = 'rex_firedepartment';
	$REX['ADDON']['rxid'][$addonName] = 'phoebusryan';
	$REX['ADDON']['page'][$addonName] = $addonName; 
	$REX['ADDON']['name'][$addonName] = 'Feuerwehr Einsätze'; //todo: Translate
	$REX['ADDON']['perm'][$addonName] = 'rex_firedepartment[]';
	$REX['PERM'][] = 'rex_firedepartment[]';
	$REX['ADDON']['version'][$addonName] = '0.1';
	$REX['ADDON']['author'][$addonName] = 'Thomas Kaegi';
	
	//Start - custom classes & functions
		include $REX["INCLUDE_PATH"]."/addons/".$addonName."/functions/function_rex_firedepartment.inc.php";
	//End - custom classes & functions
	
	//Start - extensions
		rex_register_extension('PAGE_HEADER', 'appendToPageHeader');
	//End - extensions
	
	//Start - languages
		if ($REX['REDAXO']) {
			$addon_i18n = new i18n($REX['LANG'], $REX['INCLUDE_PATH'].'/addons/'.$addonName.'/lang/');
		}
	//End - languages
?>