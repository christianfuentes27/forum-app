@extends('app.base')

@section('content')
@php
  use Illuminate\Http\Request;
@endphp
<section class="h-100 gradient-custom">
  <div class="container py-5" style="height: 1000px">
    <div class="row justify-content-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration bg-dark text-white" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Register Form</h3>
              <form action="{{ url('user') }}" method="post">
                @csrf
                @error('default')
                  <div class="alert alert-danger w-25 mx-auto mt-3 text-center">{{ $message }}</div>
                @enderror  
                <div class="row">
                    <div class="col-md-6 mb-4">
    
                      <div class="form-outline w-100">
                        @error('name')
                          <div class="alert alert-danger m-0 mb-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
                        @enderror
                        <input value="{{ old('name') }}" required type="text" id="name" name="name" minlength="2" maxlength="50" class="form-control form-control-lg" placeholder="First Name"/>
                        <label class="form-label" for="name">First Name</label>
                      </div>
    
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">
    
                      <div class="form-outline datepicker w-100">
                        @error('datebirth')
                          <div class="alert alert-danger m-0 mb-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
                        @enderror
                        <input value="{{ old('datebirth') }}" required type="date" class="form-control form-control-lg" id="datebirth" name="datebirth"/>
                        <label for="datebirth" class="form-label">Birthday</label>
                      </div>
    
                    </div>
                </div>  
                
                <div class="row">
                    <div class="col-md-6 mb-4 d-flex align-items-center">
    
                      <div class="form-outline datepicker w-100">
                        @error('avatar')
                          <div class="alert alert-danger m-0 mb-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
                        @enderror
                        <input required type="radio" name="avatar" value="https://cdn-icons-png.flaticon.com/512/163/163824.png" {{(old('avatar') == 'https://cdn-icons-png.flaticon.com/512/163/163824.png') ? 'checked' : ''}}/>
                        <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/163/163824.png" style="with:100px; height:100px"></img>
                        <input type="radio" name="avatar" value="https://cdn-icons-png.flaticon.com/512/163/163816.png" {{(old('avatar') == 'https://cdn-icons-png.flaticon.com/512/163/163816.png') ? 'checked' : ''}}/>
                        <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/163/163816.png" style="with:100px; height:100px"></img>
                        <input type="radio" name="avatar" value="https://cdn-icons-png.flaticon.com/512/921/921077.png" {{(old('avatar') == 'https://cdn-icons-png.flaticon.com/512/921/921077.png') ? 'checked' : ''}}/>
                        <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/921/921077.png" style="with:100px; height:100px"></img>
                        <input type="radio" name="avatar" value="https://cdn-icons-png.flaticon.com/512/163/163814.png" {{(old('avatar') == 'https://cdn-icons-png.flaticon.com/512/163/163814.png') ? 'checked' : ''}}/>
                        <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/163/163814.png" style="with:100px; height:100px"></img>
                        <label for="avatar" class="form-label">Avatar</label>
                      </div>
    
                    </div>
                </div>  
            
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
      
                    <div class="form-outline">
                      @error('email')
                        <div class="alert alert-danger m-0 mb-2 p-1 text-center" style="font-size: .9em">{{ $message }}</div>
                      @enderror
                      <input value="{{ old('email') }}" required type="email" id="email" minlength="5" maxlength="80" class="form-control form-control-lg" name="email" placeholder="Email"/>
                      <label class="form-label" for="email">Email</label>
                    </div>
      
                  </div>
                </div>
    
                <div class="mt-4 pt-2">
                  <input class="btn btn-primary btn-lg" type="submit" value="Create User" />
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