<?php

namespace App\Http\Controllers;
use App\Http\Services\Address;

use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function appendAddress(Request $request){
        Address::addAddress(auth()->user()->id, $request->country, $request->city, $request->address);
        return response('Адресс добавлен', 200);
    }
}
