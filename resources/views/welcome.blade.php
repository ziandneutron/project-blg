@extends('layouts.visitor-layout')
@section('content')
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @php $i = 0; @endphp
    @foreach($slide as $sld)
    <li data-target="#carousel-example-generic" data-slide-to="{{$i}}" class="active"></li>
    @php $i++; @endphp
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @php $i = 0; @endphp
    @foreach($slide as $sld)
    <div class="item @if($i == 0) active @endif">
      @php $i++; @endphp
      <div class="" style="height: 300px;overflow: hidden;">
        <img src="{{ URL::asset('images/'.$sld->image)}}" alt="{{$sld->image}}" width="100%" style="margin-top:-50px">
      </div>
      <div class="carousel-caption">
        <h3>{{$sld->title}}</h3>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left fa fa-chevron-left " aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right fa fa-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Blog Entries Column -->
  <h1>News</h1>
  <div class="panel">
      <!-- Blog Post -->
      @foreach($post as $data)
      <div class="panel-body">
      <div class="media"> 
        <div class="media-left"> 
          <a href="{{ url('post/'.$data->id)}}">
            <img alt="{{$data->image}}" class="media-object" style="width: 200px; height: 200px;" src="{{ URL::asset('images/'.$data->image)}}" data-holder-rendered="true"> 
          </a> 
        </div> 
        <div class="media-body"> 
          <div class="text-muted pull-right" style="margin-top:10px">
           {{date_format(date_create($data->created_at),'d M Y')}}
           by <a href="#">Admin</a>
          </div>
          <h2 class="media-heading">{{$data->title}}</h2> <hr style="margin-top:0">
          <p>{{str_limit($data->desc, $limit = 500, $end = '...')}}</p> 
          <a href="{{ url('post/'.$data->id)}}" class="btn btn-primary">Read More &rarr;</a>
          <br>
        </div> 
      </div>
    </div>
     @endforeach

     <!-- Pagination -->
     <div class="panel-footer">
      {{ $post->links() }} 
     </div>
</div>
@stop

