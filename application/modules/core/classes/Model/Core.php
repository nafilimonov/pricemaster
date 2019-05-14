<?php defined('SYSPATH') or die('No direct script access.');
 
abstract class Model_Core extends Model {
 
	protected $table;
	protected $pages; 
	protected $on_page = 20;
	
	/**
   * Получить список
   */
	public function GetList($where = false, $page = 1, $order = false, $group = false, $as = "id") {
		
		$dbItems = $this->SelectGetList();
		
		if ($group) {
			$dbItems = $dbItems->group_by($group);
		}
		
		

		if ($where) {
			foreach ($where as $key => $value) {
				$dbItems = $dbItems->where($value[0],$value[1],$value[2]);
			}
		}
		
		if ($page) {
			$totalRows = DB::select(array(DB::expr('COUNT(*)'), 'count'))
				->from($this->table);
			
			if ($where) {
				foreach ($where as $key => $value) {
					$totalRows = $totalRows->where($value[0],$value[1],$value[2]);
				}
			}
			
			$totalRows = $totalRows->execute()->get('count', 0);
			$pages = ceil($totalRows/$this->on_page);
			
			$start = ($page - 1)*$this->on_page;
			$dbItems = $dbItems->limit($this->on_page)->offset($start);

		}
		
		if ($order) {
			foreach ($order as $key => $value) {
				$dbItems = $dbItems->order_by($value[0], $value[1]);
			}
		}
		
		$arReturn["items"] = $dbItems->execute()->as_array($as);
		$arReturn["page_num"] = $pages;
		$arReturn["COUNT_PAGE"] = $pages;
		return $arReturn;
  }
	
	public function GetUrl() {
  	return $this->url;
  }
	
	public function GetFactory() {
  	return $this->factory;
  }
  
	/*
	 * Select для GetList
	 */
	protected function SelectGetList () {
		return DB::select('*')->from($this->table);
	}


	
	/**
   * Получить по ID
   */
	public function GetByID($id) {
		$arReturn = DB::select('*')
			->from($this->table)
			->where('id', '=', $id)
			->execute()
			->as_array();
		return end($arReturn);
  }
	
	/**
   * Обновить запись
   */
	public function Update ($arFields, $id) {
		return DB::update($this->table)
			->set($arFields)
			->where('id', '=', $id)
			->execute();
	}
	
	/**
   * Удалить по ID
   */
	public function Delete($id) {
		return DB::delete($this->table)
			->where('id', '=', $id)
			->execute();
	}
	
	/**
   * Добавить
   */
	public function Add ($arFields, $user_id = false) {
    if ($user_id) $arFields['user_id'] = $user_id;
		$arColVal = $this->GetColVal($arFields); 
		
		list($insert_id, $affected_rows) = DB::insert($this->table, $arColVal["columns"])
			->values($arColVal["values"])
			->execute();

		return $insert_id;
	}
	
	/**
   * Очистить таблицу
   */
	public function ClearTable () {
		return DB::delete($this->table)->execute();
	}
	
	/**
   * Подготовка для Add
   */
	public function GetColVal($arFields)
	{
		$columns = array(); 
		$values = array(); 
		
		foreach ($arFields as $key => $value)
		{
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else
			{			
				$values[] = "$value";
			}
		}
		
		return array (
			"columns" => $columns,
			"values" => $values
		);
	}
	
}