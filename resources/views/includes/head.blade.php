<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="{{url('/css/ico.png')}}" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="index, follow" />
<meta name="description" content="">
<meta name="revisit-after" content="1 days" />
<base href="{{ url('/') }}" />
<meta property ="og:url" content ="{{ url('/') }}" />
<meta property="og:title" content="{{$title or $post->title}}" />
<meta property="og:type" content="website" />
<meta property="og:description" content="{{$description or $post->description}}" />
<meta property="og:site_name" content="Cơ khí Nông nghiệp Nguyễn hân - Bạn của nhà nông"/>
<meta property="og:image" content="" />
<meta property="og:image:alt" content="" />
<link rel="alternate" href="{{ url('/') }}" hreflang="en" />
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="google-site-verification" content="" />
<link rel="shortcut icon" href="">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/fontawesome.css" integrity="sha384-q3jl8XQu1OpdLgGFvNRnPdj5VIlCvgsDQTQB6owSOHWlAurxul7f+JpUOVdAiJ5P" crossorigin="anonymous">
<link href="{{url('css/app.css')}}" rel="stylesheet">
<link href="{{url('css/style.css')}}" rel="stylesheet">

<title>@yield('title')</title>
