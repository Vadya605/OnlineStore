<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Favorites
{
    public static function getAllProducts($user_id){
        $products=DB::select("SELECT products.id as product_id, TO_BASE64(photo.photo_product) as photo_product, products.name, products.price 
            FROM products 
            LEFT JOIN photo ON photo.product_id=products.id 
            INNER JOIN favorites ON favorites.product_id=products.id 
            WHERE favorites.user_id=".$user_id."
            GROUP BY products.name");
        return $products;
    }

    public static function addProduct($user_id, $product_id){
        $product=DB::select('select id from favorites where product_id=? and user_id=?', [$product_id, $user_id]);
        if(!empty($product)){
            return "Товар уже находится в избранном";
        } 
        DB::insert("insert into favorites(user_id, product_id) values(?, ?)",[$user_id, $product_id]);
        return "Товар добавлен в избранное";
    }

    public static function deleteProduct($user_id, $product_id){
        DB::delete("delete from favorites where user_id=? AND product_id=?", [$user_id, $product_id]);
        return "Товар удален";
    }
}
