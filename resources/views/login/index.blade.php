@extends('app.base')

@section('content')
    <section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration bg-dark text-white" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login</h3>
            <form action="{{ url('login/show') }}" method="get">
            @csrf
              <div class="row">
                <div class="col-md-6 mb-4 pb-2">
                  @error('email')
                    <div class="alert alert-danger m-0 mb-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
                  @enderror
                  <div class="form-outline">
                    <input required value="{{ old('email') }}" type="email" id="email" class="form-control form-control-lg" name="email" placeholder="Email"/>
                    <label class="form-label" for="email">Email</label>
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" type="submit" value="Login" />
                <a href="{{ url('post') }}" class="btn btn-secondary ml-2 py-2 px-4">Back</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection