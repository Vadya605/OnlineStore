<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Products;


class MainController extends Controller
{
    public function getMainPage(){
        $userId = auth()->user() ? auth()->user()->id:0;
        
        $products=array('novelties'=>Products::novelties($userId),
                        'popular'=>Products::popular($userId),
                        'recommendations'=>Products::recommendations($userId));
                        
        return view('index', ['products'=>$products]);
    }

    
}
