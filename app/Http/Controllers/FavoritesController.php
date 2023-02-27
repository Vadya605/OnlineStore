<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\Favorites;

class FavoritesController extends Controller
{
    public function getFavorites(Request $request){
        return view('favorites', ['favoriteProducts'=>Favorites::getAllProducts(auth()->user()->id)]);
    }

    public function addProductsInFavorites(Request $request){
        return response(Favorites::addProduct(auth()->user()->id, $request->product_id), 200);
    }

    public function deleteProductFromFavorites(Request $request){
        return response(Favorites::deleteProduct(auth()->user()->id, $request->product_id), 200); 
    }
}
