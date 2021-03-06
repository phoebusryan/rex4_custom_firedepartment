<?php
	class rex_firedepartment {
		
		public static function getStatistics() {
			global $REX;
			
			$alerts = self::getAlerts();
			$statistics = array();
			
			$sql = new sql();
			$result = $sql->get_array('SELECT `config_alert_id`, count(*) as `count` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_operation` GROUP BY `config_alert_id`');
			foreach ($result as $row) {
				$statistics[$alerts[$row['config_alert_id']]] = $row['count'];
			}
			unset($sql);
			
			return $statistics;
		}
		
		public static function getOperationByID($id) {
			global $REX;
			
			$alerts = self::getAlerts();
			$units = self::getUnits();
			$vehicles = self::getVehicles();
			
			$sql = new sql();
			$result = $sql->get_array('SELECT * FROM `'.$REX['TABLE_PREFIX'].'firedepartment_operation` WHERE `id` = '.intval($id));
			unset($sql);
			
			if (!empty($result)) {
				$unitIDs = [];
				
				//Start - explode units
					if ($result[0]['config_unit_ids'] != '') {
						$unitIDs = explode('|', trim($result[0]['config_unit_ids'], '|'));
						foreach ($unitIDs as $index => $unitID) {
							$unitIDs[$index] = $units[$unitID];
						}
					}
				//End - explode units
				
				//Start - explode vehicles
					$vehicleIDs = [];
					
					if ($result[0]['config_vehicle_ids'] != '') {
						$vehicleIDs = explode('|', trim($result[0]['config_vehicle_ids'], '|'));
						foreach ($vehicleIDs as $index => $vehicleID) {
							$vehicleIDs[$index] = $vehicles[$vehicleID];
						}
					}
				//End - explode vehicles
				
				$operation = [
					'alert' => $alerts[$result[0]['config_alert_id']],
					'units' => $unitIDs,
					'vehicles' => $vehicleIDs,
					'report_short' => $result[0]['report_short'],
					'report_long' => $result[0]['report_long'],
					'start_date' => $result[0]['start_date'],
					'end_date' => $result[0]['end_date'],
					'place' => $result[0]['place'],
					'images' => (($result[0]['images'] != '') ? explode(',', $result[0]['images']) : []),
				];
				
				return $operation;
			} else {
				return false;
			}
		}
		
		public static function getOperations($year) {
			global $REX;
			
			$alerts = self::getAlerts();
			$units = self::getUnits();
			$vehicles = self::getVehicles();
			$operations = [];
			
			$sql = new sql();
			$result = $sql->get_array('SELECT * FROM `'.$REX['TABLE_PREFIX'].'firedepartment_operation` WHERE DATE_FORMAT(`start_date`, "%Y") = '.intval($year).' ORDER BY `start_date` ASC');
			foreach ($result as $row) {
				$unitIDs = [];
				
				//Start - explode units
					if ($result[0]['config_unit_ids'] != '') {
						$unitIDs = explode('|', trim($result[0]['config_unit_ids'], '|'));
						foreach ($unitIDs as $index => $unitID) {
							$unitIDs[$index] = $units[$unitID];
						}
					}
				//End - explode units
				
				//Start - explode vehicles
					$vehicleIDs = [];
					
					if ($result[0]['config_vehicle_ids'] != '') {
						$vehicleIDs = explode('|', trim($result[0]['config_vehicle_ids'], '|'));
						foreach ($vehicleIDs as $index => $vehicleID) {
							$vehicleIDs[$index] = $vehicles[$vehicleID];
						}
					}
				//End - explode vehicles
				
				$operations[] = [
					'id' => $row['id'],
					'alert' => $alerts[$row['config_alert_id']],
					'units' => $unitIDs,
					'vehicles' => $vehicleIDs,
					'report_short' => $row['report_short'],
					'report_long' => $row['report_long'],
					'start_date' => $row['start_date'],
					'end_date' => $row['end_date'],
					'place' => $row['place'],
					'images' => (($row['images'] != '') ? explode(',', $row['images']) : []),
				];
			}
			unset($sql);
			
			return $operations;
		}
		
		private static function getAlerts() {
			global $REX;
			
			$alerts = [];
			
			$sql = new sql();
			$result = $sql->get_array('SELECT `id`, `name` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_alert`');
			foreach ($result as $row) {
				$alerts[$row['id']] = $row['name'];
			}
			unset($sql);
			
			return $alerts;
		}
		
		private static function getUnits() {
			global $REX;
			
			$units = [];
			
			$sql = new sql();
			$result = $sql->get_array('SELECT `id`, `name` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_unit`');
			foreach ($result as $row) {
				$units[$row['id']] = $row['name'];
			}
			unset($sql);
			
			return $units;
		}
		
		private static function getVehicles() {
			global $REX;
			
			$vehicles = [];
			
			$sql = new sql();
			$result = $sql->get_array('SELECT `id`, `name` FROM `'.$REX['TABLE_PREFIX'].'firedepartment_config_vehicle`');
			foreach ($result as $row) {
				$vehicles[$row['id']] = $row['name'];
			}
			unset($sql);
			
			return $vehicles;
		}
	}
?>