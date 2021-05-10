<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'course_name' => 'required',
            'title_id' => 'required',
            'crs_thumbnail' => 'required|mimes:jpg,png',
            'description' => 'required'
        ]);

        $newimgfilename = time().$request->file('crs_thumbnail')->getClientOriginalName();
        $store = $request->file('crs_thumbnail')->storeAs(
            'public/img',
            $newimgfilename
        );

        if(!$store) {
            return redirect()->route('course.create')->with(['message' => 'Gagal simpan gambar']);
        }

        $course = new Course;
        $course->course_name = $request->course_name;
        $course->title_id = $request->title_id;
        $course->price = 0;
        $course->crs_thumbnail = $newimgfilename;
        $course->description = $request->description;

        if($course->save())
        {
            return redirect()->route('course.index')->with(['message' => 'Berhasil tambah course']);
        }

        return redirect()->route('course.create')->with(['message' => 'Gagal tambah course']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
