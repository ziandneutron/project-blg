@extends('layouts.adminlayout')

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          <h1>Post Preview</h1>
          <hr>
      </div>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <li class="fa fa-pencil-square-o"></li>
            Post Preview
          </div>
          <div class="panel-body">
            <!-- Title -->
            <h1 class="mt-4">{{$data->title}}</h1>

            <!-- Author -->
            <p class="lead">
              by
              <a href="#">Admin</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on {{$data->created_at}}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" style="width: 100px" src="{{URL::asset('images/'.$data->image)}}" alt="{{$data->image}}">

            <hr>

            <!-- Post Content -->
            <p class="lead">{{$data->desc}}</p>
          </div>
          <div class="panel-footer">
            <a href="{{ url('admin/post') }}" class="btn btn-default">Back</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection