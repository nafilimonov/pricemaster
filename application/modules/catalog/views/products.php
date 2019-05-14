<?
/*foreach ($arResult['sections'] as $value) {
	
	echo '<a href = "/catalog/detail/'.$value['ID'].'">'.$value["NAME"].'</a><br>';
}*/
#echo '<pre>';
#print_r($arResult['sections']);
#echo '</pre>';

HTML::printMenuSections($arResult);

foreach ($arResult['items'] as $value) {
	
	echo '<a href = "/catalog/productsdetail/'.$value['ID'].'">'.$value["NAME"].'</a><br>';
}
?>