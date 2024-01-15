<x-tasks-layout>


            <div class="max-w-7xl mx-auto p-3 lg:p-8">
                <x-new-post-button/>
            </div>

            <div class="max-w-7xl mx-auto p-3 lg:p-8">
                <form method="POST" action="{{ route('posts.search') }}">
                    @csrf
                    <input type="text" name="search" style="border:1px solid black;" placeholder="title,text,comment">
                    <input type="submit" value="Search" style="cursor:pointer;">
                </form>
            </div>

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <h2>Posts</h2>
                @if( $posts->count() < 1 )
                    <p>There are no Posts created yet.</p>
                @endif
                @foreach($posts as $post)
                    <div id="{{ $post->id }}" style="border:1px solid black; padding: 1rem; margin-bottom: 1rem;">
                        <div class="post">
                            <div>
                                <h3>{{ $post->title }}</h3>
                                <br>
                                <p style="margin-right: 1rem;">
                                    {{ $post->text }}|
                                </p>
                                <br>
                                <p> 
                                By {{ $post->user->name }} <br> 
                                {{ $post->created_at }} <br>
                                </p>
                            </div>
                            @if( $post->user_id == Auth::id() )
                                <div id="actions">
                                    <a href="{{ route('posts.delete_action',$post->id) }}"><u>Delete</u></a> | 
                                    <a href="{{ route('posts.edit',$post->id) }}"><u>Edit</u></a>
                                </div>
                            @endif
                        </div>
                        <x-create-comment-section :post="$post"/>
                    </div>
                @endforeach
            </div>

</x-tasks-layout>
