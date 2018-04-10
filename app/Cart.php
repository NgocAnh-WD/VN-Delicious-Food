<?php

namespace App;

class Cart {

    public $items;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $shipping = 0;
    public $totaltong = 0;

    public function __construct($oldCart) {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totaltong = $oldCart->totaltong;
        } else {
            $this->items = null;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'name' => $item->name, 'id' => $id, 'price' => $item->is_price()->price, 'image' => $item->thumbnail()->link_image, 'size' => $item->is_price()->size, 'item' => $item];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] ++;
        $storedItem['name'] = $item->name;
        $storedItem['id'] = $id;
        $storedItem['price'] = $item->is_price()->price * $storedItem['qty'];
        $storedItem['price_goc'] = $item->is_price()->price;
        $storedItem['image'] = $item->thumbnail()->link_image;
        $storedItem['size'] = $item->is_price()->size;
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->is_price()->price;
        $this->totaltong =  $this->totalPrice;
    }

    public function deductByOne($id) {
//        if ($this->items[$id]['qty']<=1) {
            $this->items[$id]['qty'] --;
            $this->items[$id]['price'] -= $this->items[$id]['price_goc'];
            $this->totalQty--;
            $this->totalPrice -= $this->items[$id]['price_goc'];
            $this->totaltong = $this->totalPrice;
//        }        
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        $this->totaltong = $this->totalPrice;
        unset($this->items[$id]);
    }

}
