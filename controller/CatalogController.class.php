<?php
class CatalogController extends Controller
{
    public $view = 'catalog';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Главная';
    } 

	function show($data)
    {
		$products=db::getInstance()->getProductsRange('goods');
		if (!$products)
			{
			  echo "Нет доступа к БД";	
			}	
		return 	$products;			
	}
	
	function checkUser($info)
    {
		
		return 	true;
	}
}