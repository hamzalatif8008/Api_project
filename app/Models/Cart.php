<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0; 

    public function __construct($oldCart)
    {
       // print_r($oldCart); exit;
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'size' => $item->size, 'color' => $item->color, 'stock' => $item->stock, 'price' => $item->cprice, 'item' => $item, 'license' => ''];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        if($item->stock != null)
        {
        $storedItem['stock']--;            
        }

        if($item->size != null)
        { 
        $size = explode(',', $item->size);
        $storedItem['size'] = $size[0];
        }  
        if($item->color != null)
        { 
        $color = explode(',', $item->color);
        $storedItem['color'] = $color[0];
        } 
 
        $storedItem['price'] = $item->cprice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->cprice;
    }

    public function adding($item, $id) {
        $storedItem = ['qty' => 0, 'size' => $item->size, 'color' => $item->color, 'stock' => $item->stock, 'price' => $item->cprice, 'item' => $item, 'license' => ''];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        if($item->stock != null)
        {
        $storedItem['stock']--;
        }
        $storedItem['price'] = $item->cprice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->cprice;
    }

    public function reduce($item, $id) {
        $storedItem = ['qty' => 0, 'size' => $item->size, 'color' => $item->color, 'stock' => $item->stock, 'price' => $item->cprice, 'item' => $item, 'license' => ''];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']--;
        if($item->stock != null)
        {
        $storedItem['stock']++;
        }
        $storedItem['price'] = $item->cprice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice -= $item->cprice;
    }

    public function addnum($item, $id, $qty, $size, $color) {
        $storedItem = ['qty' => 0, 'size' => $item->size, 'color' => $item->color, 'stock' => $item->stock, 'price' => $item->cprice, 'item' => $item, 'license' => ''];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty'] = $storedItem['qty'] + $qty;
        if($item->stock != null)
        {
        $storedItem['stock'] -=  $qty;            
        }
        if($item->size != null)
        { 
        $sizes = explode(',', $item->size);
        $storedItem['size'] = $sizes[0];
        }  
        if(!empty($size)){
        $storedItem['size'] = $size;    
        }
        if($item->color != null)
        { 
        $colors = explode(',', $item->color);
        $storedItem['color'] = $colors[0];
        }  
        if(!empty($color)){
        $storedItem['color'] = $color;    
        }
        $storedItem['price'] = $item->cprice * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty+=$qty;
        $this->totalPrice += $item->cprice * $qty;
    }

    public function updateItem($item, $id,$size) {

        $this->items[$id]['size'] = $size;
    }
    public function updateLicense($id,$license) {

        $this->items[$id]['license'] = $license;
    }
    public function updateColor($item, $id,$color) {

        $this->items[$id]['color'] = $color;
    }
    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}
