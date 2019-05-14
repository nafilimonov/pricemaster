/*

### Модальное окно

<button class="js__show-popup" data-block="#modal-call-me-big">
  Перезвоните мне big
</button>
 
### Галерея 
<a href="image.jpg" data-fancybox="images" data-width="2048" data-height="1365">
    <img src="thumbnail.jpg" />
</a>    
    
*/
var FancyBox = {
	
	showClass : ".js__show-popup",
	closeClass : ".js__close-popup",
	gallaryClass: ".js__fancybox",
	// Отпции по умолчанию
	Opt : {type: "inline"}, 

	init: function() {
		var self = this;
		
		$(document).on('click', self.showClass, function(){
			self.show ($(this).data("block"), self.Opt);
		});
		
		$(document).on('click', self.closeClass, function(){
			$.fancybox.close();
		});
		
		$(self.gallaryClass).fancybox(self.Opt);
	},

	// показать модальное окно
	show: function(block, opts) {
    $.fancybox.open($(block), opts);
	},
};

$(document).ready(function() {
	FancyBox.init();
});
