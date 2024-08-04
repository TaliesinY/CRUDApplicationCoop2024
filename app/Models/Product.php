<?php

namespace App\Models;

class Product
{
    public static function all(){
        return [
            [
                'id' => 1,
                'name' => 'product1',
                'cost' => 10,
            ],
            [
                'id' => 2,
                'name' => 'product2',
                'cost' => 20,
            ],
            [
                'id' => 3,
                'name' => 'product3',
                'cost' => 30,
            ]
        ];
    }

    public static function find($id){
        $products = self::all();

        foreach ($products as $product) {
            if ($product['id'] == $id) {
                return $product;
            }
        }
    }
}
