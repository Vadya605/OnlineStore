<?php

namespace App\Http\Controllers;
use App\Http\Services\Delivery,
    App\Http\Services\Address,
    App\Http\Services\User;



use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function arrangeDelivery(Request $request){
        $userId=auth()->user()->id;
        foreach($request->products as $product){
            Delivery::addProductToDelivery($userId, $product['product_id'], $product['amount']);
        }
        
        Address::addAddress($userId, $request->country, $request->city, $request->address);
        User::addNumberPhone($userId, $request->numberPhone);

        return response('Доставка оформленна', 200);
    }
}
