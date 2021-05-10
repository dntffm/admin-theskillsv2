<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcourse;
class SubcourseController extends Controller
{
    public function index()
    {
        $subcourses = Subcourse::all();
        return view('admin.babcourse.index',compact('subcourses'));
    }

    public function create()
    {
        return view('admin.babcourse.create');
    }

    public function store(Request $request)
    {
        return $request;
    }
}
