<?

$setting = array(
	array(
		'name' => "ID", 
		'row' => "id", 
		'width' => 5,
		'sort_by' => "id"
	),
	array(
		'name' => "Название", 
		'row' => "name", 
		'width' => 70,
		'sort_by' => "name",
		"save" => true,
		'url' => "/item/"
	),
);

?>
<div class="row">
	<div class = "col-md-12">
		<?=Html_Admin::getTable($arResult,$setting)?>
	</div>
</div>
<div class="row">
	<div class = "col-md-12">
		<?=Html_Admin::getPagination($arResult)?>
	</div>
</div>
<style type="text/css">
#feedback {display:none;}
</style>
 

