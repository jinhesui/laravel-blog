@extends('layouts.app')
@section('title', $post->title)
@section('description', $post->excerpt)

@section('content')
  <div class="article">
    <div class="title">
      <h1 class="text-center mt-3 mb-3">{{ $post->title }}</h1>
    </div>
    <div class="post-body mt-4 mb-4">
      {!! $post->body !!}
    </div>
    <div class="operate text-center">
      <p><span>有兴趣，能读懂，且受益</span></p>
      <div><img alt="{{ $post->user->name }}" src="{{ $post->user->avatar }}" style="width:150px;height:150px;" /></div>
    </div>
    <div class="article-meta">
      <div class="text-center">
        <span class="item">
          <i class="fab fa-gg" title="作者"></i>
          <span class="item-text">
            <span>{{ $post->user->name }}</span>
          </span>
        </span>
        <span class="item">
          <i class="far fa-clock" title="更新时间"></i>
          <span class="item-text">
            <span>{{ $post->updated_at }}</span>
          </span>
        </span>
        <span class="item">
          <i class="fas fa-book-open" title="阅读数"></i>
          <span class="item-text">{{ $post->visits()->count() }}</span>
        </span>
        <i class="far fa-comment-dots" title="评论数"></i>
        <span class="item-text">{{ $post->reply_count }}</span>
      </div>
    </div>
    <hr>
    <div class="wrapper">
      <div class="prev float-left">
        @if ($post->id <= 1)
          <a href="#">
          <div class="label"><span>上一篇</span></div>
          <h6>无人能出其左右</h6>
          </a>
        @else
        <a href="{{ route('posts.show', ['post' => $post->id - 1]) }}">
          <div class="label"><span>上一篇</span></div>
          <h6>{{ $previous->title }}</h6>
        </a>
        @endif
      </div>
      <div class="next float-right">
        @if (($post->id + 1) >= $total)
          <a href="#">
          <div class="label"><span>下一篇</span></div>
          <h6>无人能出其左右</h6>
        </a>
        @else
        <a href="{{ route('posts.show', ['post' => $post->id + 1]) }}">
          <div class="label"><span>下一篇</span></div>
          <h6>{{ $next->title }}</h6>
        </a>
        @endif
      </div>
      <div style="clear: both;"></div>
    </div>
    <hr>
    {{-- 用户回复列表 --}}
      <div class="post-reply mt-4">
        <div class="reply-body">
          @include('posts._reply_list', ['replies' => $post->replies()->with('user')->get()])
          @includeWhen(Auth::check(), 'posts._reply_box', ['post' => $post])
        </div>
      </div>
  </div>
@endsection
