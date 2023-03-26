<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Task Application</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- CSS only -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!--??????????-->
    <title>{{ config('app.name', 'Laravel') }}</title>
 <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

*{
    margin:0;
    padding: 0;
    box-sizing: border-box;
}
body {
    font-family: 'Poppins', sans-serif;
    overflow:hidden;
}
.table{
    width: 100%;
}
.table_header{
    display:flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 20px;
    border-radius: 5px;
    background-color: rgb(240, 240, 240);
}
.table_header p{
    color : #000000;
}
button {
    outline: none;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}
.add_new{
    padding: 10px 20px;
    color: #ffffff;
    background-color: green;
}
input {
    padding: 10px 20px;
    margin: 0;
    outline: none;
    border: 1px solid lightgreen;
    border-radius: 6px;
    color: green;
}
::placeholder{
    color:darkgreen;
}
.table_section{
    height: 460px;
    overflow: auto;
}
table{
    width: 100%;
    table-layout: fixed;
    min-width: 1000px;
    border-collapse: collapse;
}
thead, th{
    position: sticky;
    top: 0;
    background-color: #d2d8db;
    color: black;
    font-size: 15px;
}
th,td{
    border-bottom: 1px solid #dddddd;
    padding:10px 20px;
    word-break: break-all;
}
tr:hover td{
        color: #2AAA8A;   
        background-color: #f6f9fc;
}
::-webkit-scrollbar{
    height: 5px;
    width: 5px;
}
::-webkit-scrollbar-track{
    box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
    box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
 </style>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
      const myModal = document.getElementById('myModal')
      const myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
      })
    </script>
  </head>
  <body style="background-image: url('https://images.unsplash.com/photo-1678776682765-25854662bbdb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2081&q=80'); background-size: cover; background-attachment: fixed; background-repeat: no-repeat;">
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 130%; background-color: rgba(0, 0, 0, 0.5); z-index: -1;"></div>
      <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-transparent">
          <div class="container">
            <!--Laravel logo-->
            <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav me-auto"></ul>
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                  @if (Route::has('login'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                  @endif

                  @if (Route::has('register'))
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                  @endif

                  @else
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" style="color: #2AAA8A;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                      </div>
                    </li>
                @endguest
              </ul>
            </div>
          </div>
        </nav>
        <br><br><br>
        <div class="container">
          @yield('content')
        </div>
      </div>
    </div>
  </body>
</html>