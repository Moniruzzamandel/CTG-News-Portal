<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        <a class="navbar-brand" href="{{ url('/back') }}"><img src="{{ asset('/others') }}/{{ $shareData['admin_logo'] }}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="{{ url('/back') }}"><img src="{{ asset('/others') }}/{{ $shareData['admin_logo'] }}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="./"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @permission(['Permission Update','All','Permission'])
                <li>
                    <a href="{{ url('/back/permissions') }}"> <i class="menu-icon fa fa-book"></i>Permissions </a>
                </li>
                @endpermission
                @permission(['Permission Update','All'])
                <li>
                    <a href="{{ url('/back/roles') }}"> <i class="menu-icon fa fa-id-badge"></i>Roles </a>
                </li>
                @endpermission
                @permission(['Permission Update','All'])    
                <li>
                    <a href="{{ url('/back/authors') }}"> <i class="menu-icon fa fa-fire"></i>Authors </a>
                </li>
                @endpermission
                @permission(['Category List','All'])
                    <li>
                        <a href=" {{ url('/back/categories') }} "> <i class="menu-icon fa fa-laptop"></i>Categories </a>
                    </li>
                @endpermission
                @permission(['Post List','All'])
                    <li>
                        <a href=" {{ url('/back/posts') }} "> <i class="menu-icon fa fa-file"></i>Posts </a>
                    </li>
                @endpermission
                @permission(['Post List','All'])
                    <li>
                        <a href=" {{ url('/back/settings') }} "> <i class="menu-icon fa fa-desktop"></i>Settings </a>
                    </li>
                @endpermission
                
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->