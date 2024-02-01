<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'tbl_subcategories';
    protected $primaryKey = 'subcategory_id';





    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
