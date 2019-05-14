<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Cabinet extends Controller_Core {
	

	public function action_index()
	{
		
				$this->arResult['user'] = Model::factory('Users')->GetById($this->arUser["user_id"]);
				$catalog = Model::factory($this->modelCRM)->getCatalog(); 
				if($catalog)
				$this->arResult['iblock'] = $catalog;
				$this->SetContent('cabinet');
			
		
	}



public function action_edit()
	{
		if(!empty($_POST['username']) && !empty($_POST['email']) && $_POST['id'] == $this->arUser["user_name"]){
			//тут добавления сообщения в бд
			if(isset($_POST['iblock_catalog']) && $_POST['iblock_catalog'] != $this->arUser["iblock_catalog"])
			 Cache::instance()->delete_all();
			
			$username = $_POST['id'];
			unset($_POST['id']);
		ORM::factory('User')
		->where('username', '=', $username)
	 	->find()
	 	->update_user($_POST, array(
	 		'username',
	 		'password',
	 		'email',
	 		'iblock_catalog',
	 		'siteurl',
	 		'token'
	 	));

			$this->redirect('/cabinet/');
		}
}

}

