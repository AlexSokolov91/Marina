<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OurWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class OurWorkController extends Controller
{
    public function index()
    {
        return view('admin.our-work.index', [
            'photos' => OurWork::all()
        ]);
    }

    public function upload(Request $request)
    {

        $validated = $request->validate([
            'image' => 'required',
            'number' => 'required|unique:work_photos|integer',
        ]);

        $isActive = $request->is_active ?? 0;

        $file = $request->file('image');
        $upload_folder = 'public';
        $fileName = time() . '.jpg';
        Storage::putFileAs($upload_folder, $file, $fileName);;
        $photo = DB::table('work_photos')->insert(
            [
                'number' => $request->number,
                'path' => $fileName,
                'is_active' => $isActive,
                'created_at' => now(),
            ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        $data = DB::table('work_photos')->find($id);

        if (Storage::disk('public')->delete($data->path)) {
            DB::table('work_photos')->where('id', $id)->delete();
        }
        return redirect()->back();
    }
}
