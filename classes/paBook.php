<?php

include "abstracts/good.php";

class paBook extends good
{
    private $goodAmount;

    public function getGoodAmount()
    {
        return $this->goodAmount;
    }

    function __construct($goodId, $goodTitle, $goodPrice, $goodInfo, $goodImg, $goodDiscount, $goodAmount)
    {
        parent::__construct($goodId, $goodTitle, $goodPrice, $goodInfo, $goodImg, $goodDiscount);
        $this->goodAmount = $goodAmount;
    }

    function getPrise()
    {
        echo "Вы заказали ".$this->getGoodAmount()." шт. ".$this->getGoodTitle()." на общую сумму ".($this->getGoodPrice()-$this->getGoodDiscount())*$this->getGoodAmount()." рублей.<hr><hr>";
    }

    function showGood(){
        echo "ID продукта: ".$this->getGoodId()."<br> Название: ".$this->getGoodTitle()."<br> Цена продукта: ".$this->getGoodPrice()."<br> Информация: ".$this->getGoodInfo()."<br> Изображение: ".$this->getGoodImg()."<br> Скидка: ".$this->getGoodDiscount()."<hr>";
    }
}