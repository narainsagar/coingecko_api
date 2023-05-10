<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Coin extends BaseModel
{
    use HasFactory;

    protected $table = 'coins';

    protected $fillable = [
        'coin_id',
        'symbol',
        'name',
        'platforms',
    ];

    public $timestamps = true;

    protected $casts = [
        'platforms' => 'object',
    ];
}
