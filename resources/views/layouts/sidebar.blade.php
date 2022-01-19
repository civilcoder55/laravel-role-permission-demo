<nav class="dash-nav-list">
    <a href="{{route('user.home')}}" class="dash-nav-item">
        <i class="fas fa-home"></i> Home </a>
    <a href="{{route('user.albums.index')}}" class="dash-nav-item">
        <i class="fas fa-images"></i> My Albums </a>

    <a href="{{route('user.profile.show')}}" class="dash-nav-item">
        <i class="fas fa-user-circle"></i> Profile </a>


    <hr>
    @can('admin-access')
    @can('view-dashboard')
    <a href="{{route('admin.dashboard')}}" class="dash-nav-item">
        <i class="fas fa-asterisk"></i> Dashboard </a>
    @endcan


    @can('list-user')
    <a href="{{route('admin.users.index')}}" class="dash-nav-item">
        <i class="fas fa-user-friends mr-2"></i> Users </a>
    @endcan

    @can('list-album')
    <a href="{{route('admin.albums.index')}}" class="dash-nav-item">
        <i class="fas fa-images mr-2"></i> Albums </a>
    @endcan

    @if (auth()->user()->super_admin)
    <a href="{{route('admin.roles.index')}}" class="dash-nav-item">
        <i class="fas fa-unlock mr-2"></i> Roles </a>
    @endif

    @endcan


</nav>