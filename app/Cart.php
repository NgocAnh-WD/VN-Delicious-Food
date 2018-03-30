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
        $storedItem = ['qty' => 0, 'name' => $item->name,'id'=>$id, 'price' => $item->is_price()->price, 'image' => $item->thumbnail()->link_image];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] ++;
        $storedItem['name'] = $item->name;
        $storedItem['id'] = $id;
        $storedItem['price'] =  $item->is_price()->price*$storedItem['qty'];
        $storedItem['image'] =  $item->thumbnail()->link_image;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
//        $this->totalPrice += $item->price;
    }

    public function deductByOne($id) {
        $this->items[$id]['qty'] --;
        $this->items[$id]['price'] -= $this->items[$id]['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['price'];

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
