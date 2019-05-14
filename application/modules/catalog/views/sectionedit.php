
<form method="POST" action = '/catalog/editsection'>
<input type="text" size="40" value = "<?=$arResult['sectionsInfo']['NAME']?>" name = "NAME">
 <p><button name = "ID" value = "<?=$arResult['sectionsInfo']['ID']?>" type ="submit">edit</button>
 </form>
