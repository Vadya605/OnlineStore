<?php

namespace App\Http\Services;
use Illuminate\Support\Facades\DB;

class Characteristic
{
    public static function get_characteristics($product_id){
        $characteristics=DB::select("SELECT characteristics.* from characteristics
        INNER JOIN products_characteristics ON products_characteristics.product_id='".$product_id. "'
        AND characteristics.id=products_characteristics.characteristic_id");
        return $characteristics;
    }
}
