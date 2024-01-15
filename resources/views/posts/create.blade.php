<x-tasks-layout>


            <div class="mx-auto p-6 lg:p-8" style="max-width: 800px;">
                <h2>Create new Post</h2>
                <form method="POST" action="{{ route('posts.create_action') }}">
                    @csrf
                    <label>Title</label>
                    <input type="title" name="title" style="width: 100%; border: 1px solid black; padding: 5px;" required>
                    <label>Text</label>
                    <textarea name="text" rows="7" style="width: 100%; border: 1px solid black; padding: 5px;" required></textarea>
                    <input type="submit" name="" style="text-decoration: underline; float: right;">
                </form>
            </div>

</x-tasks-layout>
