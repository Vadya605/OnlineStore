<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class Address
{
    public static function addAddress($userId, $country, $city, $address){
        DB::insert('INSERT INTO addresses (user_id, country, city, address) VALUES(?, ?, ?, ?)', [
            $userId,
            $country,
            $city,
            $address
        ]);
    }
}
