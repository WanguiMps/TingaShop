<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'equipment_id',
        'supplier_id',
        'status',
        'quantity',
        'total_price',
        'from',
        'to',
    ];
}