<?php
// формируем массив
$nav = array(
  'primary' => array(
    array('name' => 'Главная', 'url' => './?page=index'),
    array('name' => 'Каталог', 'url' => './?page=gallery'),

  ),
//  'secondary' => array(
//    array('name' => 'Vios', 'url' => 'images/vios.jpg'),
//    array('name' => 'Carob', 'url' => 'images/carob.jpg'),
//    array('name' => '5l Green', 'url' => 'images/5l_green.jpg'),
//  )
);

include 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
  $loader = new Twig_Loader_Filesystem('templates');
  
  $twig = new Twig_Environment($loader);
  
  $template = $twig->loadTemplate('shop.tmpl');

  echo $template->render(array (
    'nav' => $nav,
    'updated' => date("Y"),
  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>