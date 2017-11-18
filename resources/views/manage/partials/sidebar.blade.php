<aside class="menu admin-sidebar">
   
    <p class="menu-label">General</p>
    <ul class="menu-list">
        <li><a href="{{ route('manage.dashboard') }}" {!! request()->is('manage/dashboard') ? 'class="is-active"' : '' !!}>Dashboard</a></li>
    </ul>

    <p class="menu-label">Administration</p>
    <ul class="menu-list">

        <li><a href="{{ route('users.index') }}" {!! request()->is('manage/users') ? 'class="is-active"' : '' !!}>Users</a></li>
        <li><a href="{{ route('roles.index') }}" {!! request()->is('manage/roles') ? 'class="is-active"' : '' !!}>Roles</a></li>
        <li><a href="{{ route('posts.index') }}" {!! request()->is('manage/posts*') ? 'class="is-active"' : '' !!}>Posts</a></li>
        <li><a href="{{ route('categories.index') }}" {!! request()->is('manage/categories') ? 'class="is-active"' : '' !!}>Categories</a></li>
    </ul>
</aside>