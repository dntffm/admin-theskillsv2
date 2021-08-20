@extends('admin.layouts.general.top')
@section('title', 'Create course')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form tambah jadwal</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">
        <form action="{{route('schedule.store')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah jadwal baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Waktu</label>
                                <input type="datetime-local" name="time" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Jadwal untuk :</label>
                                <select name="subcourse_id" class="form-control">
                                    @foreach (App\Subcourse::all() as $item)
                                        <option value="{{$item->id}}">{{$item->subcourse_name}}</option>
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


