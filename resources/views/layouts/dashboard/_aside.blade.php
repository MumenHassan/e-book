<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="{{asset('dashboard_files/images/avatar.png')}}" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
            <p class="app-sidebar__user-designation">...</p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item" href="{{route('dashboard.welcome')}}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
{{--        @if(auth()->user()->hasPermission('categories_read'))--}}
        <li><a class="app-menu__item" href="{{route('dashboard.categories.index')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Categories</span></a></li>
{{--        @endif--}}

{{--        @if(auth()->user()->hasPermission('movies_read'))--}}
{{--            <li><a class="app-menu__item" href="{{route('dashboard.movies.index')}}"><i class="app-menu__icon fa fa-play"></i><span class="app-menu__label">Movies</span></a></li>--}}
{{--        @endif--}}

{{--        @if(auth()->user()->hasPermission('roles_read'))--}}
{{--        <li><a class="app-menu__item" href="{{route('dashboard.roles.index')}}"><i class="app-menu__icon fa fa-anchor"></i><span class="app-menu__label">Roles</span></a></li>--}}
{{--        @endif--}}

{{--        @if(auth()->user()->hasPermission('users_read'))--}}
        <li><a class="app-menu__item" href="{{route('dashboard.authors.index')}}"><i class="app-menu__icon fa fa-pencil"></i><span class="app-menu__label">Authors</span></a></li>
        <li><a class="app-menu__item" href="{{route('dashboard.publishing-houses.index')}}"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Publishing Houses</span></a></li>
        <li><a class="app-menu__item" href="{{route('dashboard.books.index')}}"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Books</span></a></li>
        <li><a class="app-menu__item" href="{{route('dashboard.users.index')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Users</span></a></li>

{{--        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>--}}
    </ul>
</aside>
