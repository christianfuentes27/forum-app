@extends('app.base')

@section('content')
<div class="container mt-4" id="post-container">
  <a href="{{ url('post/create') }}" class="btn btn-primary btn-lg btn-block mb-2">New Post <i class="fa-regular fa-plus ml-1"></i></a>
  
  @foreach($posts as $post)
    <div class="card bg-dark border-bottom border-gray">
      <div class="card-body d-flex">
        <div class="mr-3">
          <img src="{{ url($post->user->avatar) }}" class="rounded-circle" style="width:50px"></img>
        </div>
        <div>
          <h4 class="card-title text-white">{{ $post->title }}</h4>
          <p class="card-text text-white">{{ $post->message }}</p>
          <p class="card-text text-white-50">{{ $post->updated_at }}</p>
          <p class="card-text text-white-50">{{ $post->user->name }}</p>
          <a href="#" class="comments-btn card-link" key="{{ $post->id }}">{{ App\Models\Comment::where(['idpost' => $post->id])->count()}} comments <i class="fa-sharp fa-solid fa-comments text-white ml-1"></i></a>
          @if(session()->has('user'))
            @if($post->user->id == session()->get('user')->id && $post->getMinutes($post))
              <a href="{{ url('post/' . $post->id . '/edit') }}" class="card-link">Edit <i class="fa-solid fa-pen text-white ml-1"></i></a>
              <a href="javascript: void(0);" 
                 class="card-link deletePost"
                 data-name="{{ $post->title }}"
                 data-url="{{ url('post/' . $post->id )}}">Delete <i class="fa-solid fa-trash text-white ml-1"></i></a>
            @endif
          @endif
        </div>
      </div>
    </div>
    <div class="container my-2 w-75 ml-auto mr-0 p-0" key="comment-{{ $post->id }}" style="display:none">
        @if(session()->has('user'))
          <form action="{{ url('comment') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success btn-lg btn-block mb-2" style="font-size: 1em">Add comment <i class="fa-regular fa-plus ml-1"></i></button>
            <textarea required class="rounded-lg w-100" id="message" name="message" minlength="5" maxlength="100" rows="3" style="resize: none; font-size: .9em">{{ old('message') }}</textarea>
            @error('message')
              <div class="alert alert-danger m-0 mb-1 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
            @enderror
            <input type="hidden" name="idpost" value="{{ $post->id }}"/>
          </form>
        @endif
        @foreach($post->comments as $comment)
          <div class="card bg-dark border-bottom border-gray">
            <div class="card-body d-flex">
              <div class="mr-3">
                <img src="{{ url($comment->user->avatar) }}" class="rounded-circle" style="width:30px"></img>
              </div>
              <div>
                <p class="card-text text-white">{{ $comment->message }}</p>
                <p class="card-text text-white-50">{{ $comment->updated_at }}</p>
                <p class="card-text text-white-50">{{ $comment->user->name }}</p>
                @if(session()->has('user'))
                  @if($comment->user->id == session()->get('user')->id && $post->getMinutes($comment))
                    <a href="{{ url('comment/' . $comment->id . '/edit') }}" class="card-link">Edit <i class="fa-solid fa-pen text-white ml-1"></i></a>
                    <a href="javascript: void(0);" 
                       class="card-link deletePost"
                       data-name="{{ $comment->id }}"
                       data-url="{{ url('comment/' .$comment->id) }}">Delete <i class="fa-solid fa-trash text-white ml-1"></i></a>
                  @endif
                @endif
              </div>
            </div>
          </div>
        @endforeach
    </div>
  @endforeach
</div>
<script type="text/javascript" src="assets/js/index.js"></script>
@endsection

@section('scripts')
<form action="" method="post" id="deleteForm">
  @csrf
  @method('delete')
</form>
<script src="{{ url('assets/js/delete.js') }}"></script>
@endsection