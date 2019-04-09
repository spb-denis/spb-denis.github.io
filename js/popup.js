$(document).ready(function() {
	$overlay 			= $('.overlay'),
	$popup				= $('.popup-feedback'),
	$popupRepair	= $('.popup-repair'),
	$btn 					= $('.btn-close'),
	$callPopup 		= $('.feedback'),
	$nav 					= $('nav'),
	$repair 			= $('.repair1').find('.content'),
	$advant				= $('.main').find('.content');

	$repair.mouseenter(function() {
		$(this).find('img').css('transform', 'scale(1.3)');
	});

	$repair.mouseleave(function() {
		$(this).find('img').css('transform', 'scale(1)');
	});

	$repair.click(function() {
		$(this).find('ul').toggle(900);
	});

	$('.slider').slick({
		infinite: true,
		speed: 350,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrow: true
	});

	$('.slider-advantages').slick({
		infinite: true,
		speed: 3000,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: false,
		arrow: false
	});

	$('#number').mask("+7 (999) 999-99-99"); 

	$('.call-menu').click(function() {
		$('ul').toggle(700);
		// $('ul').css('height', 'auto');
	});
});