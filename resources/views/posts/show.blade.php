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
      <p><span>若有收获，就赏束稻谷吧</span></p>
      <div><i class="fab fa-pagelines"></i></div>
      <span class="lark-like-count"><span>133</span> 颗稻谷</span>
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
          <span class="item-text">579</span>
        </span>
        <i class="far fa-comment-dots" title="评论数"></i>
        <span class="item-text">3</span>
      </div>
    </div>
    <hr>
    <div class="wrapper">
      <div class="prev float-left">
        <a href="">
          <div class="label"><span>上一篇</span></div>
          <h6>SEE Conf 和 D2 资料下载</h6>
        </a>
      </div>
      <div class="next float-right">
        <a href="">
          <div class="label"><span>下一篇</span></div>
          <h6>2019 SEE Conf 语雀礼品领取办法</h6>
        </a>
      </div>
      <div style="clear: both;"></div>
    </div>
    <hr>
  </div>
@endsection
