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
                            <td><div class="badge {{$webinar->status == 'on' ? 'badge-success' : 'badge-warning'}}">{{$webinar->status == 'on' ? 'Buka' : 'Tutup'}}</div></td>
                            <td>
                              {{-- <a href="{{url('webinar').'/'.$webinar->id}}" class="btn btn-secondary">Detail</a> --}}
                              <a href="{{route('admin.webinar.edit',['webinar' => $webinar->id])}}" class="btn btn-success">Edit</a>
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