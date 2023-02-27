<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;
class BankCard
{
    public static function getCards($userId){
        $bankCards=array([
            'cards'=>DB::select('SELECT * FROM bank_cards WHERE user_id=?', [$userId]),
            'newId'=>DB::select('SELECT IF(COUNT(id)>0, id, 1) as id FROM bank_cards ORDER BY id DESC LIMIT 1')[0]->id
        ]);
        return $bankCards;
    }

    public static function addCard($userId, $cardNumber, $validity, $cvv){
        DB::insert('INSERT INTO bank_cards (user_id, card_number, validity, CVV) VALUES (?,?,?,?)',
        [$userId, $cardNumber, $validity, $cvv]);
        
        return 'Карта добавлена';
    }

    public static function deleteCard($cardId){
        DB::delete('DELETE FROM bank_cards WHERE id=?', [$cardId]);
        return 'Карта удалена';
    }

    
}
