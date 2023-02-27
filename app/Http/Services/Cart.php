<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Cart
{
    public static function getAllProducts($user_id){
        $products=DB::select("SELECT cart.product_id, cart.amount, TO_BASE64(photo.photo_product) as photo_product, products.name, products.price, IF(products.count_product>0, true, false) as in_stock  
            FROM products
            LEFT JOIN photo ON photo.product_id=products.id
            INNER JOIN cart ON cart.user_id=".$user_id."
            AND products.id=cart.product_id GROUP BY products.name");
        return $products;
    }

    public static function addProduct($user_id, $product_id){
        $product= DB::select('select id from cart where product_id=? and user_id=?', [$product_id, $user_id]);
        
        if(!empty($product)){
            Cart::increaseAmountProduct($user_id, $product_id);
            return "Товар уже находится в корзине, +1";
        }
        DB::insert("insert into cart(user_id, product_id) values(?, ?)",[$user_id, $product_id]);
        return "Товар добавлен в корзину";
        // on duplicate does not work blyat
    }

    public static function increaseAmountProduct($user_id, $product_id){
        DB::update("update cart set amount=amount+1 where user_id=? AND product_id=?", [$user_id, $product_id]);
    }

    public static function reduceAmountProduct($user_id, $product_id){
        DB::update("update cart set amount=amount-1 where user_id=? AND product_id=? AND amount>1", [$user_id, $product_id]);
    }

    public static function deleteProduct($user_id, $product_id){
        DB::delete("delete from cart where user_id=? AND product_id=?", [$user_id, $product_id]);
        return "Товар удален";
    }
}
