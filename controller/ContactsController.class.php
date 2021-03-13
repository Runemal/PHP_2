<?php
class ContactsController extends Controller
{
    public $view = 'contacts';
    public $title;

    function __construct()
    {
        parent::__construct();
        $this->title .= ' | Главная';
    } 

	function show($data)
    {
		/*$products=db::getInstance()->getProductsRange('product',0,6);
		if (!$product)
			{
			  echo "Нет доступа к БД";	
			}	*/
		return 	$true;			
	}	
	
	function checkUser($info)
    {
		
		return 	$true;			
	}
}