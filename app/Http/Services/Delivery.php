<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Delivery
{
    public static function getDeliveredProducts($userId){
        $delivereddProducts = DB::select("SELECT products.id as product_id, TO_BASE64(photo.photo_product) as photo_product, products.name, products.price, delivery.delivery_date, delivery.amount
        FROM products 
        LEFT JOIN photo ON photo.product_id=products.id
        INNER JOIN delivery ON delivery.product_id=products.id
        WHERE delivery.user_id=".$userId."
        GROUP BY products.name");
        
        return $delivereddProducts;
    }

    public static function addProductToDelivery($userId, $productId, $amount){
        $date = strtotime('+3 days');
        // echo date('Y-m-d', $date);
        $deliveryDate=date('Y-m-d', $date);
        DB::insert('INSERT INTO delivery (product_id, user_id, delivery_date, amount) VALUES(?, ?, ?, ?)', [
            $productId, 
            $userId,
            $deliveryDate, 
            $amount
        ]);
    }
}
