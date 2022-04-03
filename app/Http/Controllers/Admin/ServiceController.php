<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.service.index', [
            'services' => Service::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:services|max:255',
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->save();

        return redirect()->route('admin-management.service');
    }

    public function edit(Service $service)
    {
        return view('admin.service.edit', [
            'service' => $service
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|unique:services|max:255',
        ]);

        $service->update(
            [
                'name' => $request->name,
            ],

        );

        return redirect()->route('admin-management.service');
    }

    public function delete(Service $service)
    {
        $service->delete();
        return redirect()->route('admin-management.service');
    }
}
