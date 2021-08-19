@extends('admin.layouts.general.top')
@section('title','List course')
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
                <a href="{{route('course.create')}}" class="mr-2 btn btn-primary">Tambah Course</a>
                <a href="{{route('course.create.partisipan')}}" class="btn btn-primary">Tambah Partisipan</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Judul Course</th>
                      <th>Kind</th>
                      <th>Harga</th>
                      <th>Description</th>
                      <th>Thumbnail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($courses as $index=>$course)
                        <tr>
                            <td>
                            {{$index+1}}
                            </td>
                            <td>{{$course->course_name}}</td>
                            <td>{{$course->hasTitle->title}}</td>
                            <td>{{$course->price}}</td>
                            <td>{{$course->description}}</td>
                            <td>
                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="" data-original-title="Wildan Ahdian">
                            </td>
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <div>
                                  <a class="btn btn-secondary">Detail</a>
                                </div> --}}
                                <div>
                                  <a href="{{'/course'.'/'.$course->id.'/edit'}}" class="btn btn-success">Edit</a>
                                </div>
                                <form action="{{'/course'.'/'.$course->id}}" method="post" onsubmit="return confirm('Yakin untuk hapus ? ')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                  {{$courses->links()}}
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