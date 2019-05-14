/*
Подготовка всех AJAX форм

Требуется подключение файлов
jquery.maskedinput.min.js, jquery.validate.js, jquery.form.js

Ответ JSON
'title' => 'Заголовок',
'message' => 'Сообщение',
'error' => false, // ошибка
'reload' => false, // обновить страницу
'hidden' => true // скрыть форму 
'close' => false // закрыть модальное окно

Пример формы
<form action="/ajax.php" data-reachgoal="offer" method="post" class="validate form-ajax" enctype="multipart/form-data">
	<div class="form-ajax__result">
		<div class="form-ajax__result-title"></div>
		<div class="form-ajax__result-message"></div>
	</div>
	<div class="form-ajax__hidden">
		<div class="form-group">
			<label for="phoneInput">Номер телефона</label>
			<input type="text" id="phoneInput" class="form-control js__phone-mask" name="user__phone" required title="Это поле обязательно для заполнения">
		</div>
		<input type="hidden" name="action" value="order">
		<div class="form-group">
			<button type="submit" class="btn">Отправить</button>
		</div>
	</div>
</form>
*/
var FormAjax = { 

	// Классы
	formClass : ".form-ajax",
	dialogClass : ".form-ajax__result",
	dialogHiddenClass : ".form-ajax__hidden",
	dialogTitleClass : ".form-ajax__result-title",
	dialogMessageClass : ".form-ajax__result-message",
	phoneMaskClass : ".js__phone-mask",
	errorClass : "form-ajax__result_error",
	//Опции валидации по умолчанию
	validateOpt : {
		errorClass: 'error',
		focusInvalid: true,
    errorPlacement: function( error, element ){
      error.insertBefore(element);
    },
		submitHandler: function(form){
			var $form = $(form);
			$form.trigger('formBeforeSend');
			$form.trigger('formSend');
		}
	}, 
	init: function() {
		var self = this;
		//Подготовка форм
		self.maskInput();
		$('form'+self.formClass).each(function(){
			self.prepareForm($(this));
		});
		//Перед отправкой всех форм
		$(document).on('formBeforeSend', 'form'+self.formClass, function(event){
			if (event.isDefaultPrevented()){return;}
			var $form = $(this);
			self.formBeforeSend($form);
		});
		//Отправка всех форм
		$(document).on('formSend', 'form'+self.formClass, function(event){
			if (event.isDefaultPrevented()){return;}
			var $form = $(this);
			self.formSend($form);
		});
		//После отправки всех форм
		$(document).on('formAfterSend', 'form'+self.formClass, function(event){
			if (event.isDefaultPrevented()){return;}
			var $form = $(this);
			self.formAfterSend($form, event);
		});
	},
	//Валидация формы
	prepareForm: function ($form){
		var self = this;
		if(!$form.data('prepared')){
			$form.validate(self.validateOpt);
			$form.data('prepared', true);
		}
	},
	// Маска для телефона
	maskInput: function (){
		var self = this;
		$(self.phoneMaskClass).mask("+7 (999) 999-99-99", {placeholder : "+7 (xxx) xxx-xx-xx"});
	},
	// Перед отправкой формы
	formBeforeSend: function ($form){
		//Собираем и запоминаем информацию с формы
		$form.data('formSendData', $form.serialize());
		//Показываем лоадер
		box = new ajaxLoader($form, {classOveride: 'blue-loader'});
	},
	//Отправка
	formSend: function ($form){		
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
	},
	formAfterSend: function ($form, event){
		var self = this;
		var $dialogResult = $form.find(self.dialogClass);
		var $dialogResultHidden = $form.find(self.dialogHiddenClass);
		$dialogResult.show();

		//Скрываем лоадер
		box.remove();

		//Выводим сообщение о результате
		if (event.formReply.error){
			$dialogResult.addClass(self.errorClass);

			if (!event.formReply.title || $.trim(event.formReply.title) === ''){
				event.formReply.title = 'Ошибка';
			}
		}else{
      
      // Цель
      //ym('', 'reachGoal', $form.data("reachgoal"));

			$dialogResult.removeClass(self.errorClass);

			if (!event.formReply.title || $.trim(event.formReply.title) === ''){
				event.formReply.title = 'Сообщение';
			}
			// обновить страницу
			if (event.formReply.reload){
				setTimeout(function() {location.reload();}, 5000);
			}
			// закрыть окно
			if (event.formReply.close){
				setTimeout(function() {$.fancybox.close();}, 5000);
			}
			// скрыть форму
			if (event.formReply.hidden){
				$dialogResultHidden.remove();
			}
		}

		$dialogResult.find(self.dialogTitleClass).html (event.formReply.title);
		$dialogResult.find(self.dialogMessageClass).html (event.formReply.message);
	},
};

$(document).ready(function() {
	FormAjax.init();
});