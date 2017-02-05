<nav class="navbar navbar-default topnav" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#footer-nav-toogle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Sample App</a>
        </div>
        <div class="collapse navbar-collapse" id="footer-nav-toogle">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">首页</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                <li><a href="{{ route('users.index') }}">所有用户</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('users.show', Auth::user()->id) }}">个人中心</a></li>
                        <li><a href="{{ route('users.edit', Auth::user()->id) }}">编辑资料</a></li>
                        <li><a href="#" id="logout">
                                <form action="{{ route('logout') }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-block btn-danger" name="submit">退出</button>
                                </form>
                            </a>
                        </li>
                    </ul>
                </li>
                @else
                <li><a href="{{ route('help') }}">帮助</a></li>
                <li><a href="{{ route('login') }}">登陆</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
