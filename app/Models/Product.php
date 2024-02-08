<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'tbl_products';

    protected $primaryKey = 'product_id';


    use SoftDeletes;

    protected $fillable = [
        'product_name',
        'product_description',
        'unit_price',
        'available_quantity',
        'subcategory_id',
        'added_by'
    ];

    protected $date = ['deleted_at'];


    public function getSubcategoryIdAttribute($value) {
        try {
            $subcategory = SubCategory::findOrFail($value);
            return $subcategory->subcategory_name;

        } catch (ModelNotFoundException $e) {
            return 'unknown';
        }
    }

    public function getAddedByAttribute($value) {
        try {
            $user = User::findOrFail($value);
            return $user->first_name . ' '. $user->last_name;

        } catch (ModelNotFoundException $e) {
            return 'unknown';
        }
    }
}
