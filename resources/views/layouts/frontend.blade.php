<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og: http://ogp.me/ns#">
  <head>
      @include('includes.head')
  </head>
<body>
    <header role="banner"class="jumbotron subhead" id="overview">
              @include('includes.header')
    </header>
    <main id="main" role="main" class="container">
          <article class="panel-body">
               @yield('content')
          </article>
    </main>
    <footer class="footer" role="contentinfo">
        @include('includes.footer')
    </footer>
    @yield('javascript')
  </body>
</html>
