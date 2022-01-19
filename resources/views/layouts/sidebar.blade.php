<nav class="dash-nav-list">
    <a href="{{route('user.home')}}" class="dash-nav-item">
        <i class="fas fa-home"></i> Home </a>
    <a href="{{route('user.albums.index')}}" class="dash-nav-item">
        <i class="fas fa-images"></i> My Albums </a>

    <a href="{{route('user.profile.show')}}" class="dash-nav-item">
        <i class="fas fa-user-circle"></i> Profile </a>


    <a href="{{route('admin.dashboard')}}" class="dash-nav-item">
        <i class="fas fa-asterisk"></i> Dashboard </a>

    <a href="{{route('admin.users.index')}}" class="dash-nav-item">
        <i class="fas fa-user-friends"></i> Users </a>

    <a href="{{route('admin.roles.index')}}" class="dash-nav-item">
        <i class="fas fa-unlock"></i> Roles </a>
</nav>