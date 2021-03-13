<?php
class BusketController extends Controller
{
    public $view = 'busket';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Главная';
    } 

	function show($data)
	{
        $products=db::getInstance()->getBusketRange('4pn4hg8ei342ba9nalde6km1au');
        if (!$products)
        {
            echo "Нет доступа к БД";
        }
        return 	$products;
    }
		
	function checkUser($info)
	{
		

		return 	$true;			
	}
}