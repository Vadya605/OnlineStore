<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Reviews;

class ReviewsController extends Controller
{
    public function addComment(Request $request){
        // date_default_timezone_set('GMT+3'); UTC и только UTC, php не рекомендует использовать другие, да и они не работают
        return response(Reviews::addReview(auth()->user()->id, 
                $request->product_id, 
                $request->text_comment, 
                date('Y-m-d H:i:s'), 
                $request->product_rating), 200);
    }
}
