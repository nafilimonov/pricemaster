<h2>Поставщики</h2>

<? if (!empty ($arResult['suppliers']['ITEMS'])):?>
<table class="table table-striped table-hover">
	<thead>
		<tr>
		  <th>Название</th>
		  <th>Описание поставщика</th>
		</tr>
	</thead>
	<tbody>
		<?foreach ($arResult['suppliers']['ITEMS'] as  $supplier ):?>
			<tr>
				<td><?=$supplier['name']?></td>
				<td>
					<b>E-mail:</b> <?=$supplier['email']?> <br>
					<b>Менеджер:</b> <?=$supplier['manager']?> <br>
					<b>Город:</b> <?=$supplier['city']?> <br>
					<b>Условия отгрузки:</b> <?=$supplier['shipment']?> <br>
					<b>Право на возврат:</b> <?=($supplier['ret'] == 'Y')? 'Да': 'Нет'?> <br>
				</td>
			</tr>
			
		<?endforeach;?>
	</tbody>
</table>  
<?else:?>
	<div class="alert alert-warning margin" role="alert">Нет ни одно поставщика.</div>
<?endif;?>	  

<?//echo "<pre>"; print_r ($arResult);?>
