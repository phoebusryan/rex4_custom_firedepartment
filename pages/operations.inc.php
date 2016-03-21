<?php
	$id = rex_request('id', 'int');
	
	switch ($func) {
		case '':
			$list = rex_list::factory('SELECT `id`, `report_short`, `start_date` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_operations` ORDER BY `end_date` DESC');
			
			$imgHeader = '<a href="'. $list->getUrl(['func' => 'add']) .'"><img src="media/metainfo_plus.gif" alt=""/></a>';
			
			$list->addColumn(
				$imgHeader, '<img src="media/metainfo.gif" alt="" />', 0, [ '<th class="rex-icon">###VALUE###</th>', '<td class="rex-icon">###VALUE###</td>' ]
			);	
			
			$list->setColumnLabel('report_short', $addon_i18n->msg('rex_firedepartment_ctype_operations_column_report_short'));
			$list->setColumnParams('report_short', ['func' => 'edit', 'id' => '###id###']);
			
			$list->setColumnLabel('start_date', $addon_i18n->msg('rex_firedepartment_ctype_operations_column_start_date'));
			$list->setColumnParams('start_date', ['func' => 'edit', 'id' => '###id###']);
			
			$list->removeColumn('id');
			
			$list->show();
		break;
		case 'add':
		case 'edit':
			if ($func == 'add') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_operations_action_add');
			} else if ($func == 'edit') {
				$formCaption = $addon_i18n->msg('rex_firedepartment_ctype_operations_action_edit');
			}
			
			$form = rex_form::factory($REX['TABLE_PREFIX'].'firedepartment_operations', $formCaption, "id=".$id);
			
			//Start - field for alert_id
				$field = &$form->addSelectField('config_alert_id');
				$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_config_alert_id_label'));
				$select = &$field->getSelect();
				$select->setSize(1);
				
				$query = 'SELECT `name` as label, `id` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_alert` ORDER BY `name` ASC';
				$select->addSqlOptions($query);
			//End - field for alert_id
			
			//Start - field for unit_ids
				$field = &$form->addSelectField('config_unit_ids');
				$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_config_unit_ids_label'));
				$field->setAttribute('multiple', 'multiple');
				$select = &$field->getSelect();
				$select->setSize(5);
				
				$query = 'SELECT `name` as label, `id` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_unit` ORDER BY `name` ASC';
				$select->addSqlOptions($query);
			//End - field for unit_ids
			
			//Start - field for vehicle_id
				$field = &$form->addSelectField('config_vehicle_ids');
				$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_config_vehicle_ids_label'));
				$field->setAttribute('multiple', 'multiple');
				$select = &$field->getSelect();
				$select->setSize(5);
				
				$query = 'SELECT `name` as label, `id` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_vehicle` ORDER BY `name` ASC';
				$select->addSqlOptions($query);
			//End - field for vehicle_id
			
			$field = &$form->addTextareaField('report_short', null, ['rows' => 2]);
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_report_short_label'));
			
			$field = &$form->addTextareaField('report_long', null, ['rows' => 6]);
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_report_long_label'));
			
			$field = &$form->addTextField('place');
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_place_label'));
			
			$field = &$form->addTextField('start_date', null, ['class' => 'date']);
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_start_date_label'));
			
			$field = &$form->addTextField('end_date', null, ['class' => 'date']);
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_end_date_label'));
			
			$field = &$form->addMedialistField('images');
			$field->setLabel($addon_i18n->msg('rex_firedepartment_ctype_operations_formfield_images_label'));
			
			if($func == 'edit') {
				$form->addParam('id', $id);
			}
			
			$form->show();
		break;
	}
?>