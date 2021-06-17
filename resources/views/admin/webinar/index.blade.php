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
          @if (session('message-success'))
                    
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Success</div>
                        {{session('message-success')}}
                    </div>
                </div>
                @endif
                @if (session('message-fail'))
                    
                <div class="alert alert-success alert-has-icon">
                    <div class="alert-icon"><i class="far fa-cross"></i></div>
                    <div class="alert-body">
                        <div class="alert-title">Fail</div>
                        {{session('message-success')}}
                    </div>
                </div>
                @endif
          <div class="card">
            <div class="card-header">
              <h4>List webinar</h4>
            </div>
            <div class="card-header">
                <a href="{{route('admin.webinar.create')}}" class="btn btn-primary">Tambah Webinar</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Judul Webinar</th>
                      <th>Harga</th>
                      <th>Poster</th>
                      <th>Tanggal Acara</th>
                      <th>Link Webinar</th>
                      <th>Link Record</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($webinars as $index=>$webinar)
                        <tr>
                            <td>
                            {{$index+1}}
                            </td>
                            <td>{{$webinar->webinar_name}}</td>
                            <td>{{$webinar->price}}</td>
                            <td>
                            <img alt="image" src="{{\Storage::path('public/img/'.$webinar->flyer)}}" class="rounded-circle" width="35" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian">
                            </td>
                            <td>{{$webinar->closed_at}}</td>
                            <td>{{$webinar->link_webinar}}</td>
                            <td>{{$webinar->link_record}}</td>
                            <td>
                              @if ($webinar->status == 'on')
                                <div class="badge badge-success">
                                  Buka
                                </div>
                              @endif
                              @if ($webinar->status == 'off')
                                <div class="badge badge-warning">
                                  Tutup
                                </div>
                              @endif
                              @if ($webinar->status == 'selesai')
                                <div class="badge badge-danger">
                                  Selesai
                                </div>
                              @endif
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <div>
                                  <a href="{{url('webinar').'/'.$webinar->id}}" class="btn btn-secondary">Detail</a>
                                </div>
                                <div>
                                  <a href="{{route('admin.webinar.edit',['webinar' => $webinar->id])}}" class="btn btn-success">Edit</a>
                                </div>
                                <form action="{{route('admin.webinar.delete',['webinar' => $webinar->id])}}" method="post" onsubmit="return confirm('Yakin untuk hapus ? ')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                  {{$webinars->links()}}
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