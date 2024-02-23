$(document).ready(function(){
	/*var altura = $('.menu').offset().top;*/
	var altura = 0;

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura){
			$('.cabecera').addClass('menu-fixed');
			$('.btn-cabecera').addClass('btn-gral-fixed');
			$('.btn-cabecera').removeClass('btn-gral');
		} else {
			$('.cabecera').removeClass('menu-fixed');
			$('.btn-cabecera').addClass('btn-gral');
			$('.btn-cabecera').removeClass('btn-gral-fixed');
		}
	});
});

$(document).ready(function(){
	/*var altura = $('.menu').offset().top;*/
	var altura =100;

	$(window).on('scroll', function(){
		if ( $(window).scrollTop() > altura){
			$('.cont-pedido').addClass('fixed-aside');
		} else {
			$('.cont-pedido').removeClass('fixed-aside');
		}
	});
});
