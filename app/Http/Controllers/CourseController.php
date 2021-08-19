<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CoursesTaken;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::orderBy('created_at','desc')->paginate(15);
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

    public function createpartisipan()
    {
        return view('admin.course.create-partisipan');
    }

    public function storepartisipan(Request $request) 
    {
        $this->validate($request, [
            'user_id' => 'required',
             'course_id' => 'required'
        ]);

        $coursestaken = new CoursesTaken();
        $coursestaken->user_id = $request->user_id;
        $coursestaken->course_id = $request->course_id;
        $coursestaken->c_thumbnail = 's';
        $checkmycourses = CoursesTaken::where(['user_id' => $request->user_id, 'course_id' => $request->course_id])->first();

        if($checkmycourses != null) {
            return redirect('course')->with('message-fail', 'User sudah join course  ini');
        }
        if($coursestaken->save()) {
            return redirect('course')->with('message-success', 'Sukses menambah user course');
        }

        return redirect('course')->with('message-fail', 'Gagal menambah user course');
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
        $course = Course::where('id', '=', $id)->firstOrFail();
        return view('admin.course.edit', compact('course'));
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
        $course = Course::find($id);   
        $course->crs_thumbnail = $course->crs_thumbnail;
        
        if($request->file('crs_thumbnail')){
            $flyer = time().$request->file('crs_thumbnail')->getClientOriginalName();
            $path = $request->file('crs_thumbnail')->storeAs(
                'public/img', $flyer
            );

            $course->crs_thumbnail = $flyer;
        }

        $course->course_name = $request->course_name;
        $course->description = $request->description;
        $course->title_id = $request->title_id;
        if($course->save()){
            return redirect('course')->with('message-success','Ubah course berhasil!!');
        }
        return redirect('course')->with('message-fail','Ubah course gagal!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::where('id', '=', $id)->firstOrFail();
        if($course->delete()) {
            return redirect('course')->with('message-success', 'Berhasil hapus');
        }
        return redirect('course')->with('message-fail', 'Gagal hapus');
    }
}
