<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::paginate(10);
        return view('admin/comment/comment')->with('comment',$comment);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/posting-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $post_id = $request->get('post_id');
        $comment->nama 	= $request->get('nama');
        $comment->comment 	= $request->get('comment');
        $comment->post_id 	= $request->get('post_id');
        // dd('test');
        $comment->save();
        return redirect()->back()->with('alert-success','Berhasil Menambahkan Komentar!');;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = comment::find($id);
        return view('admin/comment/comment-preview')->with('data',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     // Massive delete for checkbox All

    public function destroyall(Request $request)
    {	
    	if($request->get('checkbox') !== null)
    	{
	        if(count(collect($request->checkbox)) > 1){
	          $comment = Comment::whereIn('id',$request->get('checkbox'));
	          $comment->delete();
	        }else{
	          $comment = Comment::find($request->get('checkbox'))->first();
	          $comment->delete();
	        }
    	}
        return back();
    }

    public function destroy($id)
    {
        $data = Comment::where('id',$id)->first();
        $data->delete();
        return redirect()->back()->with('alert-success','Data berhasi dihapus!');
    }
}
