@extends('layouts.app')
@section('title', '文章列表')

@section('content')

<div class="row mb-5">
  <div class="col-lg-8 col-md-8">
    <div class="top-docs">

      <div class="block-explore-title">
        <h3>头条文章</h3>
      </div>

      <div class="post-list">
        {{-- 话题列表 --}}
        @include('posts._post_list', ['posts' => $posts])
        {{-- 分页 --}}
        <div class="mt-5">
          {!! $posts->appends(Request::except('page'))->render() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-1 col-md-1"></div>

  <div class="col-lg-3 col-md-3 sidebar">
    @include('posts._sidebar')
  </div>
</div>

@endsection
