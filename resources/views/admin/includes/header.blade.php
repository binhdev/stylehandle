<nav class="navbar navbar-default">
      <ul class="nav navbar-nav">
          <li>@yield('title')</li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            <li><a href="{{ url('/user/'.Auth::id().'/posts') }}">My Posts</a></li>
            <li><a href="{{ url('/user/'.Auth::id()) }}">My Profile</a></li>
            <li>
                <a href="{{ url('/auth/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span>Logout</span></a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
          </ul>
        </li>
      </ul>
</nav>
