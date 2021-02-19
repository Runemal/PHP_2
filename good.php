<?php


class good
{
    private $goodId;
    private $goodTitle;
    private $goodPrice;
    private $goodInfo;
    private $goodImg;
    private $goodDiscount;

    public function getGoodId()
    {
        return $this->goodId;
    }

    public function getGoodTitle()
    {
        return $this->goodTitle;
    }

    public function getGoodPrice()
    {
        return $this->goodPrice;
    }

    public function getGoodInfo()
    {
        return $this->goodInfo;
    }

    public function getGoodImg()
    {
        return $this->goodImg;
    }

    public function getGoodDiscount()
    {
        return $this->goodDiscount;
    }

    function __construct($goodId, $goodTitle, $goodPrice, $goodInfo, $goodImg, $goodDiscount){
        $this -> goodId = $goodId;
        $this -> goodTitle = $goodTitle;
        $this -> goodPrice = $goodPrice;
        $this -> goodInfo = $goodInfo;
        $this -> goodImg = $goodImg;
        $this -> goodDiscount = $goodDiscount;
    }

    function showGood(){
        echo "ID продукта: ".$this->goodId."<br> Название: ".$this->goodTitle."<br> Цена продукта: ".$this->goodPrice."<br> Информация: ".$this->goodInfo."<br> Изображение: ".$this->goodImg."<br> Скидка: ".$this->goodDiscount."<hr>";
    }
}