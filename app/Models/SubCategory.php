<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    protected $table = 'tbl_subcategories';
    protected $primaryKey = 'subcategory_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function products() {
        return $this->hasMany(Product::class, 'subcategory_id');
    }

    
    public function getCategoryAttribute($value)
    {
        try {

            $category = Category::findOrFail($value);
            return $category->category_name;

        } catch (ModelNotFoundException $e) {
            return 'unknown';
        }
    }


    public function delete() {
        // soft delete products
        $this->products()->delete();

        // soft delete category
        return parent::delete();
    }




}
