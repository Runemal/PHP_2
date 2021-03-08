<?php
//
// Базовый контроллер сайта.
//
include 'm/M_User.php';

abstract class C_Base extends C_Controller
{
	protected $title;		// Заголовок сайта
	protected $content;		// Содержание сайта
    protected $keyWords;    //Ключевые слова

    function __construct(){

    }

     protected function before(){

		$this->title = 'C_base в начале';
		$this->content = '';
		$this->keyWords="...";

	}
	
	//
	// Генерация базового шаблона
	//	
	public function render()
	{
        $get_user = new M_User();
        if (isset($_SESSION['user_id'])) {
            $user_info = $get_user->getUser($_SESSION['user_id']);
        } else {
            $user_info['user_name'] = false;
        }
		$vars = array('title' => $this->title, 'content' => $this->content,'kw' => $this->keyWords, 'user' => $user_info['user_name']);
		$page = $this->Template('v/v_main.php', $vars);				
		echo $page;
	}	
}
