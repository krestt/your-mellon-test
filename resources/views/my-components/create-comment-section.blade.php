<div>
    <!-- He who is contented is rich. - Laozi -->
    @auth
        <a href=""><u>Write Comment</u></a>
    @else
        <p>Login to Create new Comment</p>
    @endauth    

    <div class="new-comment-form-container">
        <form method="POST" action="{{ route('posts.comments.create_action') }}">
            @csrf
            <textarea name="text" cols="80" rows="5"></textarea>
            <br>
            <input type="text" name="post_id" value="{{ $post->id }}" hidden>
            <input type="submit" name="">
        </form>
    </div>

    @if( $post->comments->count() )
        <div class="comments" style="padding: 0 3rem; margin-top: 2rem;">
            <h3 style="padding-left:1rem;">Comments:</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div id="content">
                        {{ $comment->user->name }} <br>
                        {{ $comment->created_at }} <br>
                        {{ $comment->text }}
                    </div>
                    @if( $comment->user_id == Auth::id() )
                        <div id="actions">
                            <a href="{{ route('posts.comments.delete_action',$comment->id) }}"><u>Delete</u></a> | 
                            <a href="{{ route('posts.comments.edit',$comment->id) }}"><u>Edit</u></a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>


<script>
    
</script>