<?php

use App\Http\Controllers\ProfileController, 
App\Http\Controllers\MainController,
App\Http\Controllers\ProductController, 
App\Http\Controllers\ReviewsController,
App\Http\Controllers\CartController, 
App\Http\Controllers\FavoritesController,
App\Http\Controllers\BankCardsController,
App\Http\Controllers\DeliveryController,
App\Http\Controllers\AddressController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\HavingBankCard;


Route::get('/', MainController::class. '@getMainPage');
Route::get('/prob', function(){
    return view('message');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update']);

    Route::prefix('/bank/card')->group(function (){
        Route::post('/add', BankCardsController::class. '@addBankCard');
        Route::delete('/delete', BankCardsController::class. '@deleteBankCard');
    });

    Route::prefix('/cart')->group(function (){
        Route::get('/', CartController::class. '@getProductsInCart');
        Route::post('/add', CartController::class. '@addProductToCart');
        Route::put('/increase/amount', CartController::class. '@increaseAmountProductInCart');
        Route::put('/decrease/amount', CartController::class. '@reduceAmountProductInCart');
        Route::delete('/delete', CartController::class. '@deleteProductFromCart');
    });

});

require __DIR__.'/auth.php';


Route::get('/catalog', ProductController::class. '@getAllProducts');
Route::get('/product/{id}', ProductController::class. '@getSpecificProduct');
Route::post('comment/add', ReviewsController::class. '@addComment');

Route::middleware('isBankCard')->group(function () {
    Route::post('/delivery/add', DeliveryController::class. '@arrangeDelivery');
});

// Route::post('/delivery/add', DeliveryController::class. '@arrangeDelivery')->middleware(['auth', 'verified']);

// Route::post('/address/add', AddressController::class. '@appendAddress');






Route::prefix('/favorites')->group(function (){
    Route::get('/', FavoritesController::class. '@getFavorites');
    Route::post('/add', FavoritesController::class. '@addProductsInFavorites');
    Route::delete('/delete', FavoritesController::class. '@deleteProductFromFavorites');
});


Route::fallback(function(){
    return view('404');
});

