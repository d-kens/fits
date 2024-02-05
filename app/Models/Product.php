<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_description',
        'unit_price',
        'available_quantity',
        'subcategory_id',
        'added_by'
    ];

    protected $date = ['deleted_at']; // soft deletes
}
