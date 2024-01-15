<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Comment;

class CheckCommentOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $comment_id = $request->route('comment_id')?:$request->comment_id;
        if(!$comment_id){
            dd('Comment id is required');
        }

        $comment = Comment::where('id',$comment_id)->first();
        if( $comment && $comment->user_id == auth()->id() ){
            $request->merge([
                'comment' => $comment
            ]);            
            return $next($request);
        }else{
            dd('You are not owner of this comment');
            // return redirect()->route('posts.index')->with('error', 'You do not have permission to access.');
        }

    }
}
