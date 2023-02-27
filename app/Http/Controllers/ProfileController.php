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
    /**
     * Display the user's profile form.
     */
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

    /**
     * Update the user's profile information.
     */
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

        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();
        // return '123';
        // return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
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
