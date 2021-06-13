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

    @if (session('message'))
    <div class="alert alert-success alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Success</div>
            {{session('message')}}
        </div>
    </div>
    @endif

    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>List partisipan webinar</h4>
            </div>
            <div class="card-header">
                <a href="" class="btn btn-primary">Download Excel</a>
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
                      <th>Username</th>
                      <th>No. HP</th>
                      <th>Nama anak</th>
                      <th>Sekolah</th>
                      <th>Kelas</th>
                      <th>Status Approval</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($webinardetail as $index=>$participant)
                        <tr>
                            <td>
                            {{$index+1}}
                            </td>
                            <td>{{$participant->name}}</td>
                            <td>{{$participant->username}}</td>
                            <td>{{$participant->phone_number}}</td>
                            <td>{{$participant->child_name}}</td>
                            <td>{{$participant->school}}</td>
                            <td>{{$participant->grade}}</td>
                            <td>
                              <form action="{{route('changeapproval',['id' => $participant->wp_id])}}" class="formchangeapproval-{{$participant->wp_id}}" method="post">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-control" onchange="changeapproval({{$participant->wp_id}})">
                                  <option value="yes">Diterima</option>
                                  <option value="no" {{$participant->approval_status == 'no' ? 'selected' : ''}}>Ditolak</option>
                                </select>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                  {{$webinardetail->links()}}
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