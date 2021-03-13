<?php
class ProductController extends Controller
{
    public $view = 'product';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Главная';
    } 

	function show($data)
    {
		$product=db::getInstance()->getProduct('goods',$data['id']);
		if (!$product)
			{
			  echo "Нет доступа к БД";	
			}	
		return 	$product;			
	}
	
	function checkUser($info)
    {
		
		return 	$true;			
	}
}