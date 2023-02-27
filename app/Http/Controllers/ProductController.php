<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Http\Services\Products, 
    App\Http\Services\Characteristic, 
    App\Http\Services\Reviews,
    App\Http\Services\Photos;


class ProductController extends Controller
{
    public function getAllProducts(Request $request){
        if(!auth()->user()){
            return view('catalog', ['products'=>Products::getProductsAll()]);
        }

        return view('catalog', ['products'=>Products::getProductsAll(auth()->user()->id)]);
        // return response()->json(Products::getProductsAll(auth()->user()->id));
    }


    public function getSpecificProduct(Request $request){
        $productId=$request->id;
        try{
            if(!auth()->user()){
                $product=collect(Products::getProduct($productId)[0])->toArray();
            }else{
                $product=collect(Products::getProduct($productId, auth()->user()->id)[0])->toArray();
            } 
        }
        catch(\Exception $exp){
            return redirect('/page_not_found');
        } 
        $product['characteristics']=Characteristic::get_characteristics($productId);
        $product['reviews']=Reviews::getReviews($productId);
        $product['photos']=Photos::getPhotosProduct($productId);
        return view('product', ['product'=>$product]);
    }
}
