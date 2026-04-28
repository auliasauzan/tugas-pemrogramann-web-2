<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable; // Sesuai gambar image_23bd70.png

#[Fillable([
    'name', 
    'brand', 
    'type', 
    'skin_type', 
    'description', 
    'expired_date'
])] // Menggunakan Attribute Fillable seperti pada gambar image_23c153.png
class Skincare extends Model
{
    /** @use HasFactory<\Database\Factories\SkincareFactory> */
    use HasFactory;
}