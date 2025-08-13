<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSlider extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'short_description',
        'price',
        'image',
        'product_id',
    ];

    /**
     * Get the product that owns the slider.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
