<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function addToCart($product, $quantity)
    {
        $cart = session()->get('cart');
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$product->id])) {
            return 2;
        }
        // if item not exist in cart then add to cart
        $cart[$product->id] = [
            "id" => $product->id,
            "name" => $product->name,
            "slug" => $product->slug,
            "quantity" => $quantity,
            "price" => $product->price,
            "promotion" => $product->promotion,
            "image" => $product->image[0]->url
        ];
        session()->put('cart', $cart);
        return 1;
    }
    public function removeCart($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return true;
        }
    }
    public function updateCart($id, $quantity)
    {
        if($id && $quantity)
        {
            $cart = session()->get('cart');
            $cart[$id]["quantity"] = $quantity;
            session()->put('cart', $cart);
            return true;
        }
    }
}
