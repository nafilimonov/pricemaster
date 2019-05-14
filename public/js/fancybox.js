var FancyBox = {
	// Классы
	showClass : "js__show-popup",
	closeClass : "js__close-popup",
	gallaryClass: "js__fancybox",
	// Отпции по умолчанию
	Opt : {
		openEffect: "fase",
		closeEffect: "fase",
		padding: 0,
		margin: 10,
		topRatio: 0.4,
		helpers: {
			overlay: {
			    locked: false
			}
		},
		/*tpl: {
			closeBtn : '',
		},*/
	}, 

	init: function() {
		var self = this;
		// показать окно fancybox
		$(document).on('click', '.' + self.showClass, function(){
			self.show ("#" + $(this).data("block"));
		});
		// закрыть окно fancybox
		$(document).on('click', '.' + self.closeClass, function(){
			$.fancybox.close();
		});
		//Галерая fancybox
		$("." + self.gallaryClass).fancybox(self.Opt);
	},

	// показать модальное окно
	show: function(popupId) {
		var self = this;
    $.fancybox( "#" + popupId, self.Opt);
	},
};

$(document).ready(function() {
	FancyBox.init();
});
