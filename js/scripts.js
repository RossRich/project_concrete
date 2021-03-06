jQuery(function ($) {

	//	maska
	$("[data-phone-mask]").inputmask(
		"mask", {
			"mask": "+7 (999) 999-9999",
			showMaskOnFocus: true,
			showMaskOnHover: false
		});

	// index
	$('.dev-order-input').focus(function () {
		$(this).parent().addClass('is-focused has-label');

		var name = $(this).attr("name");
		if (name == "form[name]") {
			$(this).parent().siblings(".uk-icon-user").addClass("des-ico-active-order");
		}
		if (name == "form[tel]") {
			$(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active-order");
			$(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active-order");
		}
	});

	$('.dev-order-input').blur(function () {
		$parent = $(this).parent();
		if ($(this).val() == "") {
			$parent.removeClass('is-focused has-label');
			$parent.siblings(".uk-icon-user").removeClass("des-ico-active-order");
			$parent.siblings(".uk-icon-envelope").removeClass("des-ico-active-order");
			$parent.siblings(".uk-icon-phone").removeClass("des-ico-active-order");
		}
		$parent.removeClass('is-focused');
	});

	// сброс формы

	$('#des_discount_form').on('reset', function (e) {
		var element = $('.dev-order-input').parent(),
			formName = $(this).attr("name");
		element.removeClass('has-label');
		element.siblings(".uk-icon-user").removeClass("des-ico-active-order");
		element.siblings(".uk-icon-envelope").removeClass("des-ico-active-order");
		element.siblings(".uk-icon-phone").removeClass("des-ico-active-order");
		// call modal window after reset form
		modalWindowApply();
		//		ya.metric
		if (formName == "discount") {
			yaMetrika('discountOrderingOnline');
		} else {
			yaMetrika('discountRentaPump');
		}
	});




	// foote
	$('.dev-footer-input').focus(function () {
		$(this).parent().addClass('is-focused has-label');
		var name = $(this).attr("name");
		if (name == "form[name]") {
			$(this).parent().siblings(".uk-icon-user").addClass("des-ico-active-footer");
		}
		if (name == "form[mail]" || name == "form[email]") {
			$(this).parent().siblings(".uk-icon-envelope").addClass("des-ico-active-footer");
			$(this).parent().siblings(".uk-icon-phone").addClass("des-ico-active-footer");
		}
	});

	$('.dev-footer-input').blur(function () {
		$parent = $(this).parent();
		if ($(this).val() == "") {
			$parent.removeClass('is-focused has-label');
			$parent.siblings(".uk-icon-user").removeClass("des-ico-active-footer");
			$parent.siblings(".uk-icon-envelope").removeClass("des-ico-active-footer");
			$parent.siblings(".uk-icon-phone").removeClass("des-ico-active-footer");
		}
		$parent.removeClass('is-focused');
	});


	// textarea_script
	$('.dev-footer-textarea').focus(function () {
		$(this).parent().siblings(".uk-icon-pencil").addClass("des-ico-active-footer");
		$(this).siblings(".dev-footer-label-correct").addClass("des-ico-active-footer");
		$(this).addClass("des-textarea-active-footer");

	});

	$('.dev-footer-textarea').blur(function () {
		if ($(this).val() == "") {
			$(this).parent().siblings(".uk-icon-pencil").removeClass("des-ico-active-footer");
			$(this).siblings(".dev-footer-label-correct").removeClass("des-ico-active-footer");
			$(this).removeClass("des-textarea-active-footer");
		}
	});

	// сброс формы

	$('#des_footer_form').on('reset', function (e) {
		var element = $('.dev-footer-input').parent();
		element.removeClass('has-label');
		element.siblings(".uk-icon-user").removeClass("des-ico-active-footer");
		element.siblings(".uk-icon-envelope").removeClass("des-ico-active-footer");
		element.siblings(".uk-icon-phone").removeClass("des-ico-active-footer");
		element.siblings(".dev-footer-label-correct").removeClass("des-ico-active-footer");
		$('.dev-footer-textarea').parent().siblings(".uk-icon-pencil").removeClass("des-ico-active-footer");
		$('.dev-footer-textarea').siblings(".dev-footer-label-correct").removeClass("des-ico-active-footer");
		$('.dev-footer-textarea').removeClass("des-textarea-active-footer");
		// call modal window after reset form
		modalWindowApply();
		callManager('questionsFromUser');
	});

	// modal.dialog
	$('.dev-get-manager-input').focus(function () {

		var domElement = $(this);
		domElement.parent().addClass('is-focused has-label');
		var name = domElement.attr("name");
		if (name == "form[name]") {
			domElement.parent().siblings(".uk-icon-user").addClass("des-ico-active-footer");
		}
		if (name == "form[tel]") {
			domElement.parent().siblings(".uk-icon-phone").addClass("des-ico-active-footer");
			setTimeout(function () {
				//                domElement.attr("placeholder", "БЕЗ +7");
			}, 400);

		} else if (name == "form[email]") {
			domElement.parent().siblings(".uk-icon-envelope").addClass("des-ico-active-footer");
		}
	});

	$('.dev-get-manager-input').blur(function () {
		var domElement = $(this);
		$parent = domElement.parent();
		if (domElement.val() == "") {
			$parent.removeClass('is-focused has-label');
			$parent.siblings(".uk-icon-user").removeClass("des-ico-active-footer");
			$parent.siblings(".uk-icon-envelope").removeClass("des-ico-active-footer");
			$parent.siblings(".uk-icon-phone").removeClass("des-ico-active-footer");
			domElement.attr("placeholder", "");
		}
		$parent.removeClass('is-focused');
	});

	$('#form_header_send_manager').on('reset', function (e) {
		var domElement = $('.dev-get-manager-input');
		var element = domElement.parent();
		element.removeClass('is-focused has-label');
		element.siblings(".uk-icon-user").removeClass("des-ico-active-footer");
		element.siblings(".uk-icon-phone").removeClass("des-ico-active-footer");
		domElement.attr("placeholder", "");
		// call modal window after reset form
		modalWindowApply();
		yaMetrika('callManager');
	});

	//	modalOrder
	$('.des-mod-order .input').on('focus', function () {
		$(this).parent().addClass('has-text');
	});

	$('.des-mod-order .input').blur(function () {
		var text = $(this).val();
		if (text == "") {
			$(this).parent().removeClass('has-text');
		}
	});

	/*
	 * handler for cards product. Get name product to modal order
	 */
	$('[data-uk-modal]').on('click', function () {
		var elem = $(this).siblings('div.panel_body').children('h3'),
			modalWindow = $(this).attr('href'),
			htmlHead = elem.html(),
			order = modalOrderParser(htmlHead),
			rpice = elem.children('span').eq(0).text(),
			valuta = elem.children('span').eq(1).text();
		if (modalWindow == "#modalOrder") {
			$(modalWindow).find('input#modalHeadOrder').val(order);
			$(modalWindow).find('input#modalHeadPrise').val(rpice + " " + valuta);
			yaMetrika('clickButtonOrder');
		} else {
			return true;
		}
	});
	/*
	 * reset modalOrder
	 */
	$('#formModalOrder').on('submit', function () {
		$(this).find('.des-mod-order').removeClass('has-text');
		setTimeout(function () {
			modalWindowApply();
			yaMetrika("orderFast");
		}, 300);
	});


});

function modalOrderParser(html) {
	var target = "<br>",
		pos = -1,
		order = "";
	if (html != null && html != undefined) {
		while ((pos = html.indexOf(target, pos + 1)) != -1) {
			order = html.substring(0, pos);
		}
	}
	return order;
}

function modalWindowApply() {
	$.extend(UIkit.components.modal.defaults, {
		center: true
	});
	var modal = UIkit.modal("#des-id-modal-apply", {
		center: true
	});

	if (modal.isActive()) {
		modal.hide();
	} else {
		modal.show();
	}
}

function yaMetrika(idGoal) {
	if (idGoal != null && idGoal != undefined) {
		yaCounter41038489.reachGoal('idGoal');
	} else {
		console.log("invalid argument");
		return true;
	}
}