<?
if(isset($arResult['sectionsInfo']['NAME']))
echo'<h1>'.$arResult['sectionsInfo']['NAME'].'</h1>';
?>
<a href = /catalog/editsection/<?=$arResult['sectionId']?>>Редактировать раздел</a>
<?
foreach ($arResult['items'] as $item) {
/*	echo '<form name = "'.$item["ID"].'" action = "/catalog/edit/'.$item["ID"].'" method = "POST">';
		echo  '<input type="text" value = "'.$item["NAME"].'" name = "NAME">';
		echo "<p><input type='submit' value='Отправить'>";
	echo '</form>';
*/	echo "<li><a href = '/catalog/detail/".$item['ID']."'>".$item["NAME"]."</a></li>";
}

?>

<div aria-label="Page navigation example">
  <ul class="pagination" style = "overflow-x:hidden;">
  	<?
if(!isset($arResult['page']) || $arResult['page'] < 6){

	for ($i=1; $i < 12; $i++) {
	if($i < $arResult['countPage']) 
	echo '<li class="page-item"><a class="page-link" href="/catalog/section/'.$arResult['sectionId'].'/?page='.$i.'">'.$i.'</a></li>';
	}
	echo '<li class="page-item"><a class="page-link" href="/catalog/section/'.$arResult['sectionId'].'/?page='.$arResult['countPage'].'">'.$arResult['countPage'].'</a></li>';
	}
	
else{
	if($arResult['countPage'] > 12) 
	echo '<li class="page-item"><a class="page-link" href="/catalog/section/'.$arResult['sectionId'].'/?page=1">1</a></li>';
		if($arResult['page'] <= $arResult['countPage'])
			for ($i=($arResult['page']-5); $i < ($arResult['page']+6) ; $i++) { 
				if($i < $arResult['countPage'])
					echo '<li class="page-item"><a class="page-link" href="/catalog/section/'.$arResult['sectionId'].'/?page='.$i.'">'.$i.'</a></li>';
					}
	echo '<li class="page-item"><a class="page-link" href="/catalog/section/'.$arResult['sectionId'].'/?page='.$arResult['countPage'].'">'.$arResult['countPage'].'</a></li>';
	
}
  	?>
    
  </ul>
</div>

</pre>