<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Core extends Controller_Template {

  public $auth = ""; 
  public $arParams = array();
	public $arResult = array();
	public $arErrors = array();
	public $arSuccess = array();
  public $arDump = array();
  public $arBreadcrumb = array();
  public $arUser = array(); 
  public $modelCRM = "";

  public function checkAuth(){
    $user = $this->auth->get_user();
    
    if (!$user)
    {
      $this->redirect('/user/login/');
    }
    
  }

	public function before()
	{
		parent::before();

    $this->auth = Auth::instance();
	  $this->session = Session::instance();
	  $this->class_id = Get_class($this);

		$this->template->title = '';
		$this->template->description = '';
		$this->template->content = '';
    //проверка на авторизацию
    $this->checkAuth();
		// Данные пользователя
    $user = $this->auth->get_user();
    
    if ($user){
     
    $this->arUser = array (
      "user"        => $this->auth->get_user()->as_array(),
      "user_name"   => $this->auth->get_user()->username,
      "user_id"     => $this->auth->get_user()->id,
      "user_roles"  => $this->user_roles(),
      'iblock_catalog' => $this->auth->get_user()->iblock_catalog,
      'siteurl' => $this->auth->get_user()->siteurl,
      
      /*"is_admin"    => $this->auth->logged_in('admin'),
      "is_client"   => $this->auth->logged_in('client')*/
      );
    }
    
  	// Параметры
    $this->arParams = array (
	    "page_num" 		  => $this->request->param('page')
    );

    $this->modelCRM = 'Bitrix';
    //$this->template->menu = $this->getMenu();
    //тут кеш
    
  }

	/**
 	* Контент страницы
  *
 	* @param string tmp
 	*/
	public function setContent($tmp)
  {
    // данные для всех страниц
  	$this->template->arErrors    = $this->session->get('error');
    $this->template->arSuccess   = $this->session->get('success');
    $this->template->arParams    = $this->arParams;
    $this->template->arUser      = $this->arUser;
  	$this->template->arResult    = $this->arResult;
    

    // даные для отладки
    $this->template->arDump = array(
      'arResult'  => $this->arResult,
      'arUser'    => $this->arUser,
      'arParams'  => $this->arParams,
      'arErrors'  => $this->session->get('error'),
      'arSuccess' => $this->session->get('success')
    ); 

    // меню
    //$this->template->menu = $this->getMenu();

    //хлебные крошки
    //$this->template->breadcrumb = $this->getBreadcrumb();
    
    // данные сессии
    //$this->session->delete('error');
	  //$this->session->delete('success');
    
    // подключение шаблона
  	$this->template->content = View::factory($tmp)
      ->bind('arUser', $this->arUser)
      ->bind('arParams', $this->arParams)
      ->bind('arResult', $this->arResult)
      ->bind('arErrors', $this->arErrors)
      ->bind('arSuccess', $this->arSuccess);
  }
  
  
  /**
    * Роли пользователя
    *
    */
  public function user_roles() {
    return $this->auth->get_user()->roles->find_all()->as_array(NULL,'name');
  }

} // End Welcome
