<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7e4ab6ef04.js" crossorigin="anonymous"></script>
    <title>Forum App</title>
</head>
<body style="height: 100vh" class="bg-ligth">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">Forum App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{ url('post') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('login') }}">Log in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('logout/logout') }}">Log out</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('user/create') }}">Register</a>
          </li>
        </ul>
      </div>
      @if(session()->has('user'))
        <img src="{{ url(session()->get('user')->avatar) }}" class="rounded-circle" style="width:30px"></img>
        <div class="text-white mx-3">
          {{ session()->get('user')->name }}
        </div>
      @endif
    </nav>
    
    @if (session()->has('message'))
      <div class="alert alert-danger w-25 text-center mx-auto mt-3" role="alert">
        {{ session()->get('message') }}
      </div>
    @endif
    @yield('content')
    @yield('scripts')
</body>
</html>