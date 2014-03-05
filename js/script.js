(function () {
	var searchError = $('#searchError'),
		searchErrorList = $('#searchErrorList'),
		
		searchForm = $('#searchForm'),
		searchDate = $('#searchDate'),
		searchVendor = $('#searchVendor');
	
	$(searchDate).datepicker({
		format: 'dd/mm/yyyy'
	});
	
	$(window).on('resize', function () {
		$(searchVendor).width($(searchDate).width());
	}).trigger('resize');
	
	$(searchVendor).on('change', function () {
		$(this).children().first().remove();
	});
	
	$(searchForm).on('submit', function (e) {
		var flagSubmit = true,
			message = [];
		
		if ($.trim($(searchDate).val()) == '') {
			message.push('Please select or type in a date');
			flagSubmit = false;
		}
		else if (!/\d{2}\/\d{2}\/\d{4}/.test($(searchDate).val())) {
			message.push('Please type in a properly formatted date (E.g. dd/mm/yyyy)');
			flagSubmit = false;
		}
		
		if ($(searchVendor).val() == '') {
			message.push('Please select a vendor');
			flagSubmit = false;
		}
		
		if (!flagSubmit) {
			e.preventDefault();
			e.stopPropagation();
			
			$(searchErrorList).empty();
			$(searchError).modal('show');
			$.each(message, function (index, item) {
				$(searchErrorList).append(
					'<li class="text-error">' + item + '</li>'
				);
			});
		}
	});
})();