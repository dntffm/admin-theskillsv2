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

    public function destroy($id)
    {
        $subcourse = Subcourse::where('id', $id)->firstOrFail();

        if($subcourse->delete()) {
            return redirect('subcourse')->with('message-success', 'SubBab course berhasil dihapus');
        }
        return redirect('subcourse')->with('message-fail', 'SubBab course gagal dihapus');
    }
    public function edit($id)
    {
        $subcourse = Subcourse::where('id', $id)->firstOrFail();

        return view('admin.babcourse.edit', compact('subcourse'));
    }

    public function update(Request $request, $id)
    {
        $subcourse = Subcourse::find($id);   
        $subcourse->sc_thumbnail = $subcourse->sc_thumbnail;
        
        if($request->file('cs_thumbnail')){
            $flyer = time().$request->file('cs_thumbnail')->getClientOriginalName();
            $path = $request->file('cs_thumbnail')->storeAs(
                'public/img', $flyer
            );

            $subcourse->sc_thumbnail = $flyer;
        }

        $subcourse->subcourse_name = $request->course_name;
        $subcourse->course_id = $request->title_id;

        if($subcourse->save()) {
            return redirect('subcourse')->with('message-success','Ubah course berhasil!!');
        }
        return redirect('subcourse')->with('message-fail','Ubah course gagal!!');

    }
}
