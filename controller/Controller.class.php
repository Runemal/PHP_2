<?php
class Controller
{
	public $view = 'admin';
    public $title;

    public function __construct()
    {
        $this->title = Config::get('sitename');
    }


}
?>