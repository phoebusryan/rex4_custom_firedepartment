<?php
	$addonName = 'rex_firedepartment';
	$REX['ADDON']['rxid'][$addonName] = 'phoebusryan';
	$REX['ADDON']['page'][$addonName] = $addonName; 
	$REX['ADDON']['name'][$addonName] = 'Feuerwehr Einsätze'; //todo: Translate
	$REX['ADDON']['perm'][$addonName] = 'rex_firedepartment[]';
	$REX['PERM'][] = 'fdl_onlinemap[]';
	$REX['ADDON']['version'][$addonName] = '1.0';
	$REX['ADDON']['author'][$addonName] = 'Thomas Kaegi';
	
	//Start - permissions
//		$REX['EXTPERM'][] = $addon.'[category_delete]';
//		$REX['EXTPERM'][] = $addon.'[category_status]';
//		$REX['EXTPERM'][] = $addon.'[categoryfield_delete]';
//		$REX['EXTPERM'][] = $addon.'[categoryfield_status]';
//		
//		$REX['EXTPERM'][] = $addon.'[group_delete]';
//		$REX['EXTPERM'][] = $addon.'[group_status]';
//		$REX['EXTPERM'][] = $addon.'[groupfield_delete]';
//		$REX['EXTPERM'][] = $addon.'[groupfield_status]';
//		
//		$REX['EXTPERM'][] = $addon.'[entry_delete]';
//		$REX['EXTPERM'][] = $addon.'[entry_status]';
//		$REX['EXTPERM'][] = $addon.'[entrygroup_delete]';
//		$REX['EXTPERM'][] = $addon.'[entrygroup_status]';
	//End - permissions
	
	//Start - custom classes & functions
//		include $REX["INCLUDE_PATH"]."/addons/".$addon."/classes/class.rex_form_extended.inc.php";
//		include $REX["INCLUDE_PATH"]."/addons/".$addon."/functions/function_rex_custom.inc.php";
	//End - custom classes & functions
	
	//Start - extensions
//		rex_register_extension('PAGE_HEADER', 'appendToPageHeader');
	//End - extensions
	
	//Start - languages
		if ($REX['REDAXO']) {
			$addon_i18n = new i18n($REX['LANG'], $REX['INCLUDE_PATH'].'/addons/'.$addonName.'/lang/');
		}
	//End - languages
	
	//Start - tables
//		define('TBL_MAP_CATEGORIES',$REX['TABLE_PREFIX'].'map_categories');
//		define('TBL_MAP_CATEGORIES_FIELDS',$REX['TABLE_PREFIX'].'map_categories_fields');
//		
//		define('TBL_MAP_ENTRIES',$REX['TABLE_PREFIX'].'map_entries');
//		define('TBL_MAP_ENTRIES_FIELDS',$REX['TABLE_PREFIX'].'map_entries_fields');
//		
//		define('TBL_MAP_ENTRIES_GROUPS',$REX['TABLE_PREFIX'].'map_entries_groups');
//		define('TBL_MAP_ENTRIES_GROUPS_FIELDS',$REX['TABLE_PREFIX'].'map_entries_groups_fields');
//		
//		define('TBL_MAP_GROUPS',$REX['TABLE_PREFIX'].'map_groups');
//		define('TBL_MAP_GROUPS_FIELDS',$REX['TABLE_PREFIX'].'map_groups_fields');
	//End - tables
?>