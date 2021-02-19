<?php
include "good.php";

class indexGood extends good {
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

    function showGood()
    {
        parent::showGood();
        echo "Вы заказали ".$this->getGoodAmount()." шт. ".$this->getGoodTitle()." на общую сумму ".($this->getGoodPrice()-$this->getGoodDiscount())*$this->getGoodAmount()." рублей.<hr><hr>";
    }
}

$testGood = new indexGood(1, "Olive Oil", 1200, "Good olive oil extra virgin!", "img/olive_oil.png", 150, 15);
$testGood->showGood();