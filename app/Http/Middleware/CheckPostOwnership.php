<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class CheckPostOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $post_id = $request->route('post_id')?:$request->post_id;
        if(!$post_id){
            dd('Post id is required');
        }

        $post = Post::where('id',$post_id)->first();
        if( $post && $post->user_id == auth()->id() ){
            $request->merge([
                'post' => $post
            ]);            
            return $next($request);
        }else{
            dd('You are not owner of this post');
            // return redirect()->route('posts.index')->with('error', 'You do not have permission to access.');
        }

    }
}
