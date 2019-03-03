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
                  <p class="meta">{{ $post->visits()->count() }} 阅读 · {{ $post->reply_count }} 评论 · {{ $post->created_at }}</p>
                </div>
                @if ($post->image)
                <div class="cover">
                  <img src="{{ $post->image }}">
                </div>
                @endif
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
