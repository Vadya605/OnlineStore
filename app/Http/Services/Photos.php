<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Photos
{
    public static function getPhotosProduct($productId){
        $photos=DB::select("SELECT TO_BASE64(photo.photo_product) as photo_product FROM photo INNER JOIN products 
            ON products.id=".$productId." AND photo.product_id=products.id");

        return $photos;
    }
}
