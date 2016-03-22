jQuery(document).ready(function() {
	//Start - datepickeroptions
		var options = {
			dayOfWeekStart: 1,
			format:'Y-m-d H:i:s',
			step: 1
		};
	//End - datepickeroptions
	jQuery.datetimepicker.setLocale('de');
	
	jQuery('.date:eq(1)').datetimepicker(options);
	jQuery('.date:eq(2)').datetimepicker(options);
});