<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\OurWork;
use App\Models\Service;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index',
            [
                'services' => Service::all(),
                'photos' => OurWork::all()
                    ->where('is_active', 1)
                    ->sortBy('number')->all(),
            ]
        );
    }

    public function price()
    {
        return view('price',[
            'employees' => Employee::with(['employeeCategorie', 'service'])->get()->groupBy('employee_category_id'),
            ''
        ]);
    }
}
