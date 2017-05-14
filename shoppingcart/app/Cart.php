<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($oldCart)
    {

    	if($oldCart)
    	{
    		$this->items = $oldCart->items;
    		$this->totalQty = $oldCart->totalQty;
    		$this->totalPrice = $oldCart->totalPrice;
    	}

    }

    public function add($item,$id)
    {
    	$storedItem = ['qty' =>0, 'price' =>$item->price, 'item' =>$item];
    	if($this->items)
    	{
    		if(array_key_exists($id, $this->items))
    		{
    			$storedItem = $this->items[$id];
    		    
    		}
    	}

    		$storedItem['qty']++;
    		$storedItem['price'] = $storedItem['qty'] * $item->price;
    		$this->items[$id]  = $storedItem;
    		$this->totalPrice += $item->price;
    		$this->totalQty++;
    	

    }
    public function update($id,$qty)
    {
        $oldqty = $this->items[$id]['qty'];
        if($oldqty < $qty)
        {
           $this->items[$id]['qty'] = $qty;
           $this->items[$id]['price'] = $this->items[$id]['item']['price']*$qty;
           $this->totalPrice += $this->items[$id]['item']['price']*($qty-$oldqty);
           $this->totalQty += ($qty-$oldqty);
       }
       else
       {
           $this->items[$id]['qty'] = $qty;
           $this->items[$id]['price'] = $this->items[$id]['item']['price']*$qty;
           $this->totalPrice -= $this->items[$id]['item']['price']*($oldqty-$qty);
           $this->totalQty-= ($oldqty-$qty);

       }
        

    }

}
