CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%firedepartment_config_alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%firedepartment_config_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `%TABLE_PREFIX%firedepartment_config_vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `rex_firedepartment_operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config_alert_id` int(11) NOT NULL,
  `config_unit_ids`  varchar(100) NOT NULL,
  `config_vehicle_ids` varchar(100) NOT NULL,
  `report_short` tinytext NOT NULL,
  `report_long` mediumtext NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `place` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `config_alert_id` (`config_alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;