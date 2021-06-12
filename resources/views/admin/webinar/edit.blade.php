@extends('admin.layouts.general.top')
@section('title','Create Webinar')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form edit webinar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit webinar</h4>
                    </div>
                    <form action="{{route('admin.webinar.update', ['webinar' => $webinar->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                            <div class="form-group">
                                <label>Judul Webinar</label>
                                <input type="text" name="webinar_name" class="form-control" value="{{$webinar->webinar_name}}">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="price" class="form-control" value="{{$webinar->price}}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal acara</label>
                                <input type="date" name="closed_at" class="form-control" value="{{$webinar->closed_at}}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="form-control">{{$webinar->description}}</textarea>
                                
                            </div>
                            <div class="form-group">
                                <label>Link Webinar</label>
                                <input type="text" name="link_webinar" class="form-control" value="{{$webinar->link_webinar}}">
                            </div>
                            <div class="form-group linkrecordtxt">
                                <label>Link Record <span><button class="btn btn-primary"
                                            onclick='addrecord()'>+</button></span> </label>
                                @if ($webinar->link_record)
                                    @foreach (json_decode($webinar->link_record) as $item)
                                    <input type="text" name="link_record[]" class="form-control" value="{{$item}}">
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="control-label">Status</div>
                                <label class="custom-switch mt-2">
                                    <select name="status" class="form-control">
                                        <option value="on">On</option>
                                        <option value="off">Off</option>
                                        <option value="selesai">Selesai</option>
                                    </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Flyer</label>
                                <input type="file" name="flyer" class="form-control">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('admin.layouts.general.bottom')