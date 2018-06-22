
<nav id="sidebar" class="navbar-collapse">
  <ul class="sidebar-menu" id="nav-accordion">
    <li class="active">
      <a href="{{ url('/admin') }}"><i class="fa fa-home fa-2x"></i><span>Home</span></a>
   </li>
        <li>
          <a href="{{ url('/') }}"><i class="fa fa-film fa-2x"></i><span>View site</span></a>
       </li>
        <li><a href="{{url('/admin/posts')}}"><i class="fa fa-clipboard fa-2x"></i><span>All Posts</span></a></li>
        <li><a href="{{ url('/admin/categories') }}"><i class="fa fa-archive fa-2x" aria-hidden="true"></i><span>Category</span></a></li>
        <li><a href="{{url('/admin/tags')}}"><i class="fa fa-tags fa-2x"></i><span>Tags</span></a></li>
        <li><a href="{{url('/admin/menus')}}"><i class="fa fa-bars fa-2x"></i><span>Menus</span></a></li>
        <li>
           <a href="{{ url('/admin/sites') }}"><i class="fa fa-filter fa-2x" aria-hidden="true"></i><span>Sites</span></a>
       </li>
        <li>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
    </ul>
</nav>
