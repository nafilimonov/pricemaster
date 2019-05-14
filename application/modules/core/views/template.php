<? if (Request::current()->is_ajax() ) {
	echo $content;
} else {?>
<!doctype html>
<html lang="ru">
<head> 
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<meta name="description" content="Example Auth with ORM for Kohana 3.1" /> 
	<meta name="author" content="JDStraughan" /> 
	<meta name="copyright" content="Copyright 2011. JDStraughan.com" />
	<meta name="language" content="en-us" /> 


	<link rel="stylesheet" href="/public/css/bootstrap/bootstrap-grid.min.css">

  <!-- font-awesome 4.6.3 -->
  <link href="/public/css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  
  <!-- fancybox 3 -->
  <link href="/public//libs/fancybox.v3/jquery.fancybox.min.css" rel="stylesheet" type="text/css">
  
  <!-- styles -->
  <link href="/public/css/fonts.css" rel="stylesheet" type="text/css">
  <link href="/public/css/typography.css" rel="stylesheet" type="text/css">
  <link href="/public/css/general.css" rel="stylesheet" type="text/css">
  <link href="/public/css/button.css" rel="stylesheet" type="text/css">
  <link href="/public/css/form.css" rel="stylesheet" type="text/css">
  <link href="/public/css/utilities.css" rel="stylesheet" type="text/css">
	<link href="/public/css/effect.css" rel="stylesheet" type="text/css">
	<link href="/public/css/styles.css" rel="stylesheet" type="text/css">
	<link href="/public/css/media.css" rel="stylesheet" type="text/css">
<!--   <link type="text/css" rel="stylesheet" href="/public/css/demo.css" />
		<link type="text/css" rel="stylesheet" href="/public/dist/mmenu.css" /> -->
		<link rel="stylesheet" href="/public/css/jquery.treeview.css">

  <!--[if lte IE 9]>
  	<link href="/public/css/lte-ie9.css" rel="stylesheet" type="text/css" />
	<![endif]-->
  <!--[if lt IE 9]>
		<script type="text/javascript" src="/public/libs/js/html5shiv-3.7.2.min.js"></script>
		<script type="text/javascript" src="/public/libs/js/css3-mediaqueries-1.0.min.js"></script>
	<![endif]-->
<style type="text/css">

.menu{
	float:left;
	position: fixed;
}		
footer{
	text-align: center;
}

.login{
	float:right;
	margin-right: 100px;
}
header{
	
	background-color: #f5f5f5;
}
ul.pagination {
    margin: 0; /* Обнуляем значение отступов */
    padding: 4px; /* Значение полей */
   }
ul.pagination li {
		display: inline; /* Отображать как строчный элемент */
		margin-right: 5px; /* Отступ слева */
		border: 1px solid #000; /* Рамка вокруг текста */
		padding: 3px; /* Поля вокруг текста */
}

</style>
</head> 
<body>
	<header>
		<div class = "row">
		<h3 class = "col-md-3">Pricemaster</h3>
		<div class = "col-md-3 offset-6">
			<a href = "/cabinet">Личный кабинет</a>
		</div>
	</div>
	</header>

	<div class = "menu">
		<nav>
			<ul class="nav">
				<li><a href = "/catalog">Каталог</a></li>			
				<li><a href = "/provisioner">Поставщики</a></li>
				<li><a href = "/models">Модели</a></li>
				<li><a href = "/price">Наценки/цены</a></li>
				<li><a href = "/marka">Марки</a></li>					
			</ul>
		</nav>
	</div>		

	<div class = "container">
		<div id="content">
			<?= $content; ?>		
		</div>
	</div>

	<footer class="footer">
		<div class="container">
			<div class ="row">
				<div class = "col">
					<span class="text-muted">Pricemaster 2019</span>
				</div>
			</div>
		</div>
	</footer>
<div style="display: none;" id="modalbox">
</div>
<script src="/public/libs/jquery/jquery-3.3.1.min.js"></script>
	<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 -->
	<!-- fancybox -->
	<script type="text/javascript" src="/public/libs/fancybox.v3/jquery.fancybox.min.js"></script>
  <script type="text/javascript" src="/public/js/fancybox.v3.js"></script> 
	<!-- slick-slider -->
	<!-- <script type="text/javascript" src="/public/libs/slick-1.8.0/slick.min.js"></script>
 -->	<!-- maskedinput -->
<!-- 	<script type="text/javascript" src="/public/libs/maskedinput/jquery.maskedinput.min.js"></script>
 -->	<!-- validate -->
<!-- 	<script type="text/javascript" src="/public/libs/validate/jquery.validate.js"></script>
	<script type="text/javascript" src="/public/libs/validate/jquery.form.js"></script>
	<script type="text/javascript" src="/public/js/form-ajax.js"></script>
 -->  <!-- ajaxloader-->
<!-- 	<script type="text/javascript" src="/public/libs/ajaxloader/ajaxloader.js"></script>
 -->	
	<!-- modulargrid
	<script type="text/javascript" src="/public/libs/modulargrid/modulargrid.js"></script>-->
	<script type="text/javascript" src="/public/js/main.js"></script>
  <!-- <script src="/public/dist/mmenu.js"></script> -->
  <script src="/public/js/jquery.treeview.js"></script>
	<!-- <script src="/public/js/autocomplete.js"></script>
   <script src="/public/js/ajax.js"></script>
   --> <!-- <script src="/public/js/finderSelect.js"></script> -->
	<!-- <script src="/public/src/mmenu.debugger.js"></script>
  <script>
			new Mmenu( document.querySelector( '#menu' ) );

			document.addEventListener( 'click', ( evnt ) => {
				let anchor = evnt.target.closest( 'a[href^="#/"]' );
				if ( anchor ) {
					alert('Thank you for clicking, but that\'s a demo link.');
					evnt.preventDefault();
				}
			});
		</script>
		 -->
		<script>
$('#tree-radio').treeview({
	collapsed: true,
	animated: 'medium',
	unique: true
});
</script>


</body>
</html>
<?}?>