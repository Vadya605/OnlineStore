<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class User
{
    public static function updateData($userId, $userLogin, $userMail, $userName, $userSurname){
        DB::update("UPDATE users SET name_user=?, surname_user=?, name=?, email=? WHERE id=?", 
        [$userName, $userSurname, $userLogin, $userMail, $userId]);
    }

    public static function addNumberPhone($userId, $numberPhone){
        DB::update("UPDATE users SET phone_number=? WHERE id=?", [$numberPhone, $userId]);  
    }
}
