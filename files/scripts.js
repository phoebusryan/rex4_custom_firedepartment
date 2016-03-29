jQuery(document).ready(function() {
	//Start - datepickeroptions
		var options = {
			dayOfWeekStart: 1,
			format:'Y-m-d H:i:s',
			step: 1
		};
	//End - datepickeroptions
	jQuery.datetimepicker.setLocale('de');
	
	jQuery('input.date:eq(0)').datetimepicker(options);
	jQuery('input.date:eq(1)').datetimepicker(options);
});