@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Post / Show #{{ $post->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('posts.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('posts.edit', $post->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $post->title }}
</p> <label>Body</label>
<p>
	{{ $post->body }}
</p> <label>User_id</label>
<p>
	{{ $post->user_id }}
</p> <label>Category_id</label>
<p>
	{{ $post->category_id }}
</p> <label>Reply_count</label>
<p>
	{{ $post->reply_count }}
</p> <label>View_count</label>
<p>
	{{ $post->view_count }}
</p> <label>Last_reply_user_id</label>
<p>
	{{ $post->last_reply_user_id }}
</p> <label>Order</label>
<p>
	{{ $post->order }}
</p> <label>Excerpt</label>
<p>
	{{ $post->excerpt }}
</p> <label>Slug</label>
<p>
	{{ $post->slug }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
