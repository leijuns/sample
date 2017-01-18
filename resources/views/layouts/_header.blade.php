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
                <li><a href="{{ route('help') }}">帮助</a></li>
                <li><a href="{{ route('login') }}">登陆</a></li>
            </ul>
        </div>
    </div>
</nav>
