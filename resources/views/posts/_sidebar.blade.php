<div class="ant">
  <div class="block-explore-title">
    <h3>侧边栏</h3>
  </div>
</div>
@if (count($links))
  <div class="card mt-4" style="border: none;">
    <div class="card-body pt-2">
      <div class="text-center mt-1 mb-0 text-muted">资源推荐</div>
      <hr class="mt-2 mb-3">
      @foreach ($links as $link)
        <a class="media mt-1" href="{{ $link->link }}" target="_blank">
          <div class="media-body">
            <span class="media-heading text-muted">{{ $link->title }}</span>
          </div>
        </a>
      @endforeach
    </div>
  </div>
@endif
