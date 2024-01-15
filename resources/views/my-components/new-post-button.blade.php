<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->

    @auth
        <a href="{{ route("posts.create") }}"><u>Create New Post</u></a>
    @else
        <p>Login to Create new Posts</p>
    @endauth

</div>