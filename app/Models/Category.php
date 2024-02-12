<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $table = 'tbl_categories';
    protected $primaryKey = 'category_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function subcategories ():HasMany
    {
        return $this->hasMany(SubCategory::class, 'category', 'category_id');
    }



    public function delete() {
        $this->subcategories()->delete();

        return parent::delete();
    }
}
