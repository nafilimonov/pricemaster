<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Catalog extends Controller_Core {

	
	public function action_index()
	{
	
	if( !$this->arResult['sections'] = Cache::instance()->get('menuSection'))
    {  
    //var_dump($this->arUser['iblock_catalog']);
    	$this->arResult['sections'] = Model::factory($this->modelCRM)->getSections($this->arUser['iblock_catalog']);
		  Cache::instance()->set('menuSection', $this->arResult['sections'], Date::HOUR * 12);
    }

		
	/*foreach ($this->arResult['sections']['ITEMS'] as $key => $value) {
		# code...
	}*/
	$this->SetContent('catalog');

	}
	public function action_products()
	{
		if ($iblock_id = $this->request->param('id')) {
			$this->arResult['sections'] = Model::factory($this->modelCRM)->getSections($iblock_id);
			$this->arResult['items'] = Model::factory($this->modelCRM)->getItems(false, $iblock_id);
			$this->SetContent('products');
		}
	}
	public function action_section()
	{
		if ($section_id = $this->request->param('id')) {
			$this->arResult['sectionId'] = $section_id ; 

			$this->arResult['sectionsInfo'] = Model::factory($this->modelCRM)->getSectionsInfo($section_id);
			//$this->arResult['sections'] = Model::factory($this->modelCRM)->getSections($iblock_id);
			$this->arResult['countPage'] = Model::factory($this->modelCRM)->getCountPage($section_id,$this->arUser['iblock_catalog']);
			if(isset($_GET['page'])){
			$this->arResult['items'] = Model::factory($this->modelCRM)->getItems($section_id,$this->arUser['iblock_catalog'],intval($_GET['page']));
			$this->arResult['page'] = $_GET['page'];	
			
			} 
			else{
			$this->arResult['items'] = Model::factory($this->modelCRM)->getItems($section_id,$this->arUser['iblock_catalog']);
			
			}
			$this->SetContent('items');
		}
	}


public function action_editsection()
	{
		if ($section_id = $this->request->param('id')) {
			$this->arResult['sectionId'] = $section_id ;
			$this->arResult['sectionsInfo'] = Model::factory($this->modelCRM)->getSectionsInfo($section_id);
			$this->SetContent('sectionedit');
	}
		if (isset($_POST['ID']) && isset($_POST['NAME']) ) {
			$section_id = $_POST['ID'];
			$name = $_POST['NAME'];
		  $q = Model::factory($this->modelCRM)->updateSection($section_id,$name);
		  //var_dump($q);
			//$this->arResult['sectionId'] = $section_id ;
			//$this->arResult['sectionsInfo'] = Model::factory($this->modelCRM)->getSectionsInfo($section_id);
			//$this->SetContent('sectionedit');

	}
}

public function action_detail()
	{
		if ($element_id = $this->request->param('id')) {
			$this->arResult['elementId'] = $element_id ;
			$this->arResult['elementInfo'] = Model::factory($this->modelCRM)->getElement($element_id);
			$this->SetContent('detail');
	}
		if (isset($_POST['ID']) && isset($_POST['NAME']) ) {
			//Model::factory($this->modelCRM)->updateElement($_POST['ID'],['NAME'=>$_POST['NAME']]);
			//$this->redirect('/catalog/detail/'.$_POST['ID']);
			$PRICE = [];
			for ($i=1; $i <=$_POST['COUNT_PRICE'] ; $i++) { 
				$PRICE[$i]['CATALOG_GROUP_NAME'] = $_POST['CATALOG_GROUP_NAME-'.$i];
				$PRICE[$i]['PRICE'] = $_POST['PRICE-'.$i];
				$PRICE[$i]['CURRENCY'] = $_POST['CURRENCY-'.$i];
				$PRICE[$i]['CATALOG_GROUP_ID'] = $_POST['CATALOG_GROUP_ID-'.$i];
				$PRICE[$i]['ID'] = $_POST['ID-'.$i];
							
			}
			//var_dump($PRICE);
			Model::factory($this->modelCRM)->updateElement($_POST['ID'],['NAME'=>$_POST['NAME']]);
			Model::factory($this->modelCRM)->updateElementPrice($_POST['ID'],$PRICE);
			$this->redirect('/catalog/detail/'.$_POST['ID']);
			/*$section_id = $_POST['ID'];
			$name = $_POST['NAME'];
		  $q = Model::factory($this->modelCRM)->updateSection($section_id,$name);
		  var_dump($q);*/
			

	}
}



}