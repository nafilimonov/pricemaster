<?
//var_dump($arResult['elementInfo']["PRICE"]);
?>
<form method="POST" action = "/catalog/detail/">
Фото:<br>
<img src = "http://udarnik.10bukv.ru/<?=$arResult['elementInfo']['PREVIEW_PICTURE']?>">
<br>Название<br>
<input type="text" name="NAME" value="<?=$arResult['elementInfo']['NAME']?>">
<br>Цены<br>
<ul>
<?
$i=0;
foreach ($arResult['elementInfo']["PRICE"] as $price) {
	//echo '<li>'.$price['CATALOG_GROUP_NAME'].' - '.$price["PRICE"].' '.$price["CURRENCY"].' </li>';
	$i++;
	?>
	
	<input type="text" name="CATALOG_GROUP_NAME-<?=$i?>" value="<?=$price['CATALOG_GROUP_NAME']?>"> 
	<input type="text" name="PRICE-<?=$i?>" value="<?=$price["PRICE"]?>">
	<input type="text" name="CURRENCY-<?=$i?>" value="<?=$price["CURRENCY"]?>">
	<input type="hidden" name="CATALOG_GROUP_ID-<?=$i?>" value="<?=$price["CATALOG_GROUP_ID"]?>">
	<input type="hidden" name="ID-<?=$i?>" value="<?=$price["ID"]?>">
	------
	<?
}

?>
<input type="hidden" name="COUNT_PRICE" value="<?=$i?>">

</ul>
<button name = "ID" value = "<?=$arResult['elementInfo']['ID']?>">edit</button>
</form>