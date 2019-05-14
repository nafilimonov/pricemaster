<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Bitrix_IblockSection
{
	private $_db = 'bitrix';

  /**
   * 
   *
   * @return array
   */
  public function getSections($iblock_id, $level = 1){
    $arReturn = Api::request('section.getlist',['iblock_id'=>$iblock_id,'level'=>$level]);
  	
    /*$arReturn = DB::select("NAME","ID","IBLOCK_SECTION_ID","DEPTH_LEVEL","DESCRIPTION")
        ->from('b_iblock_section')
        ->where('IBLOCK_ID', '=', $iblock_id)
        //->where('DEPTH_LEVEL', '=', $level)
        ->execute($this->_db)
        ->as_array('ID');*/

    return $this->ConsctructMenu($arReturn);
  }
  
  public function getSectionsInfo($section_id, $level = 1){
    $arReturn = Api::request('section.get',['section_id'=>$section_id]);
    /*$arReturn = DB::select("NAME","ID","IBLOCK_SECTION_ID","DEPTH_LEVEL","DESCRIPTION")
        ->from('b_iblock_section')
        ->where('ID', '=', $section_id)
        //->where('DEPTH_LEVEL', '=', $level)
        ->execute($this->_db)
        ->as_array();*/

    return $arReturn;
  }


  private function ConsctructMenu($arResult){

    $arReturn = array();
    $arChilde = array();

    foreach ($arResult as $key => $sect) {
      if ($sect['IBLOCK_SECTION_ID'] > 0 ) {
        $arChilde[$sect['IBLOCK_SECTION_ID']][] = $sect;
        unset($arResult[$key]);
      }
    }

    foreach ($arResult as $sec) {
      $arReturn[$sec["ID"]] = $sec;
      if (isset($arChilde[$sec["ID"]])) {
        foreach ($arChilde[$sec["ID"]] as $sec2) {
          $arReturn[$sec["ID"]]['ITEMS'][$sec2["ID"]] = $sec2; 
          if (isset($arChilde[$sec2["ID"]])) {
            foreach ($arChilde[$sec2["ID"]] as $sec3) {
              $arReturn[$sec["ID"]]['ITEMS'][$sec2["ID"]]['ITEMS'][$sec3["ID"]] = $sec3;
              if (isset($arChilde[$sec3["ID"]])) {
                foreach ($arChilde[$sec3["ID"]] as $sec4) {
                  $arReturn[$sec["ID"]]['ITEMS'][$sec2["ID"]]['ITEMS'][$sec3["ID"]]['ITEMS'][$sec4["ID"]] = $sec4;
                  if (isset($arChilde[$sec4["ID"]])) {
                    foreach ($arChilde[$sec4["ID"]] as $sec5) {
                      $arReturn[$sec["ID"]]['ITEMS'][$sec2["ID"]]['ITEMS'][$sec3["ID"]]['ITEMS'][$sec4["ID"]]['ITEMS'][$sec5["ID"]] = $sec5;
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
    return $arReturn;   
  }

  public function updateSection($section_id, $name){ 
    return Api::request('section.update',['id'=>$section_id,'name'=>$name]);
  }
 

}
