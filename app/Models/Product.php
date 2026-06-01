<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'brand',
        'type',
        'skin_type',
        'expired_date',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}