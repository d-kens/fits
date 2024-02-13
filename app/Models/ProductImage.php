<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    protected $table = "tbl_productimages";

    protected $primaryKey = "productimages_id";

    use SoftDeletes;

    protected $fillable = [
        'product_image',
        'product_id',
        'added_by'
    ];

    protected $date = ['deleted_at'];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

}
