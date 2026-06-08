<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'type',
        'skin_type',
        'expired_date',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }}
    