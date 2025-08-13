<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'user_id',
        'qty',
        'sale_price',
    ];

    /**
     * Get the invoice that owns this product.
     */
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    /**
     * Get the product for this invoice product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user for this invoice product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
