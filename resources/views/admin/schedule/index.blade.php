@extends('admin.layouts.general.top')
@section('title', 'Bab course')
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
              <h4>Jadwal Zoom</h4>
            </div>
            <div class="card-header">
                <a href="{{route('schedule.create')}}" class="btn btn-primary">Tambah Jadwal Zoom</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Waktu</th>
                      <th>Link</th>
                      <th>Subcourse</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($schedules as $index=>$schedule)
                        <tr>
                            <td>
                            {{$index+1}}
                            </td>
                            <td>{{$schedule->date}}</td>
                            <td>{{$schedule->link}}</td>
                            <td>{{$schedule->subcourse->subcourse_name}}</td>
                            
                            <td>
                              <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <div>
                                  <a href="" class="btn btn-secondary">Detail</a>
                                </div> --}}
                                {{-- <div>
                                  <a href="{{'/subcourse'.'/'.$subcourse->id.'/edit'}}" class="btn btn-success">Edit</a>
                                </div> --}}
                                <form action="{{'/schedule'.'/'.$schedule->id}}" method="post" onsubmit="return confirm('Yakin untuk hapus ? ')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </div>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                  {{$schedules->links()}}
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