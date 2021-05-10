<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('/node_modules/jqvmap/dist/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/weathericons/css/weather-icons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/weathericons/css/weather-icons-wind.min.css')}}">
  <link rel="stylesheet" href="{{asset('/node_modules/summernote/dist/summernote-bs4.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/components.css')}}">
</head>

<body>
    <div id="app">
      <div class="main-wrapper">
        @include('admin.components.navbar')
        @include('admin.components.sidebar')

        <div class="main-content">
            @yield('content')
        </div>