

<form method="post" action = "/cabinet/edit/">
email
<input type = "text" value = "<?=$arResult['user']["email"]?>" name = "email">
username
<input type = "text" value = "<?=$arResult['user']['username']?>" name = "username">
password
<input type = "password" value = "" name = "password">
password_confirm
<input type = "password" value = "" name = "password_confirm">
iblock_catalog
<select name = "iblock_catalog">
<? 
if(isset($arResult['iblock']))
foreach ($arResult['iblock'] as $key => $value) {
	if($key == $arResult['user']['iblock_catalog']){
		echo '<option selected="selected" value = "'.$key.'">'.$value.'</option>';
	}
	else{
		echo '<option value = "'.$key.'">'.$value.'</option>';
	}
}
?>
</select>
site_url
<input type = "text" value = "<?=$arResult['user']['siteurl']?>" name = "siteurl">
token
<input type = "text" value = "<?=$arResult['user']['token']?>" name = "token">
<button name = "id" value = "<?=$arResult['user']['username']?>" type ="submit">edit</button>
</form> 
