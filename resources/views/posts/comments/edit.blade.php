<x-tasks-layout>


            <div class="mx-auto p-6 lg:p-8" style="max-width: 800px;">
                <h2>Edit Comment</h2>
                <form method="POST" action="{{ route('posts.comments.edit_action') }}">
                    @csrf
                    <label>Text</label>
                    <textarea name="text" rows="7" style="width: 100%; border: 1px solid black; padding: 5px;" required>{{ $comment->text }}</textarea>
                    <input type="text" name="comment_id" value="{{$comment->id}}" hidden>
                    <input type="submit" name="" style="text-decoration: underline; float: right;">
                </form>
            </div>

</x-tasks-layout>
