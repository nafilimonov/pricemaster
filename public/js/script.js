// JavaScript Document
$(document).ready(function() {
	
	//Блокируем переход по псевдо ссылкам
	$(document).on('click.false', 'a.false', function(event){event.preventDefault();});
	
  //Изображение в фон
	$('.js__image_bg').each(function(){
	    var image = $(this).find('img').attr('src');
	    $(this).css('background-image', 'url("'+ image +'")');
	})
});