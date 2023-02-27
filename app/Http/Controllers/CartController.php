<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Cart;

class CartController extends Controller
{
    public function getProductsInCart(Request $request){
        // $userId = auth()->user()->id;
        // return $userId;
        return view('cart', ['productsInCart'=>Cart::getAllProducts(auth()->user()->id)]);
        // return response()->json(Cart::getAllProducts(1), 200);
    }
    public function  addProductToCart(Request $request){
        
        return response(Cart::addProduct(auth()->user()->id, $request->product_id), 200);
    }

    public function increaseAmountProductInCart(Request $request){
        Cart::increaseAmountProduct(auth()->user()->id, $request->product_id);
        return response('+1', 200);  
    }

    public function reduceAmountProductInCart(Request $request){
        Cart::reduceAmountProduct(auth()->user()->id, $request->product_id);
        return response('-1', 200);  
    }

    public function deleteProductFromCart(Request $request){
        return response(Cart::deleteProduct(auth()->user()->id, $request->product_id), 200); 
    }

    //change status code 
}
