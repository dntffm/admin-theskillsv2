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
          <div class="card">
            <div class="card-header">
              <h4>List preorder</h4>
            </div>
            {{-- <div class="card-header">
                <a href="{{route('membership.preorder.create')}}" class="btn btn-primary">Tambah Course</a>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Nama lengkap anak</th>
                      <th>Nama Course</th>
                      <th>Jenis Membership</th>
                      <th>Tanggal Order</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($preorders as $index=>$preorder)
                    <tr>
                      <td>{{$index+1}}</td>
                      <td>{{$preorder->user->username}}</td>
                      <td>{{$preorder->user->email}}</td>
                      <td>{{$preorder->user->child_name}}</td>
                      <td>{{$preorder->course->course_name}}</td>
                      <td>
                        <ul>
                          <li>{{$preorder->membership->price}}</li>
                          @foreach (json_decode($preorder->membership->feature) as $item)
                                <li>
                                  {{$item}}
                                </li>
                                @endforeach
                        </ul>
                      </td>
                      <td>{{date('d-m-Y',strtotime($preorder->created_at))}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{$preorders->links()}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@extends('admin.layouts.general.bottom')