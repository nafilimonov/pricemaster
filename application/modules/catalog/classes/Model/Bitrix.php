<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Bitrix extends Model_Crm
{
    public function getCatalog(){
      return Model::factory('Bitrix_Iblock')->getIblock();   
    }
    public function getSections($iblock_id){
      return Model::factory('Bitrix_IblockSection')->getSections($iblock_id);
    }
    public function getItems($secton_id, $iblock_id, $page = 1){
      return Model::factory('Bitrix_IblockElement')->getElements($secton_id, $iblock_id, $page);	
    }
    public function getCountPage($secton_id, $iblock_id){
      return Model::factory('Bitrix_IblockElement')->getCountPage($secton_id, $iblock_id);	
    }
    public function getSectionsInfo($secton_id){
      return Model::factory('Bitrix_IblockSection')->getSectionsInfo($secton_id);	
    }
    public function updateSection($secton_id, $name){
      return Model::factory('Bitrix_IblockSection')->updateSection($secton_id, $name);  
    }
     public function getElement($element_id){
      return Model::factory('Bitrix_IblockElement')->getElement($element_id);  
    }
    public function updateElement($element_id, $arFields){
      return Model::factory('Bitrix_IblockElement')->updateElement($element_id,$arFields);  
    }
     public function updateElementPrice($element_id, $arFields){
      return Model::factory('Bitrix_IblockElement')->updateElementPrice($element_id,$arFields);  
    }
}
