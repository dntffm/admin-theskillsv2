<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
class StorageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function index($filename)
    {
  
        $file = storage_path('app/public/img/'. str_replace("_",".",$filename));
        return File::get($file);
    }
}
