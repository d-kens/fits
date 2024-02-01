<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tbl_categories';
    protected $primaryKey = 'category_id';

    public function subcategories() {
        return $this->hasMany(SubCategory::class, 'category_id');
    }
}
