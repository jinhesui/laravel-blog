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

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
      </ul>
    </div>
  </div>
</nav>
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
      <div class="lark-dropdown dropdown___3qr8n themeGrey___2M8WG">
        <span class="ant-dropdown-trigger ant-input-affix-wrapper">
          <span class="ant-input-prefix">
            <i class="fa fa-search anticon anticon-search" aria-hidden="true"></i>
          </span>
          <input class="ant-input" placeholder="搜索" spellcheck="true" type="text" value="">
        </span>
      </div>
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{ active_class(if_route('posts.index')) }}"><a class="nav-link" href="{{ route('posts.index') }}">文章</a></li>
        <li class="nav-item {{ category_nav_active(1) }}"><a class="nav-link" href="{{ route('categories.show', 1) }}">日志</a></li>
        <li class="nav-item {{ category_nav_active(2) }}"><a class="nav-link" href="{{ route('categories.show', 2) }}">数学</a></li>
        <li class="nav-item {{ category_nav_active(3) }}"><a class="nav-link" href="{{ route('categories.show', 3) }}">英语</a></li>
        <li class="nav-item {{ category_nav_active(4) }}"><a class="nav-link" href="{{ route('categories.show', 4) }}">笔记</a></li>
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav navbar-right">
        <!-- Authentication Links -->
      </ul>
    </div>
  </div>
</nav>
@endif
