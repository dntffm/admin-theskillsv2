@extends('admin.layouts.general.top')
@section('title','Create Webinar')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form tambah webinar baru</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">
        <form action="{{route('admin.webinar.store')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah webinar baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Judul Webinar</label>
                                <input type="text" name="webinar_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal acara</label>
                                <input type="date" name="closed_at" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="control-label">Tampilkan webinar ini di halaman web ?</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Iya</span>
                                </label>
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