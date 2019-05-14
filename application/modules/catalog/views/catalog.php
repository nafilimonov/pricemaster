
<style>
.treeview label {
	margin: 0;
	display: inline-block;
	font-size: 12px;
	font-weight: normal;
	line-height: 14px;
	vertical-align: top;
	cursor: pointer;
}
.treeview input {
	margin: 0;
	padding: 0;
	vertical-align: top;
}
</style>


<ul id="tree-radio" class="treeview">
<?
/*foreach ($arResult['catalog'] as $value) {
	//var_dump($value);
	echo '<a href = "/catalog/products/'.$value['ID'].'">'.$value["NAME"].'</a><br>';
}*/


HTML::printMenuSections($arResult['sections']);
	


?>
</ul>

   