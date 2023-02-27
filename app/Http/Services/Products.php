<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Products
{
    
    public static function getProductsAll($user_id=0){
        $products=DB::select('SELECT products.id, TO_BASE64(photo.photo_product) as photo_product, products.name, products.price, type.name as type_name, IFNULL(favorites.id, false) as is_in_favorites from products 
            INNER JOIN type ON type.id=products.type_id
            LEFT JOIN photo ON photo.product_id=products.id
            LEFT JOIN favorites ON favorites.product_id=products.id AND favorites.user_id='.$user_id.'
            WHERE products.count_product>0 GROUP BY products.name ORDER BY products.id ASC');
        return $products;
    }


    public static function getProduct($productId, $user_id=0){
        
        $product=DB::select("SELECT products.*, IFNULL(favorites.id, false) as is_in_favorites from products LEFT JOIN favorites 
                            ON favorites.product_id=products.id AND favorites.user_id=".$user_id." WHERE products.id=".$productId);
        
        
        return $product;
    }

    public static function novelties($user_id=0){
        $productsNovelties=DB::select('SELECT products.id, products.name, products.price, type.name as type_name, IFNULL(favorites.id, false) as is_in_favorites, TO_BASE64(photo.photo_product) as photo_product
                from products 
                INNER JOIN type ON type.id=products.type_id
                LEFT JOIN favorites ON favorites.product_id=products.id AND favorites.user_id='.$user_id.'
                LEFT JOIN photo ON photo.product_id=products.id
                WHERE products.count_product>0 GROUP BY products.name ORDER BY products.id DESC LIMIT 6');
        return $productsNovelties;
    }

    public static function popular($user_id=0){
        $productsPopular= DB::select('SELECT products.id, products.name, products.price, type.name as type_name, IFNULL(favorites.id, false) as is_in_favorites, TO_BASE64(photo.photo_product) as photo_product from products 
                                    INNER JOIN type ON type.id=products.type_id
                                    LEFT JOIN favorites ON favorites.product_id=products.id AND favorites.user_id='.$user_id.' 
                                    INNER JOIN cart ON cart.product_id=products.id
                                    LEFT JOIN photo ON photo.product_id=products.id
                                    WHERE products.count_product>0 GROUP BY products.name ORDER BY COUNT(cart.product_id) DESC LIMIT 4');
        return $productsPopular;
    }

    public static function recommendations($user_id=0){
        return (Products::novelties($user_id)+Products::popular($user_id));
    }
}
