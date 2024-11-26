<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku_id',
        'title',
        'slug',
        'description',
        'price',
        'discount_amount',
        'vat_amount',
        'produce_cost',
        'quantity',
        'size',
        'material',
        'color',
        'capacity',
        'manufacturer',
        'status',
        'thumbnail',
        'trend_type',
        'is_featured',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
