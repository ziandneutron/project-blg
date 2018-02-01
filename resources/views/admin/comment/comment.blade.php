@extends('layouts.adminlayout')

@section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>
                          <span>All Comments</span>
                        </h1>
                        <hr/>
                    </div>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-file-o fa-fw"></i>
                                Comments
                            </div>
                            <div class="panel-body">
                             <table class="table table-striped">
                                <thead>
                                 <tr>
                                     <th style="width: 5px">
                                       <input type="checkbox" id="checkall">
                                     </th>
                                     <th></th>
                                     <th colspan="2">
                                        <button type="button" class="btn btn-danger pull-right" onclick="event.preventDefault();document.getElementById('destroy-all').submit();"><li class="fa fa-trash"></li></button>
                                     </th>
                                 </tr>   
                                </thead>
                                 <tbody>
                                    <form id="destroy-all" action="{{ url('admin/comment-deleteall') }}" method="POST"> {{ csrf_field() }} 
                                    @foreach($comment as $c)
                                     <tr>
                                         <td style="width: 5px">
                                            <input type="checkbox" name="checkbox[]" value="{{$c->id}}" class="checkboxes">
                                         </td>
                                         <td class="col-md-2">
                                             <p>{{$c->nama}}</p>
                                              <small>{{ $c->created_at }}</small>
                                         </td>
                                         <td class="col-md-6">
                                             {{$c->comment}}
                                         </td>
                                         <td class="col-md-3" style="vertical-align: middle; text-align:right">
                                            <a href="{{ url('admin/comment',[ $c->id]) }}" class="btn btn-default"> <li class="fa fa-search"></li> Preview</a>
                                         </td>
                                     </tr> 
                                    @endforeach
                                    </form>
                                 </tbody>
                             </table>
                             {{ $comment->links() }}
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