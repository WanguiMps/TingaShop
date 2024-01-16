<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'equipment',
        'hire_price',
        'description',
        'image_file_path',
    ];
}