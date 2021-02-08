
<nav class="navbar navbar-expand-md navbar-dark bg-dark"  >
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LSAPP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="Default">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="text-white"  style="padding: 0 50px 0 50px;"><a  href="/home">Home</a>
        </li>
        
        <li class="text-white" style="padding: 0 50px 0 50px;"><a href="/about">About</a>
        </li>
        <li class="text-white" style="padding: 0 50px 0 50px;"><a href="/service">Service</a>
        </li>
        <li class="text-white" style="padding: 0 50px 0 50px;"><a href='/post'>Blog</a>
        </li>
     </ul>
     <ul class= "nav navbar-nav navbar-right">
         <li class="text-white" style="padding: 0 50px 0 50px;"><a href="/post/create">Create Post</a>
         </li>

     </ul>
     

      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                    <ul class= "nav navbar-nav">
                      <li class="text-white"  style="padding: 0 50px 0 50px;"><a  href="/home">Home</a>
                      </li>
                      <li class="text-white" style="padding: 0 50px 0 50px;"><a href="/about">About</a>
                      </li>
                      <li class="text-white" style="padding: 0 50px 0 50px;"><a href="/service">Service</a>
                      </li>
                      <li class="text-white" style="padding: 0 50px 0 50px;"><a href='/post'>Blog</a>
                      </li>
                      </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <li><a href= "/dashboard">Dashboard</li>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
