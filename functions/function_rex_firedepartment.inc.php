<?php
	function appendToPageHeader($params) {
		global $REX;
		
		$params['subject'] .= PHP_EOL;
		$params['subject'] .= '<!-- BEGIN rex_firedepartment Addon -->'.PHP_EOL;
		$params['subject'] .= '<link rel="stylesheet" media="screen" type="text/css" href="../'.$REX['MEDIA_ADDON_DIR'].'/rex_firedepartment/jquery.datetimepicker/css/jquery.datetimepicker.css" />'.PHP_EOL;
		$params['subject'] .= '<script type="text/javascript" src="../'.$REX['MEDIA_ADDON_DIR'].'/rex_firedepartment/jquery.datetimepicker/js/jquery.datetimepicker.full.min.js"></script>'.PHP_EOL;
		$params['subject'] .= '<script type="text/javascript" src="../'.$REX['MEDIA_ADDON_DIR'].'/rex_firedepartment/scripts.js"></script>'.PHP_EOL;
		$params['subject'] .= '<!-- END rex_firedepartment Addon -->'.PHP_EOL;
		return $params['subject'];
	}
?>