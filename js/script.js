(function () {
	var searchError = $('#searchError'),
		searchErrorList = $('#searchErrorList'),
		
		searchForm = $('#searchForm'),
		searchDate = $('#searchDate'),
		searchVendor = $('#searchVendor'),
		
		adminBtnEdit = $('.btnEdit'),
		adminModalEdit = $('#modalEdit'),
		adminModalEditBody = $('#modalEditBody'),
		adminModalEditMode = $('#modalEditMode'),
		adminModalEditDate = $('#modalEditDate'),
		adminModalEditVendor = $('#modalEditVendor'),
		
		adminModalEditFirstId = $('#modalEditFirstId'),
		adminModalEditSecondId = $('#modalEditSecondId'),
		adminModalEditThirdId = $('#modalEditThirdId'),
		adminModalEditFirstNumber = $('#modalEditFirstNumber'),
		adminModalEditSecondNumber = $('#modalEditSecondNumber'),
		adminModalEditThirdNumber = $('#modalEditThirdNumber'),
		
		adminModalEditSpecialId01 = $('#modalEditSpecialId01'),
		adminModalEditSpecialId02 = $('#modalEditSpecialId02'),
		adminModalEditSpecialId03 = $('#modalEditSpecialId03'),
		adminModalEditSpecialId04 = $('#modalEditSpecialId04'),
		adminModalEditSpecialId05 = $('#modalEditSpecialId05'),
		adminModalEditSpecialId06 = $('#modalEditSpecialId06'),
		adminModalEditSpecialId07 = $('#modalEditSpecialId07'),
		adminModalEditSpecialId08 = $('#modalEditSpecialId08'),
		adminModalEditSpecialId09 = $('#modalEditSpecialId09'),
		adminModalEditSpecialId10 = $('#modalEditSpecialId10'),
		adminModalEditSpecialNumber01 = $('#modalEditSpecialNumber01'),
		adminModalEditSpecialNumber02 = $('#modalEditSpecialNumber02'),
		adminModalEditSpecialNumber03 = $('#modalEditSpecialNumber03'),
		adminModalEditSpecialNumber04 = $('#modalEditSpecialNumber04'),
		adminModalEditSpecialNumber05 = $('#modalEditSpecialNumber05'),
		adminModalEditSpecialNumber06 = $('#modalEditSpecialNumber06'),
		adminModalEditSpecialNumber07 = $('#modalEditSpecialNumber07'),
		adminModalEditSpecialNumber08 = $('#modalEditSpecialNumber08'),
		adminModalEditSpecialNumber09 = $('#modalEditSpecialNumber09'),
		adminModalEditSpecialNumber10 = $('#modalEditSpecialNumber10'),
		
		adminModalEditConsolationId01 = $('#modalEditConsolationId01'),
		adminModalEditConsolationId02 = $('#modalEditConsolationId02'),
		adminModalEditConsolationId03 = $('#modalEditConsolationId03'),
		adminModalEditConsolationId04 = $('#modalEditConsolationId04'),
		adminModalEditConsolationId05 = $('#modalEditConsolationId05'),
		adminModalEditConsolationId06 = $('#modalEditConsolationId06'),
		adminModalEditConsolationId07 = $('#modalEditConsolationId07'),
		adminModalEditConsolationId08 = $('#modalEditConsolationId08'),
		adminModalEditConsolationId09 = $('#modalEditConsolationId09'),
		adminModalEditConsolationId10 = $('#modalEditConsolationId10'),
		adminModalEditConsolationNumber01 = $('#modalEditConsolationNumber01'),
		adminModalEditConsolationNumber02 = $('#modalEditConsolationNumber02'),
		adminModalEditConsolationNumber03 = $('#modalEditConsolationNumber03'),
		adminModalEditConsolationNumber04 = $('#modalEditConsolationNumber04'),
		adminModalEditConsolationNumber05 = $('#modalEditConsolationNumber05'),
		adminModalEditConsolationNumber06 = $('#modalEditConsolationNumber06'),
		adminModalEditConsolationNumber07 = $('#modalEditConsolationNumber07'),
		adminModalEditConsolationNumber08 = $('#modalEditConsolationNumber08'),
		adminModalEditConsolationNumber09 = $('#modalEditConsolationNumber09'),
		adminModalEditConsolationNumber10 = $('#modalEditConsolationNumber10'),
		
		adminBtnNew = $('#btnNew');
	
	$(searchDate).add(adminModalEditDate).datepicker({
		format: 'dd/mm/yyyy'
	}).datepicker('setValue', '25/03/2014');
	
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
	
	$(adminModalEdit).on('shown', function () {
		$(adminModalEditBody).animate({
			scrollTop: 0
		}, 400).add($(window)).on('scroll', function () {
			$(adminModalEditDate).datepicker('hide');
		});
	}).on('hidden', function () {
		$(window).add(adminModalEditBody).off('scroll');
	});
	
	$(adminBtnEdit).add(adminBtnNew).on('click', function () {
		if ($(this).is('[data-01]')) {
			var special = $(this).data('10').split(','),
				consolation = $(this).data('11').split(',');
			
			$(adminModalEditMode).val('old');
			$(adminModalEditDate).val($(this).data('date'));
			$(adminModalEditVendor).val($(this).data('vendor'));
			
			$(adminModalEditFirstId).val($(this).data('01').split('_')[0]);
			$(adminModalEditSecondId).val($(this).data('02').split('_')[0]);
			$(adminModalEditThirdId).val($(this).data('03').split('_')[0]);
			$(adminModalEditFirstNumber).val($(this).data('01').split('_')[1]);
			$(adminModalEditSecondNumber).val($(this).data('02').split('_')[1]);
			$(adminModalEditThirdNumber).val($(this).data('03').split('_')[1]);
			
			$(adminModalEditSpecialId01).val(special[0].split('_')[0]);
			$(adminModalEditSpecialId02).val(special[1].split('_')[0]);
			$(adminModalEditSpecialId03).val(special[2].split('_')[0]);
			$(adminModalEditSpecialId04).val(special[3].split('_')[0]);
			$(adminModalEditSpecialId05).val(special[4].split('_')[0]);
			$(adminModalEditSpecialId06).val(special[5].split('_')[0]);
			$(adminModalEditSpecialId07).val(special[6].split('_')[0]);
			$(adminModalEditSpecialId08).val(special[7].split('_')[0]);
			$(adminModalEditSpecialId09).val(special[8].split('_')[0]);
			$(adminModalEditSpecialId10).val(special[9].split('_')[0]);
			$(adminModalEditSpecialNumber01).val(special[0].split('_')[1]);
			$(adminModalEditSpecialNumber02).val(special[1].split('_')[1]);
			$(adminModalEditSpecialNumber03).val(special[2].split('_')[1]);
			$(adminModalEditSpecialNumber04).val(special[3].split('_')[1]);
			$(adminModalEditSpecialNumber05).val(special[4].split('_')[1]);
			$(adminModalEditSpecialNumber06).val(special[5].split('_')[1]);
			$(adminModalEditSpecialNumber07).val(special[6].split('_')[1]);
			$(adminModalEditSpecialNumber08).val(special[7].split('_')[1]);
			$(adminModalEditSpecialNumber09).val(special[8].split('_')[1]);
			$(adminModalEditSpecialNumber10).val(special[9].split('_')[1]);
			
			$(adminModalEditConsolationId01).val(consolation[0].split('_')[0]);
			$(adminModalEditConsolationId02).val(consolation[1].split('_')[0]);
			$(adminModalEditConsolationId03).val(consolation[2].split('_')[0]);
			$(adminModalEditConsolationId04).val(consolation[3].split('_')[0]);
			$(adminModalEditConsolationId05).val(consolation[4].split('_')[0]);
			$(adminModalEditConsolationId06).val(consolation[5].split('_')[0]);
			$(adminModalEditConsolationId07).val(consolation[6].split('_')[0]);
			$(adminModalEditConsolationId08).val(consolation[7].split('_')[0]);
			$(adminModalEditConsolationId09).val(consolation[8].split('_')[0]);
			$(adminModalEditConsolationId10).val(consolation[9].split('_')[0]);
			$(adminModalEditConsolationNumber01).val(consolation[0].split('_')[1]);
			$(adminModalEditConsolationNumber02).val(consolation[1].split('_')[1]);
			$(adminModalEditConsolationNumber03).val(consolation[2].split('_')[1]);
			$(adminModalEditConsolationNumber04).val(consolation[3].split('_')[1]);
			$(adminModalEditConsolationNumber05).val(consolation[4].split('_')[1]);
			$(adminModalEditConsolationNumber06).val(consolation[5].split('_')[1]);
			$(adminModalEditConsolationNumber07).val(consolation[6].split('_')[1]);
			$(adminModalEditConsolationNumber08).val(consolation[7].split('_')[1]);
			$(adminModalEditConsolationNumber09).val(consolation[8].split('_')[1]);
			$(adminModalEditConsolationNumber10).val(consolation[9].split('_')[1]);
		}
		else {
			$(adminModalEditBody).find('input[type=text], select').each(function () {
				$(this).val('');
			});
			
			$(adminModalEditMode).val('new');
			$(adminModalEditDate).val($(this).data('today'));
		}
	});
})();