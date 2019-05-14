<?php defined('SYSPATH') or die('No direct script access.');
 
class Html_Edit {

	private $url = "";
	
	private $page_del = "del";
	private $page_edit = "edit";
	private $page_add = "add";
	private $page_ajax = "ajax";
	
	private $edit_action = "edit_";
	private $del_action = "del_";
	private $add_action = "add_";
	
	private $factory = "";
	
	private $table = "";
	private $arResult = "";
	private $arParams = "";

	function __construct($url = false) {
    $this->url = $url;
 	}
	
	function Init($url, $factory, $table, $arResult, $arParams) {
		// страница родителя
		$this->url = $url;
		//класс
		$this->factory = $factory;
		// страницы событий
		$this->edit_action = $this->edit_action.$factory;
		$this->del_action = $this->del_action.$factory;
		$this->add_action = $this->add_action.$factory;
		//таблица
		$this->table = $table;
		//массиб БД
		$this->arResult = $arResult;
		$this->arParams = $arParams;
 	}

	/* КНОПКИ */
	public function Edit($id)
	{
		?>
		<span 
			data-id="<?=$id;?>" 
			data-factory="<?=$this->factory;?>" 
			data-url="/<?=$this->url?>/<?=$this->page_edit?>/"  
			title="Изменить" 
			class="btn btn-success js__getModal">
			<i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
		</span>
    <?
	}

	public function Add () {
		?>
		<span 
			data-id="" 
			data-factory="<?=$this->factory;?>" 
			data-url="/<?=$this->url?>/<?=$this->page_add?>/"
			title="Добавить" 
			class="btn btn-primary js__getModal">
			<i class="fa fa-plus fa-fw" aria-hidden="true"></i>Добавить
		</span>
    <?
	}

	public function Del($id) {
		?>
		<span 
			title="Удалить" 
			class="btn btn-danger" 
			onclick="return confirmDelete_v2('<?=URL::site($this->url.'/del/'.$id);?>');" >
		<i class="fa fa-trash fa-fw" aria-hidden="true"></i>
		</span>
    <?
	}
  
  /* КНОПКИ */
	public function Copy($id)
	{
		?>
		<a 
      href="<?=URL::site($this->url.'/copy/'.$id);?>"
			title="Скопировать" 
			class="btn btn-primary" 
			onclick="return confirmDelete();" >
		<i class="fa fa-files-o fa-fw" aria-hidden="true"></i>
		</a>
    <?
	}
	
	/*ТАБЛИЦА*/
	
	public function Table($actions = false, $showBtn = true) {
		
		$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
		?>
		<form action="/<?=$this->url?>/<?=$this->page_ajax?>/" class="form-inline form_ajax_table" method="post" id="form">
		<table class="table table-striped table-hover" id="selectTable">
			<thead>
				<tr>
					 <td width="2%"><input type="checkbox"></td> 
					<? foreach ($this->table as $index):?>
					<th> 
						
						<? # Сортировка ?>
						
						<?=$index["NAME"]?>
						
					</th>
					<? endforeach;?>
					<?if($showBtn):?><th></th><?endif;?>

				</tr>
			</thead>
		 <tbody>

			<? foreach ($this->arResult["items"] as $index => $arItem):?>
			<tr class="js__label">
				<td><input type="checkbox" name="id[]" value="<?=$arItem["id"]?>"></td>
				<? foreach ($this->table as $name):?>
				<td <? if (isset($name["save"]) && $name["save"]):?>class="safezone"<?endif;?>>
					<? if (isset($name["url"]) && $name["url"]):?>
						<a href="/<?=$this->url?><?=$name["url"]?><?=$arItem["id"]?>/">
					<?endif;?>
					<? if (isset($name["link"]) && $name["link"]):?>
						<a href="<?=$arItem[$name["ROW"]]?>" target="_blank">
					<?endif;?>
					<?=$arItem[$name["ROW"]]?>
					<? if ((isset($name["url"])) && ($name["url"] || $name["link"])):?></a><?endif;?>
				</td>
				<? endforeach;?>
				<?if($showBtn):?>
				<td class="safezone" align="right">
          <? //if ($this->arParams["COPY"]):?>                                
             <?// $this->Copy($arItem["id"]); ?>                             
          <?//endif;?>                                
					<? $this->Edit($arItem["id"]); ?>
					<? $this->Del($arItem["id"]); ?>
				</td>
				<?endif;?>
			</tr>
			<? endforeach;?>
			</tbody>
		</table>
  	<div class="bottom_form_send ">
  		<div class="row">
  			<div class="col-md-4">
					<select class="form-control" name="action"> 
						<option value="del">Удалить</option> 
						<? if ($actions):?>
						<? foreach ($actions as $action): ?>
							<option value="<?=$action["value"]?>"><?=$action["name"]?></option> 
						<? endforeach;?>
						<? endif;?>
					</select>
					<button type="submit" class="btn btn-default">Выполнить</button>
				</div>

				<div class="col-md-8  text-right"><? $this->ViwePage(); ?></div>
  		</div>
		</div>
   	</form>
   	<!-- <script type="text/javascript" src="/public/js/finderSelect.js"></script> -->
    <?
	}
	
	/* ПАГИНАЦИЯ */
	function ViwePage () {
		
		$url = (isset ($this->arParams["URL"])) ? $this->arParams["URL"] : $this->url ;
		$pages = $this->arResult["COUNT_PAGE"];
		$cur_page = $this->arParams["PAGE"];
		
		$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
		if (strlen ($query) > 0 )
			$query = "?".$query;
		
		if (!$cur_page) return true;
		?>
		<nav aria-label="page navigation">
			<ul class="pagination">
				<? 
				for ( $i = 1; $i <= $pages; $i++) :
					$class = "";
					if ($i == $cur_page) $class = ' class="active"';
					$href = "/".$url."/page-".$i."/".$query;
					if ($i == 1) $href = "/".$url."/".$query;
				?>
				<li<?=$class?>><a href="<?=$href?>"><?=$i?></a></li>
				<? endfor ?>
			</ul>
		</nav>
		<?
	}
	
}
