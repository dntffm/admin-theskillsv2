@extends('admin.layouts.general.top')
@section('title', 'Create course')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form tambah user</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Forms</a></div>
            <div class="breadcrumb-item">Advanced Forms</div>
        </div>
    </div>

    <div class="section-body">
        <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah user</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama anak</label>
                                <input type="text" name="child_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama orangtua</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Umur</label>
                                <input type="text" name="age" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>kelas</label>
                                <input type="text" name="grade" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Sekolah</label>
                                <input type="text" name="school" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nomor WA</label>
                                <input type="text" name="phone_number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" name="password" class="form-control">
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


