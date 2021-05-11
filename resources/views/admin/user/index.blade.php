@extends('admin.layouts.general.top')
@section('title','Webinar')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>DataTables</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Modules</a></div>
        <div class="breadcrumb-item">DataTables</div>
      </div>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>List User</h4>
            </div>
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama</th>
                      <th>E-Mail</th>
                      <th>Username</th>
                      <th>No.telepon</th>
                      <th>Usia</th>
                      <th>Kelas</th>
                      <th>Sekolah</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $index=>$user)
                        <tr>
                            <td>
                            {{$index+1}}
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->phone_number}}</td>
                            <td>{{$user->age}}</td>
                            <td>{{$user->grade}}</td>
                            <td>{{$user->school}}</td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr>
                      @endforeach
                  </tbody>
                  {{ $users->links() }}
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@extends('admin.layouts.general.bottom')