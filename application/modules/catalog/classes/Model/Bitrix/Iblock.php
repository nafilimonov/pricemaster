<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Bitrix_Iblock
{
    private $_db = 'bitrix';

    /**
     * Получение инфоблоков с товарами
     *
     * @param string $type = 'catalog'
     * @return array
     */

    public function getIblock(){
    return Api::request('api.getIblock',[]);    
  }
}
