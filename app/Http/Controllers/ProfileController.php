<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Services\User,
    App\Http\Services\Favorites,
    App\Http\Services\Purchases,
    App\Http\Services\Delivery,
    App\Http\Services\BankCard;




class ProfileController extends Controller
{
    public function edit(Request $request)
    {   
        $userId=auth()->user()->id;
        return view('profile', [
            'user' => $request->user(),
            'favoriteProducts'=>Favorites::getAllProducts($userId),
            'purchasedProducts'=>Purchases::getPurchasedProducts($userId),
            'deliveredProducts'=>Delivery::getDeliveredProducts($userId),
            'bankCards'=>BankCard::getCards($userId)[0]
        ]);
    }

    public function update(Request $request)
    {
        User::updateData(
                auth()->user()->id, 
                $request->login, 
                $request->mail, 
                $request->name, 
                $request->surname
            );
        return response('Данные обновленны', 200);
    }
    
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
