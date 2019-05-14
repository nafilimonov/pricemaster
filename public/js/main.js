



/*
 * Подготовка всех AJAX форм
 */

//Опции валидации по умолчанию
validateOpt = {
	errorClass: 'error',
	//validClass: 'ok',
	focusInvalid: true,
	errorPlacement: new Function,
	submitHandler: function(form){
		var $form = $(form);
		$form.trigger('formBeforeSend');
		$form.trigger('formSend');
	}
};

//Перед отправкой всех форм
$(document).on('formBeforeSend', 'form.form_ajax', function(event){
	if (event.isDefaultPrevented()){return;}
	var $form = $(this);
	//Собираем и запоминаем информацию с формы
	$form.data('formSendData', $form.serialize());
});

//Отправка всех форм
$(document).on('formSend', 'form.form_ajax', function(event){
	if (event.isDefaultPrevented()){return;}
	var $form = $(this);
	//Отправка
	$.ajax({
		url: $form.attr('action'),
		type: 'post',
		data: $form.data('formSendData'),
		dataType: 'json',
		success: function(reply){		
			//Тригеруем событие после отправки, передаём ответ
			$form.trigger($.Event('formAfterSend', {formReply: reply}));
		}
	});
});

//После отправки всех форм json
$(document).on('formAfterSend', 'form.form_ajax', function(event){
	if (event.isDefaultPrevented()){return;}

	var $form = $(this);
	var $dialogResult = $form.find(".send__result");
	var $dialogResultHidden = $form.find(".model_hidden");
	$dialogResult.show();

	//Выводим сообщение о результате
	if (event.formReply.error){
		$dialogResult.addClass('error');
	}else{

		$dialogResult.removeClass('error');

		if (event.formReply.hidden){
			$dialogResultHidden.remove();
		}
		if (event.formReply.reload){
				setTimeout(function() {location.reload();}, 1000);
		}
		// закрыть модальное окно
		if (event.formReply.close){
			setTimeout(function() {$.fancybox.close();}, 5000);
		}
	}
	$dialogResult.find(".result__text").text (event.formReply.message);

});

// Подготовка всех форм
function prepareForm($form){
	if(!$form.data('prepared')){
		//Валидация формы
		$form.validate(validateOpt);
		$form.data('prepared', true);
	}
}

// Вставить Html в модальное окно
// Вставить Html в модальное окно
function SetHtmlToModal (data) {
	$("#modalbox").html(data);
	$("#modalbox").fancybox().trigger('click');
}

//получить форму в модальном окне по кнопке
$(document).on('click','.js__getModal',function(){
	var option = $(this).data('option');
	var url = option.url;
	var id = option.id;
	$.ajax({
		type: 'POST',
		url: url,
		dataType: 'html',
		data: {
			id: id, 
			url:url
			},
		success: function(data){
			SetHtmlToModal (data);
		},
		error: function (jqXHR, text, error) { 
      console.log('error');
		}
	});
	
});	


$(function() {
	
	// Подготовка всех ajax форм
	$('form.form_ajax').each(function(){
		prepareForm($(this));

	});

	// AJAX для формы в таблице элементов
	$("form.form_ajax_table").submit(function() {
		var form_data = $(this).serialize();
		$.ajax({
			type: "POST",
			dataType: "json",
			url: $(this).attr('action'),
			data: form_data,
			success: function(data) {
				if (data.error) {
					alert("Ошибка!");
				}
				else {
					if (data.modal) {
						SetHtmlToModal (data.html)
					} else {
						alert(data.message);
						location.reload();
					}
				}			
			},
			error: function (jqXHR, text, error) { 
				console.log(jqXHR);
			}
		});
		return false;
	}); 

}); 



