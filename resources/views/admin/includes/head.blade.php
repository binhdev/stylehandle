<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Manage Panel</title>

<!-- Styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/admin.css') }}" rel="stylesheet">
@isset($post)
<meta property="article:tag" content="" />
<meta property="article:section" content="category" />
<meta property="article:published_time" content="2018-03-08T01:54:49+00:00" />
<meta property="article:modified_time" content="2018-03-08T01:58:08+00:00" />
@endisset

<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>
<script src="{{url('/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('node_modules/angular/angular.min.js') }}"></script>
<script type="text/javascript" src="{{asset('app/app.js') }}"></script>
<!-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script> -->
