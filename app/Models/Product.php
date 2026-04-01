<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'user_id',
        'price',
        'sale_price',
        'description',
        'brand',
        'tags',
        'weight',
        'quantity',
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function productImage():HasMany{
        return $this->hasMany(ProductImage::class);
    }

    
}
