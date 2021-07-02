@extends('admin.layouts.general.top')
@section('title','Create Webinar')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form tambah artikel baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                @if ($errors->any())
                <div class="alert alert-danger alert-has-icon">
                    <div class="alert-icon"><i class="far fa-cross"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Warning</div>
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah artikel baru</h4>
                    </div>
                    <form action="{{route('admin.articles.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                            <div class="form-group">
                                <label>Judul Artikel</label>
                                <input type="text" name="article_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="summernote" name="content" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="file" name="thumbnail" class="form-control">
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