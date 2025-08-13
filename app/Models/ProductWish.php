<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductWish extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
    ];

    /**
     * Get the product that is wished for.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user who wished for the product.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    #[Scope]
    protected function forUser(Builder $query, $user_id)
    {
        $query->where('user_id', $user_id);
    }
}
