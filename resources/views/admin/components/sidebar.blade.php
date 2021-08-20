<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand pt-4">
        <img src="{{asset('/assets/img/namtag.png')}}" width="150px">
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Dashboard</span></a></li>
          <li class="menu-header">Course</li>
          <li><a class="nav-link" href="{{route('course.index')}}"><i class="far fa-square"></i> <span>Course</span></a></li>
          <li><a class="nav-link" href="{{route('subcourse.index')}}"><i class="far fa-square"></i> <span>Materi Bab Course</span></a></li>
          <li><a class="nav-link" href="{{route('minicourse.index')}}"><i class="far fa-square"></i> <span>Materi Subbab Course</span></a></li>
          
          <li><a class="nav-link" href="{{route('schedule.index')}}"><i class="far fa-square"></i> <span>Jadwal zoom</span></a></li>
          
          <li class="menu-header">Users</li>
          <li><a class="nav-link" href="{{route('admin.user')}}"><i class="far fa-square"></i> <span>User Terdaftar</span></a></li>
          <li class="menu-header">Membership</li>
          <li><a class="nav-link" href="{{route('membership.index')}}"><i class="far fa-square"></i> <span>Paket Membership</span></a></li>
          <li class="menu-header">Lainnya</li>
          <li><a class="nav-link" href="{{route('admin.webinar')}}"><i class="far fa-square"></i> <span>Webinar</span></a></li>
          <li><a class="nav-link" href="{{route('admin.articles')}}"><i class="far fa-square"></i> <span>Artikel</span></a></li>
    </aside>
  </div>