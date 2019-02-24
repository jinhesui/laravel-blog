@if (count($posts))
    @foreach ($posts as $post)
          <div class="top-docs-item">
            <div class="top-docs-item-inner">
              <div class="doc-meta">
                <a href="#" target="_blank">
                  <img src="{{ $post->user->avatar }}" alt="" style="width: 20px; height: 20px; border-radius: 10px;">
                </a>
                <p>
                  <a href="#" target="_blank">{{ $post->user->name }}</a>
                  <span> 发布于 </span>
                  <a href="{{ route('categories.show', $post->category_id) }}" target="_blank">{{ $post->category->name }}</a>
                </p>
              </div>
              <a class="doc-info with-cover" href="{{ route('posts.show', [$post->id]) }}" target="_blank">
                <div class="doc-info-summary">
                  <h4 class="doc-title">{{ $post->title }}</h4>
                  <div class="description">{{ $post->excerpt }}</div>
                  <p class="meta">{{$post->view_count}} 阅读 · {{ $post->reply_count }} 颗稻谷 · {{ $post->created_at }}</p>
                </div>
                <div class="cover">
                  <img src="https://cdn.nlark.com/yuque/0/2019/png/84141/1550635801697-a88e2559-18d8-40e7-ba65-9dcd495fd22c.png?x-oss-process=image/resize,m_fill,h_268,w_392" alt="">
                </div>
              </a>
            </div>
          </div>

      @if ( ! $loop->last)
        <hr>
      @endif

    @endforeach

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif
