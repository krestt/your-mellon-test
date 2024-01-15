<x-tasks-layout>


            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <a href="{{ route('posts.index') }}"><u><- Back</u></a>

                <h2 style="margin: 2rem 0;">Search Results</h2>

                @foreach($posts as $post)
                    <div id="{{ $post->id }}" style="border:1px solid black; padding: 1rem; margin-bottom: 1rem;">
                        <div class="post">
                            <div>
                                <h3>{{ $post->title }}</h3> <br>
                                {{ $post->text }} <br> 
                                By {{ $post->user->name }} <br> 
                                {{ $post->created_at }} <br>
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
