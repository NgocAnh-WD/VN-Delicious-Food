<?php

namespace App;

class Cart {

    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        } else {
            $this->items = null;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'name' => $item->name,'id'=>$id, 'price' => $item->is_price()->price, 'image' => $item->thumbnail()->link_image,'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] ++;
        $storedItem['name'] = $item->name;
        $storedItem['id'] = $id;
        $storedItem['price'] =  $item->is_price()->price*$storedItem['qty'];
        $storedItem['price_goc'] =  $item->is_price()->price;
        $storedItem['image'] =  $item->thumbnail()->link_image;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->is_price()->price;
        if($this->totalPrice>=50&& $this->totalPrice<100){
            $this->shipping = $this->totalPrice*0.15;
        } else if($this->totalPrice>=100){
            $this->shipping = $this->totalPrice*0.1;
        } else {
            $this->shipping = $this->totalPrice*0.2;
        }
        $this->totaltong = $this->shipping+ $this->totalPrice;
        
    }

    public function deductByOne($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['price_goc'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['price_goc'];
        if($this->totalPrice>=50&& $this->totalPrice<100){
            $this->shipping = $this->totalPrice*0.15;
        } else if($this->totalPrice>=100){
            $this->shipping = $this->totalPrice*0.1;
        } else {
            $this->shipping = $this->totalPrice*0.2;
        }
        $this->totaltong = $this->shipping+ $this->totalPrice;
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}
