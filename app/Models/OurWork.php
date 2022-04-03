<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'path',
        'is_active',
    ];

    protected $table = 'work_photos';
}
