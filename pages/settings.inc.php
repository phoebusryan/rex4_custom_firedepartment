<?php
	$id = rex_request('id', 'int');
	
	switch ($func) {
		case '':
			//Start - list all alerts
				$list = rex_list::factory('SELECT `id`, `name` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_alert` ORDER BY `name` ASC');
				
				$imgHeader = '<a href="'. $list->getUrl(['func' => 'addAlert']) .'"><img src="media/metainfo_plus.gif" alt="" /></a>';
				
				$list->addColumn(
					$imgHeader, '<img src="media/metainfo.gif" alt="" />', 0, [ '<th class="rex-icon">###VALUE###</th>', '<td class="rex-icon">###VALUE###</td>' ]
				);
				
				$list->setColumnLabel('name', $addon_i18n->msg('rex_firedepartment_ctype_settings_alerts_column_name'));
				$list->setColumnParams('name', ['func' => 'editAlert', 'id' => '###id###']);
				
				$list->removeColumn('id');
				
				$list->show();
			//End - list all alerts
			
			echo '<br>';
			
			//Start - list all units
				$list = rex_list::factory('SELECT `id`, `name` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_unit` ORDER BY `name` ASC');
				
				$imgHeader = '<a href="'. $list->getUrl(['func' => 'addUnit']) .'"><img src="media/metainfo_plus.gif" alt="" /></a>';
				
				$list->addColumn(
					$imgHeader, '<img src="media/metainfo.gif" alt="" />', 0, [ '<th class="rex-icon">###VALUE###</th>', '<td class="rex-icon">###VALUE###</td>' ]
				);
				
				$list->setColumnLabel('name', $addon_i18n->msg('rex_firedepartment_ctype_settings_units_column_name'));
				$list->setColumnParams('name', ['func' => 'editUnit', 'id' => '###id###']);
				
				$list->removeColumn('id');
				
				$list->show();
			//End - list all units
			
			echo '<br>';
			
			//Start - list all vehicles
				$list = rex_list::factory('SELECT `id`, `name` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_vehicle` ORDER BY `name` ASC');
				
				$imgHeader = '<a href="'. $list->getUrl(['func' => 'addVehicle']) .'"><img src="media/metainfo_plus.gif" alt="" /></a>';
				
				$list->addColumn(
					$imgHeader, '<img src="media/metainfo.gif" alt="" />', 0, [ '<th class="rex-icon">###VALUE###</th>', '<td class="rex-icon">###VALUE###</td>' ]
				);
				
				$list->setColumnLabel('name', $addon_i18n->msg('rex_firedepartment_ctype_settings_vehicles_column_name'));
				$list->setColumnParams('name', ['func' => 'editVehicle', 'id' => '###id###']);
				
				$list->removeColumn('id');
				
				$list->show();
			//End - list all vehicles
		break;
		case 'addAlert':
		case 'editAlert':
			if ($func == 'addAlert') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_settings_alerts_action_add');
			} else if ($func == 'editAlert') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_settings_alerts_action_edit');
			}
			
			rex_register_extension('REX_FORM_CONTROL_FIELDS', function($params) {
				global $I18N, $func;
				
				if ($func == 'editAlert') {
					$params['subject']['apply'] = $I18N->msg('form_apply');
					$params['subject']['delete'] = $I18N->msg('form_delete');
				}
				
				return $params['subject'];
			});
			
			$form = rex_form::factory($REX['TABLE_PREFIX'].'firedepartment_config_alert', $formCaption, "id=".$id);
			
			$field = &$form->addTextField('name');
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_settings_alerts_formfield_name_label'));
			
			if($func == 'editAlert') {
				$form->addParam('id', $id);
			}
			
			$form->show();
		break;
		case 'addUnit':
		case 'editUnit':
			if ($func == 'addUnit') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_settings_units_action_add');
			} else if ($func == 'editUnit') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_settings_units_action_edit');
			}
			
			rex_register_extension('REX_FORM_CONTROL_FIELDS', function($params) {
				global $I18N, $func;
				
				if ($func == 'editUnit') {
					$params['subject']['apply'] = $I18N->msg('form_apply');
					$params['subject']['delete'] = $I18N->msg('form_delete');
				}
				
				return $params['subject'];
			});
			
			$form = rex_form::factory($REX['TABLE_PREFIX'].'firedepartment_config_unit', $formCaption, "id=".$id);
			
			$field = &$form->addTextField('name');
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_settings_units_formfield_name_label'));
			
			if($func == 'editUnit') {
				$form->addParam('id', $id);
			}
			
			$form->show();
		break;
		case 'addVehicle':
		case 'editVehicle':
			if ($func == 'addVehicle') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_settings_vehicles_action_add');
			} else if ($func == 'editVehicle') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_settings_vehicles_action_edit');
			}
			
			rex_register_extension('REX_FORM_CONTROL_FIELDS', function($params) {
				global $I18N, $func;
				
				if ($func == 'editVehicle') {
					$params['subject']['apply'] = $I18N->msg('form_apply');
					$params['subject']['delete'] = $I18N->msg('form_delete');
				}
				
				return $params['subject'];
			});
			
			$form = rex_form::factory($REX['TABLE_PREFIX'].'firedepartment_config_vehicle', $formCaption, "id=".$id);
			
			$field = &$form->addTextField('name');
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_settings_vehicles_formfield_name_label'));
			
			if($func == 'editVehicle') {
				$form->addParam('id', $id);
			}
			
			$form->show();
		break;
	}
?>