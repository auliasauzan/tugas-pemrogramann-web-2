<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skincare extends Model
{
    use HasFactory;

    // Tambahkan/sesuaikan ini:
    protected $fillable = [
        'name',
        'brand',
        'type',
        'skin_type',
        'expired_date',
    ];

 public function category()
{
    return $this->belongsTo(Category::class);
}
}