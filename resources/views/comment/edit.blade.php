@extends('app.base')

@section('content')
<form action="{{ url('comment/' . $comment->id) }}" method="post">
  @csrf
  @method('put')
  @error('default')
    <div class="alert alert-danger w-25 mx-auto mt-3 text-center">{{ $message }}</div>
  @enderror  
  <div class="container mt-5 border border-gray bg-dark text-white rounded-lg w-25">
      <div class="form-group p-3 m-0">
        <label for="message">Edit Comment</label>
        <textarea required class="rounded-lg w-100" id="message" name="message" minlength="5" maxlength="100" rows="3" style="resize: none; font-size: .9em">{{ old('message', $comment->message) }}</textarea>
        @error('message')
          <div class="alert alert-danger m-0 mt-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary ml-3 mb-4">Edit</button>
  </div>
</form>
@endsection