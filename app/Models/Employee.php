<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
      'service_id',
      'employee_category_id',
      'price',
    ];

    public function employeeCategorie()
    {
       return $this->belongsTo(EmployeeCategory::class, 'employee_category_id');
    }

    public function service()
    {
       return $this->belongsTo(Service::class, 'service_id');
    }
}
