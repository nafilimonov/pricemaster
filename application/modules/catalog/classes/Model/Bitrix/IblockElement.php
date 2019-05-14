<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Bitrix_IblockElement
{
	private $_db = 'bitrix';

  /**
   * Получение списка с елементами по категориям
   *
   * @return array
   */
  public function getElements($section_id = 0, $iblock_id, $page){
    return Api::request('elements.get',['section_id'=>$section_id,'iblock_id'=>$iblock_id,'page'=>$page]);    
  }
  public function getCountPage($section_id, $iblock_id = 18){
    $arResult = Api::request('elements.getCount',['section_id'=>$section_id,'iblock_id'=>$iblock_id]);
    return intval($arResult[0]/20);
  }
  public function getElement($element_id){
    $arResult = Api::request('element.get',['element_id'=>$element_id]);
    return $arResult;
  }
  public function updateElement($element_id,$arFields){
    $arResult = Api::request('element.update',['element_id'=>$element_id],$arFields);
    return $arResult;
  }
  public function updateElementPrice($element_id,$price){
    $arResult = Api::request('element.updatePrice',['element_id'=>$element_id],$price);
    return $arResult;
  }
}
