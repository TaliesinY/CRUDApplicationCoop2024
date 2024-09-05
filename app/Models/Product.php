<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;

class Product extends Model
{
    use HasFactory, Filterable;

    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false){
            $query
                ->where('name', 'like', '%'. request ('search') . "%")
                ->orWhere('price', 'like', '%'. request ('search') . "%")
                ->orWhere('provider', 'like', '%'. request ('search') . "%")
                ->orWhere('description', 'like', '%'. request ('search') . "%");
        }
    }
}
