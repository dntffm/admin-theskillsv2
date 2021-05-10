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
        <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah course baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul course</label>
                                <input type="text" name="course_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Course untuk :</label>
                                <select name="title_id" class="form-control">
                                    @foreach (App\CourseTitles::all() as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="crs_thumbnail" class="form-control">
                              </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control summernote-simple" style="margin-top: 0px; margin-bottom: 0px; height: 75px;"></textarea>
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