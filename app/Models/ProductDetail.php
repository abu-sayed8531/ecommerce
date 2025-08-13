<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'img1',
        'img2',
        'img3',
        'description',
        'color',
        'size',
        'product_id',
    ];

    /**
     * Get the product that owns the detail.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
