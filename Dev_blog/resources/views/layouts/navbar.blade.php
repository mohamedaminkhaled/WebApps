        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-9  text-right">
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation" style="margin-right:-300px;">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li style="font-size: 30px;">
                    <a href="/"><strong class="caret">Home</strong></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Users <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="{{ route('register') }}">Register User</a></li>
                      <li><a href="/users/index">Show Users</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if (Auth::user())
                            <li><a href="/posts/create">Create post</a></li>
                        @endif
                      <li><a href="/home">View posts</a></li>
                      <li><a href="/posts/softDeleted">Deleted posts</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        @if (Auth::user())
                            <li><a href="/categories/create">Create category</a></li>
                        @endif
                      <li><a href="/">View categories</a></li>
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
                  <li class="login-register">
                    <ul class="nav pull-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="login"><a href="{{ route('login') }}">Login</a></li>
                            <li class="register"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
              
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/users/{{Auth::user()->id}}">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">
                                            Dashboard
                                        </a>
                                    </li>
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
                                    
                                </ul>
                            </li>
                        @endif
                    </ul>
                  </li>
                </ul>    
                
              </nav>
              <div>
                <form class="form-inline my-2 my-lg-0" method="GET" action="/results">
                  <input class="form-control mr-sm-2" name="search" type="text" placeholder="Search" style="height:36px;">
                  <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
              </div>
            </div>

            
          </div>
        </div>
        
        