<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'tbl_categories';
    protected $primaryKey = 'category_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function subcategories() {
        return $this->hasMany(SubCategory::class, 'category');
    }


    // overrride the delete method
    // to handle soft deletioon of associated subcategories
    public function delete() {
        // soft delete subcategories
        $this->subcategories()->delete();

        // soft delete category
        return parent::delete();
    }
}
