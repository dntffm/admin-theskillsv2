@extends('admin.layouts.general.top')
@section('title','Create Webinar')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form tambah course baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">
        <form action="{{route('course.store.partisipan')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah course baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Course:</label>
                                <select name="course_id" class="form-control">
                                    @foreach (App\Course::orderBy('course_name')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->course_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>User:</label>
                                <select name="user_id" class="form-control">
                                    @foreach (App\User::orderBy('name')->get() as $item)
                                        <option value="{{$item->id}}">{{$item->username.' | '.$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
@extends('admin.layouts.general.bottom')