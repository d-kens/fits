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

    // Define an accessor for the 'category' attribute
    public function getCategoryAttribute($value)
    {
        try {

            $category = Category::findOrFail($value);
            return $category->category_name;
            
        } catch (ModelNotFoundException $e) {
            return 'unknown';
        }
    }




}
