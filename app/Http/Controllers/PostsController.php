<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostsController extends Controller
{

    public function index(Request $request)
    {
        $posts = Post::latest('created_at')->get();
        return view('posts.index', compact('posts'));
    }



    // Search
    public function search(Request $request)
    {
        $search = $request->search ?: null;
        $posts = Post::latest('created_at')
                     ->where('title', 'LIKE' ,'%'.$search.'%')
                     ->orWhere('text', 'LIKE' ,'%'.$search.'%')
                     ->orWhereHas('comments', function($query) use($search) {
                        $query->where('text', 'LIKE', '%'.$search.'%');
                     })
                     ->get();
        return view('posts.search', compact('posts'));
    }



    // Create
    public function create_form()
    {
        return view('posts.create');
    }

    public function create_action(Request $request)
    {
        if( $request->title && $request->text){
            $new_post          = new Post;
            $new_post->title   = $request->title;
            $new_post->text    = $request->text;
            $new_post->user_id = Auth::id();
            $new_post->save();
            return redirect()->route('posts.index');
        }else{
            dd( "All fields are required" );
        }
    }



    // Edit
    public function edit(Request $request)
    {
        // use CheckPostOwnership middleware
        // use CheckPostCommentsCount middleware
        $post = $request->get('post');
        return view( 'posts.edit',compact('post') );
    }

    public function edit_action(Request $request)
    {
        // use CheckPostOwnership middleware
        // use CheckPostCommentsCount middleware
        $post        = $request->get('post');
        $post->title = $request->title;
        $post->text  = $request->text;
        $post->save();
        return redirect()->route('posts.index');
    }

   

    // Delete
    public function delete_action(Request $request)
    {
        // use CheckPostOwnership middleware
        // use CheckPostCommentsCount middleware        
        $post = $request->get('post');
        $post->forceDelete();
        return redirect()->back();
    }


    // CRON
        //  all posts that have not received a comment for 1 year should be soft deleted.
}
