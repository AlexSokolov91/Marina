<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeCategory extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =
        [
          'name',
          'description'
        ];

    public function employees()
    {
       return $this->hasMany(Employee::class);
    }
}
