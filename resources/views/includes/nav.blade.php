<nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
           <h1 class = "app-name"> {{ config('app.name', 'Laravel') }}</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class = "nav-item">
                <a class = "nav-link" href = "{{route('jwelery.index')}}">Products</a>
                </li>
                <li class = "nav-item">
                        <a class = "nav-link" href = "{{route('career')}}">Career</a>
                        </li>
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Search <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style = "background-color: #e6e0e029;">
                        <form class = "px-3 " method = "post" action = "{{route('browse')}}">
                            @csrf
                              <div class = "form-group">
                                  <input class = "form-control" name = "search">
                              </div>
                              <div class = "form-group">
                                 <button type = "submit" class = "btn btn-primary" style = "    width: 100%;">
                                     <span class = "fa fa-search"></span>
                                 </button>
                                </div>
                          </form>
                        
                        </div>
                    </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                
                @if(Auth::guard('web')->user())
                <li class = "nav-item mx-3">
                <a href = "{{route('cart.index')}}" class = "nav-link">
                        <span class = "fa fa-shopping-cart fa-2x"></span>
                        @if(Session::has('cart'))
                <span class = "cart-indicator">{{Session::has('cart') ? Session::get('cart')->cartindex : ''}}</span>
                    @endif</a>
                </li> 
                    <li class="nav-item dropdown border-left">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::guard('web')->user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>