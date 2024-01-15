<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewComment;

class CommentsController extends Controller
{

    // Create
    public function create_action(Request $request)
    {
        if( $request->post_id && $request->text){
            $post = Post::where('id',$request->post_id)->first();
            if(!$post){
                dd('Error: Post not found');
            }
            $new_comment           = new Comment;
            $new_comment->post_id  = $post->id;
            $new_comment->text     = $request->text;
            $new_comment->user_id  = Auth::id();
            $new_comment->save();

            if($new_comment){
                Mail::to($post->user()->first()->email)->send(new NewComment( $post->title ));
            }else{
                dd( "Error at creating new comment" );
            }

            return redirect()->route('posts.index');
        }else{
            dd( "All fields are required" );
        }
    }



    // Edit
    public function edit(Request $request)
    {
        // use CheckCommentOwnership middleware
        $comment = $request->get('comment');
        return view( 'posts.comments.edit',compact('comment') );
    }

    public function edit_action(Request $request)
    {
        // use CheckCommentOwnership middleware
        $comment = $request->get('comment');
        $comment->text     = $request->text;
        $comment->save();
        return redirect()->route('posts.index');
    }



    // Delete
    public function delete_action(Request $request)
    {
        // use CheckCommentOwnership middleware
        $comment = $request->get('comment');
        $comment->delete();
        return redirect()->back();
    }
}
