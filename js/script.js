(function () {
	var searchDate = $('#searchDate'),
		searchVendor = $('#searchVendor');
	
	$(searchDate).datepicker({
		format: 'dd/mm/yyyy'
	});
	
	$(window).on('resize', function () {
		$(searchVendor).width($(searchDate).width());
	}).trigger('resize');
})();