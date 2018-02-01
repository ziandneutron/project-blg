@extends('layouts.visitor-layout')
@section('style-css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
@endsection

@section('content')
<!-- Post Content Column -->
<div class="clearfix"></div>

<div class="col-md-8 col-sm-8 col-xs-8" style="font-size: larger;">
  <div class="panel">
    <div class="panel-body">
      <!-- Title -->
      <h1 class="page-header">{{$data->title}}</h1>
      <!-- Date/Time -->
      <p>Posted on {{date_format(date_create($data->created_at),'d M Y - H:i:s')}} by <a href="#">Admin</a></p>

      <hr>

      <!-- Preview Image -->
      @if ($data->image)
      <img class="img-fluid rounded thumbnail" width="100%" src="{{URL::asset('images/'.$data->image)}}" alt="{{$data->image}}">
      @endif
      <hr>

      <!-- Post Content -->
      <p>{{$data->desc}}</p>

      <hr>
      <hr>

      <!-- Comments Form -->
      <div class="card my-4">
        <h5 class="card-header">Leave Your Comment :</h5>
        <div class="card-body">
          <form method="post" action="{{ url('comment') }}">
            {{csrf_field()}}
            <div class="form-group">
              <input type="text" name="nama" class="form-control" placeholder="Your name">
              <input type="hidden" name="post_id" value="{{$data->id}}">
            </div>
            <div class="form-group">
              <textarea class="form-control" rows="3" name="comment" placeholder="Comment"></textarea>
            </div>
            <a href="{{ url('/') }}" class="btn btn-default">Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      @if(Session::has('alert-success'))
      <div class="alert alert-success">
        <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
      </div>
      @endif
      <!-- Single Comment -->
      @foreach($comment as $c)
      <div class="media"> 
        <div class="media-left"> 
          <a href="{{ url('post/'.$data->id)}}">
            <img alt="{{$data->image}}" class="media-object" style="width: 64px; height: 64px;" src="http://placehold.it/50x50"  data-holder-rendered="true"> 
          </a> 
        </div> 
        <div class="media-body">
           @auth
          <form action="{{ route('comment.destroy', $c->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-link btn-danger pull-right" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
          </form>
          @endauth
          <h4 class="media-heading">{{$c->nama}} <small>{{date_format(date_create($c->created_at),'d M Y - H:i:s')}}</small></h4>
          <p>{{$c->comment}}</p> 
        </div> 
      </div>
      @endforeach
    </div>

  </div>
</div>
<div class="col-md-4"> 
  <div class="panel"> 
    <div class="panel-heading">
      <h3 class="panel-title">Recent Posted</h3>
    </div>
    <div class="panel-body">
      <ul>
        @foreach($recent as $rs)
        <li><a href="{{url('post/'.$rs->id)}}">{{$rs->title}}</li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
@stop