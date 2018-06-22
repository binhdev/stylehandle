
@extends('layouts.frontend')
@section('title')
{{ $post->title }}
@endsection
@section('title-meta')
@endsection
@section('content')
<header class="entry-header">
 		<h1 class="entry-title">
		    {{$post->title}}
    </h1>
</header>
<div class="tags">
  Tagged:
   @foreach($post->Tags as $tag)
      <a href="{{url('/tags/'.$tag->slug)}}" alt="{{$tag->name}}" class="tags">{{$tag->name}}</a>,
    @endforeach
</div>
<div class="featured-image">
   <a href="{{url('/'.$post->slug)}}" class="thumbnail" title="{{$post->title}}">
     <img  src="{{$post->thumbnail}}" class="" alt="">
   </a>
</div>
<div class="content" id="content">
    <div class="row">
        <div class="col-md-12">
          {!! $post->body !!}
        </div>
    </div>
</div>
@endsection
