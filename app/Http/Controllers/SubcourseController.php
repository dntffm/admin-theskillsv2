<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcourse;
class SubcourseController extends Controller
{
    public function index()
    {
        $subcourses = Subcourse::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.babcourse.index',compact('subcourses'));
    }

    public function create()
    {
        return view('admin.babcourse.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'course_name' => 'required',
            'title_id' => 'required',
            'sc_thumbnail' => 'required'
        ]);

        $subcourse = new Subcourse();
        $subcourse->subcourse_name = $request->course_name;
        $subcourse->sc_thumbnail = $request->sc_thumbnail;
        $subcourse->course_id = $request->title_id;

        if($subcourse->save()) {
            return redirect('subcourse')->with('message', 'SubBab course berhasil disimpan');
        }
        return redirect('subcourse')->with('message', 'Gagal menyimpan');
    }
}
