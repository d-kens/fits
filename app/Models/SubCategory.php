<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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

}
