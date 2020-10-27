<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Runninggeeks</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <!--
      <li class="nav-item">
        <a class="nav-link" href="/about">about</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/mycources">cources</a>
      </li>
      -->
      <li class="nav-item">
        <a class="nav-link" href="/posts">posts</a>
      </li>
    </ul>
    <!--<div class="form-inline my-2 my-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="/register">Signup</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link create" href="/posts/create">Create post</a>
      </li>
    </div>-->
    
    <div class="form-inline my-2 my-lg-0">
      <!-- Authentication Links -->
      @if (Auth::guest())
        <li class="nav-item" style="margin-right:10px"><a href="{{ route('login') }}">Login</a></li>
        <li class="nav-item" style="margin-right:10px"><a href="{{ route('register') }}">Register</a></li>
        
            @else
                  <li class="dropdown username">
                                  
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                             
                    <ul class="dropdown-menu" role="menu">
                      <li>
                        <a class = "dropdown-list" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                              Logout
                        </a>
  
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                      </li>
                      
                      <li>
                        <a class="dropdown-list" href="/home">Dashboard</a>
                      </li>
                      
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link create" href="/posts/create">Create post</a>
                  </li>
          @endif
    </div>
</nav>