<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;

class Reviews
{
    public static function getReviews($product_id){

        $reviews=DB::select("SELECT comments.text, comments.product_rating, users.name as user_name from comments INNER JOIN users 
                ON comments.product_id=".$product_id." AND comments.user_id=users.id ORDER BY date_of_writing DESC");
        return $reviews;
    }

    public static function addReview($user_id, $product_id, $text, $date_of_writing, $product_rating){
        DB::insert('insert into comments (user_id, product_id, text, date_of_writing, product_rating) values (?, ?, ?, ?, ?)', 
        [$user_id, $product_id, $text, $date_of_writing, $product_rating]);
        return "Отзыв добавлен";
    }
}
