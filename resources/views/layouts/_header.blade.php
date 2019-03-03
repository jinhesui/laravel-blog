@if (active_class(if_route('posts.show')))
<nav class="navbar navbar-expand-lg navbar-light navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="{{ url('/') }}">
      果壳机动
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item"><i class="fas fa-chevron-right nav-link" aria-hidden="true" style="font-size: 15px;padding-top: 20px;"></i></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('categories.show', $post->category_id) }}"><span class="navbar-brand">{{ $post->category->name }}</span></a></li>
        <li class="nav-item"><i class="fas fa-chevron-right nav-link" aria-hidden="true" style="font-size: 15px;padding-top: 20px;"></i></li>
        <li class="nav-item"><span class="navbar-brand" style="padding-top: 12px;padding-left: 5px;">{{ $post->title }}</span></li>
      </ul>
@else
<nav class="navbar navbar-expand-lg navbar-light navbar-static-top">
  <div class="container">
    <!-- Branding Image -->
    <a class="navbar-brand " href="{{ url('/') }}">
      果壳机动
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form action="{{ route('posts.index') }}" class="search-form">
        <div class="lark-dropdown dropdown___3qr8n themeGrey___2M8WG">
          <span class="ant-dropdown-trigger ant-input-affix-wrapper">
            <span class="ant-input-prefix">
              <i class="fa fa-search anticon anticon-search" aria-hidden="true"></i>
            </span>
            <input class="ant-input" name="search" placeholder="搜索" spellcheck="true" type="text">
          </span>
        </div>
      </form>
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ active_class(if_route('posts.index')) }}"><a class="nav-link" href="{{ route('posts.index') }}">文章</a></li>
        <li class="nav-item {{ category_nav_active(1) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">日志</a></li>
        <li class="nav-item {{ category_nav_active(2) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">数学</a></li>
        <li class="nav-item {{ category_nav_active(3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">英语</a></li>
        <li class="nav-item {{ category_nav_active(4) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">笔记</a></li>
      </ul>
@endif

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">登录</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">注册</a></li>
        @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/60/h/60" class="img-responsive img-circle" width="30px" height="30px">
              {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              {{-- <a class="dropdown-item" href="">个人中心</a>
              <a class="dropdown-item" href="">编辑资料</a>
              <div class="dropdown-divider"></div> --}}
              <a class="dropdown-item" id="logout" href="#">
                <form action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
                </form>
              </a>
            </div>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
