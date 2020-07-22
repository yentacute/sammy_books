<?php

namespace App;
class Cart
{
    public $items;
    public $totalQty =0;
    public $totalPrice =0;
    public function __construct($oldCard)
    {
        if ($oldCard) {
            $this->items = $oldCard->items;
            $this->totalQty = $oldCard->totalQty;
            $this->totalPrice = $oldCard->totalPrice;
        }else{
            $this->items = null;
        }

    }
    public function add($item,$id){
        $storeItem =['qty'=>0, 'price'=>$item->price,'item'=>$item]
    }
}
