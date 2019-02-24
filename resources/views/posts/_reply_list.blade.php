<h6>{{ $post->reply_count }} 条回复</h6>
<ul class="list-unstyled">
  @foreach ($replies as $index => $reply)
    <li class=" media" name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
      <div class="media-left">
        <a href="#">
          <img alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}" style="width:32px;height:32px;border-radius: 16px;" />
        </a>
      </div>

      <div class="media-body">
        <div class="media-heading mt-0 mb-1 text-secondary">
          <a href="#" title="{{ $reply->user->name }}">
            {{ $reply->user->name }}
          </a>
          <span class="text-secondary"> • </span>
          <span class="meta text-secondary" title="{{ $reply->created_at }}">{{ $reply->created_at }}</span>

          {{-- 回复删除按钮 --}}
          <span class="meta float-right ">
            <a title="删除回复">
              <i class="far fa-trash-alt"></i>
            </a>
          </span>
        </div>
        <div class="reply-content text-secondary">
          {!! $reply->content !!}
        </div>
      </div>
    </li>
  @endforeach
</ul>
