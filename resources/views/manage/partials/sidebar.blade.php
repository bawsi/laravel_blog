<aside class="menu admin-sidebar">
   
    <p class="menu-label">General</p>
    <ul class="menu-list">
        <li><a href="{{ route('manage.dashboard') }}" class="is-active">Dashboard</a></li>
    </ul>

    <p class="menu-label">Administration</p>
    <ul class="menu-list">

        <li><a href="{{ route('users.index') }}">Users</a></li>
        <li><a href="{{ route('roles.index') }}">Roles</a></li>
        <li><a href="{{ route('posts.index') }}">Posts</a></li>
        <li><a href="{{ route('categories.index') }}">Categories</a></li>
    </ul>
</aside>