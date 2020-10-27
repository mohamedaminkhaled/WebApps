<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">Welcom</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="/">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/users/register">Register User</a></li>
              <li><a href="/users/index">Show Users</a></li>
              <li><a href="/users/softDeleted">Deleted Users</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
            <ul class="dropdown-menu">
                @if (Auth::user())
                    <li><a href="/posts/create">Create post</a></li>
                @endif
              <li><a href="/posts/index">View posts</a></li>
              <li><a href="/posts/softDeleted">Deleted posts</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
            <ul class="dropdown-menu">
                @if (Auth::user())
                    <li><a href="/categories/create">Create category</a></li>
                @endif
              <li><a href="/categories/index">View categories</a></li>
            </ul>
          </li> 
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tags <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/tags/create">Create tag</a></li>
              <li><a href="/tags/index">Show tags</a></li>
              <li><a href="/tags/softDeleted">Deleted tags</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="/settings/index">About us</a></li>
              <li><a href="/settings/edit">Edit settings</a></li>
            </ul>
          </li>
        </ul>    
        <ul class="nav pull-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
              <li><a href="{{ route('login') }}">Login</a></li>
              <li><a href="{{ route('register') }}">Register</a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                      <li>
                          <a href="{{ route('home') }}">
                              Dashboard
                          </a>
                      </li>
                  </ul>
              </li>
          @endif
        </ul>
      </div><!-- /.nav-collapse -->
    </div>
  </div><!-- /navbar-inner -->
</div>