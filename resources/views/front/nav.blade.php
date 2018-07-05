<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Trang chủ</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">Giới thiệu</a>
                </li>
                <li>
                    <a href="{{ route('feedback.create') }}">Liên hệ</a>
                </li>
            </ul>

            <form action="{{ route('search') }}" method="get" class="navbar-form navbar-left" role="search">
                @csrf
                <div class="form-group">
                    <input type="text" name="keyword" class="form-control" placeholder="{{ __('Tìm kiếm') }}">
                </div>
                <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
            </form>

            <ul class="nav navbar-nav pull-right">
                <li>
                    <a href="{{ route('register') }}">Đăng ký</a>
                </li>
                <li>
                    <a href="{{ route('login') }}">Đăng nhập</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>