<?php defined('SYSPATH') or die('No direct script access.');
 
class Html_Admin {

	function __construct() {

 	}
	
	static public function getTable($arResult, $setting){
	$url = strtolower(Request::current()->controller());
   ?>	
	   <table class="table">
      <thead class="thead-dark">
        <tr>
      <?
      foreach ($setting as $key => $value):?>
          <td><?=$value['name']?></td>
        <?endforeach;?>
        <td>edit</td>
        <td>delete</td>
        </tr>
      </thead>
      <tbody>
        <?foreach($arResult['items'] as $item):?>
          <tr>
          <?foreach ($setting as $key => $value):?>
            <td><?=$item[$value['row']]?></td>
          <?endforeach;?> 
            <td><button data-option = '{"url":"<?='/'.$url.'/edit'?>","id":"<?=$item['id']?>"}' class = "js__getModal"><i class="fal fa-fw fa-pen"></i></button></td>
            <td><button onclick = "return confirmDelete_v2('<?='/'.$url.'/del/'.$item['id']?>');"><i class="fal fa-fw fa-trash"></i></button></td>
        <?endforeach;?>
        </tr>
      </tbody>
    </table>
			<?
		}

  static public function getPagination($arResult){
  $url = strtolower(Request::current()->controller());
  ?>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
     <?
     for ($i=1; $i <= $arResult['page_num'] ; $i++): 
     ?> 
       <li class="page-item"><a class="page-link" href="/<?=$url?>/page-<?=$i?>"><?=$i?></a></li>  
     <?
     endfor;
     ?> 
    </ul>
  </nav>
  <?
  }
	}
	

