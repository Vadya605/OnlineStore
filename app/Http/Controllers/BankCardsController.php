<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\BankCard;


class BankCardsController extends Controller
{
    public function addBankCard(Request $request){
        return BankCard::addCard(auth()->user()->id, $request->cardNumber, $request->validity, $request->cvv);
    }

    public function deleteBankCard(Request $request){
        return BankCard::deleteCard($request->id);
    }
}
