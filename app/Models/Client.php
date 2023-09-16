<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'token',
        'liveness_range',
        'liveness_threshold',
        'fr_range',
        'fr_threshold',
        'is_active'
    ];
}
