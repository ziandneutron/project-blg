@extends('layouts.adminlayout')

@section('content')
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
          <h1>Comment Preview</h1>
          <hr>
      </div>
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <li class="fa fa-pencil-square-o"></li>
            Comment Preview
          </div>
          <div class="panel-body">
            <!-- Author -->
            <p class="lead">
              Comment on Post Title by {{$data->nama}}
            </p>

            <hr>

            <!-- Date/Time -->
            <p>at {{$data->created_at}}</p>
            <hr>

            <!-- Post Content -->
            <p class="lead">{{$data->comment}}</p>
          </div>
          <div class="panel-footer">
            <form action="{{ route('comment.destroy', $data->id) }}" method="post">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <a href="{{ url('admin/comment') }}" class="btn btn-default">Back</a>
                <button class="btn btn-danger pull-right" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection