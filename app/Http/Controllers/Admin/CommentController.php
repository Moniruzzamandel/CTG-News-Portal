<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Auth;
use Session;


class CommentController extends Controller
{
    public function index($id){
    	$page_name =  'Comments';
    	$data = Comment::with(['post'])->where('post_id',$id)->orderBy('id','DESC')->get();
    	return view('admin.comment.index',compact('page_name','data'));
    }

    public function reply($id){
        $page_name = 'Comment Reply';
        return view('admin.comment.reply',compact('page_name','id'));
 
    }
 
 
    public function store(Request $request){
        $this->validate($request,[
            'comment' =>'required',
            'post_id' =>'required',
        ]);
        $comment = new Comment();
        $comment->name = Auth::user()->name;
        $comment->status = 0;
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->save();
        
        Session::flash('success', 'Successfully Comments Store');   
        return redirect()->route('comments', ['id'=>$request->post_id]);
  
    }

    public function status($id){
        $comment = Comment::find($id);
        if ($comment->status === 1) {
             $comment->status = 0;
         }else{
              $comment->status = 1;
         }
           $comment->save();

        Session::flash('success', 'Successfully Status Updated');   
        return redirect()->route('comments',['id'=>$comment->post_id]);
     }
}
