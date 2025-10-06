<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRange extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'photo',
        'status',
        'sort_order'
    ];
    
    /**
     * Get all active product ranges
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAllActiveRanges()
    {
        return self::where('status', 'active')->orderBy('sort_order', 'asc')->get();
    }
    
    /**
     * Get product range by slug
     *
     * @param string $slug
     * @return \App\Models\ProductRange|null
     */
    public static function getBySlug($slug)
    {
        return self::where('slug', $slug)->where('status', 'active')->first();
    }
    
    /**
     * Get the categories associated with the product range.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product_range', 'product_range_id', 'category_id');
    }
}
