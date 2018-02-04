@extends('layouts.adminlayout')

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1>New Post</h1>
                <hr>
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <li class="fa fa-pencil-square-o"></li>
                        Post
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ url('admin/post') }}" enctype="multipart/form-data">
                            <div class="form-group @if ($errors->has('title')) has-error @endif">
                                <label for="title">Post Title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Place your title here">
                                @if ($errors->has('title'))
                                <div class="alert alert-danger" style="margin-top: 5px">
                                    {{$errors->first('title')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group @if ($errors->has('content')) has-error @endif">
                                <label for="content">Post Content</label>
                                <textarea id="content" name="content" class="form-control" rows="7" style="resize:none;" placeholder="Place your content here">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                <div class="alert alert-danger" style="margin-top: 5px">
                                    {{$errors->first('content')}}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" name="image" accept="image/*" >
                            </div>
                            <div class="form-group">
                                {{csrf_field()}}
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection