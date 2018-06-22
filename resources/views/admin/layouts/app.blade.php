<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.includes.head')
</head>
<body class="wrapper">
    <aside class="box sidebar">
        @include('admin.includes.sidebar')
    </aside>
    <section id="main-content" class="box content">
        <header>
            @include('admin.includes.header')
        </header>
        @if (Session::has('message'))
          <div class="flash alert-info"><p class="panel-body">{{ Session::get('message') }}</p></div>
        @endif
        @if ($errors->any())
          <div class='flash alert-danger'>
            <ul class="panel-body">
                @foreach ( $errors->all() as $error )
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
        @endif

            <div class="panel panel-default">
              <div class="panel-body">
                @yield('content')
              </div>
            </div>
    </section>
    <!-- <div class="box footer">Footer</div> -->
    @yield('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $("input[type='text']").on("click", function () {
           $(this).select();
        });
    </script>
</body>
</html>
