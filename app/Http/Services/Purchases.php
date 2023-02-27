<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Purchases
{
    public static function getPurchasedProducts($userId){
        $purchasedProducts=DB::select("SELECT products.id as product_id, TO_BASE64(photo.photo_product) as photo_product, products.name, products.price, purchase_history.purchase_date, purchase_history.amount
        FROM products 
        INNER JOIN purchase_history ON purchase_history.product_id=products.id 
        LEFT JOIN photo ON photo.product_id=products.id
        WHERE purchase_history.user_id=".$userId."
        GROUP BY products.name");
        return $purchasedProducts;

    }

    public static function addProductToPurchases(){
        //
    }
}
