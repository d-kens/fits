<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    protected $table = 'tbl_subcategories';
    protected $primaryKey = 'subcategory_id';

    use SoftDeletes;

    protected $dates = ['deleted_at'];


    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    public function products():HasMany
    {
        return $this->hasMany(Product::class, 'subcategory_id', 'subcategory_id');
    }


    public function delete() {
        $this->products()->delete();

        return parent::delete();
    }

}
