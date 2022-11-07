@extends('app.base')

@section('content')
<form action="{{ url('post/' . $post->id) }}" method="post">
  @csrf
  @method('put')
  @error('default')
    <div class="alert alert-danger w-25 mx-auto mt-3 text-center">{{ $message }}</div>
  @enderror  
  <div class="container mt-3 border border-gray bg-dark text-white rounded-lg w-25">
      <div class="form-group p-3 m-0">
        <h4 class="mb-3 mt-2">Edit Post</h4>
        <label for="title">Title</label>
        <input value="{{ old('title', $post->title) }}" required type="text" class="form-control" minlength="1" maxlength="50" id="title" name="title">
        @error('title')
          <div class="alert alert-danger m-0 mt-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="form-group p-3 m-0">
        <label for="message" class="w-100">Message</label>
        <textarea required class="rounded-lg w-100" id="message" name="message" minlength="5" maxlength="100" rows="4">{{ old('message', $post->message) }}</textarea>
        @error('message')
          <div class="alert alert-danger m-0 mt-2 p-1 text-center">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary ml-3 mb-4">Edit</button>
      <a href="{{ url('post') }}" class="btn btn-secondary ml-2 mb-4">Back</a>
  </div>
</form>
@endsection