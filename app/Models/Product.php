<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    use HasFactory;

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
        'image'
    ];

    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function images():HasMany{
        return $this->hasMany(ProductImage::class);
    }

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function primaryImage(){
        return $this->hasOne(ProductImage::class,'product_id')->oldest();
    }
    
}
