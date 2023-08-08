<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propina extends Model
{
    use HasFactory;

    protected $casts = [
        'mes' => 'array',
        'total' => 'array',
    ];
    protected $guarded = [
        'mes' => 'array',
    ];

}
