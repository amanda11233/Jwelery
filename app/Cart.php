<?php
namespace App;

class Cart
{
 public $items = null;
 public $totalQty = 0;
 public $totalPrice = 0;
    public $cartindex = 0;
 public function __construct($oldcart){
        if($oldcart){
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
            $this->cartindex = $oldcart->cartindex;
            
        }
 }

    public function add($item, $id, $offer, $quantity){
        
      
        

        if($offer == null){
            $storedItem = [
                'qty' => 0,
                'price' => $item->price ,
                'item' => $item
            ];
            if($this->items){
                if(array_key_exists($id, $this->items)){
                        $storedItem = $this->items[$id];
                    
                }else{
                    $this->cartindex++;
                }
    
            }else{
                $this->cartindex++;
            }

            $storedItem['qty'] += $quantity;
            $storedItem['price'] = $item->price * $storedItem['qty'];
            $this->items[$id] = $storedItem;
            
            $this->totalQty++;
            $this->totalPrice += $item->price * $quantity;
        }
        else
        {
            $discount  = $item->price * ($offer->discount / 100);
        $discountedPrice = $item->price - $discount;
        
            $storedItem = [
                'qty' => 0,
                'price' => $discountedPrice,
                'item' => $item
            ];

            if($this->items){
                if(array_key_exists($id, $this->items)){
                        $storedItem = $this->items[$id];
                        
                }
                else{
                    $this->cartindex++;
                }
            }else{
                $this->cartindex++;
            }
            $storedItem['qty'] += $quantity;
            $storedItem['price'] = $discountedPrice * $storedItem['qty'];
            $this->items[$id] = $storedItem;
        
            $this->totalQty++;
            $this->totalPrice += $discountedPrice * $quantity;
         
        }
          

       
       
    }

public function delete($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        $this->cartindex--;
        unset($this->items[$id]);
    
}
}


?>