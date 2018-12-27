<script>
function sidebarFunction({duration, draw, timing}){

let start = performance.now();

requestAnimationFrame(function animate(time){

    let timeFraction = (time-start) / duration;
    if (timeFraction > 1){
        timeFraction = 1;
    }

    let progress = timing(timeFraction)

    draw(progress);

    if(timeFraction < 1)
    {
        requestAnimationFrame(animate);
    }
});
}


</script>
<nav class="navbar navbar-expand-md navbar-dark bg-dark  admin-nav navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{ url('admin/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
  <span class="navbar-toggler-icon" id = "side" class = "side"></span>
    
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @if(Auth::guard('admin')->user())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id = "sidebar" class = "sidebar">
        
            <ul class = "sidebar-menu">
                    <span id = "exit"><li class = "exit">
                            X
                           </li></span>
                <a href = "{{route('admin.users')}}">   <li>
                 User
                </li></a> 

                <a href = "{{route('admin.products')}}">   <li>
                    Jwelery
                   </li></a>

                   <a href = "{{route('admin.categories')}}">   <li>
                    Categories
                   </li></a>
                   <a href = "{{route('admin.offers')}}">   <li>
                        Offers
                       </li></a>
                       <a href = "{{route('careers.index')}}">   <li>
                        Careers
                       </li></a>
                       <a href = "{{route('admin.orders')}}">   <li>
                        Orders
                       </li></a>
            </ul>
        
    </div>

    <script>
    side.onclick = function(){
        sidebarFunction({
duration: 300,
timing: function(timeFraction){
    return timeFraction;
},
draw: function(progress){
    sidebar.style.width = progress * 250 + 'px';
    
}
});
    };
    </script><script>
            exit.onclick = function(){
                sidebarFunction({
duration: 300,
timing: function(timeFraction){
    return timeFraction;
},
draw: function(progress){
    sidebar.style.width = 250 - (progress * 250)   + 'px';
   
    sidebar.style.padding = 0 + 'px';
}
});
    };
    </script>