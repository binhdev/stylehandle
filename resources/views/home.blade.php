
@extends('layouts.frontend')
@section('title')
@endsection
@section('content')
@if ( !$posts->count() )
There is no video till now.!!!
@else
@foreach( $posts as $post )
<div id="content">
  <article class="post row">
      <div class="thumbnail col-sm-6">
          <img src="ç" alt="{{ $post->title }}" >
          <a class="opacity"  href="{{ url('/'.$post->slug) }}" title="{{ $post->title }}"><img src="{{ url('/css') }}/play.png" alt=""></a>
      </div>
      <div class="article-content col-sm-6">
          <div class="above-entry-meta">
            <span class="category-links">
              <a href="" rel="category tag"></a>
            </span>
          </div>
          <header class="entry-header">
            <h2 class="entry-title">
              <a title="{{ $post->title }}" href="{{ url('/'.$post->slug) }}">{{ $post->title }}</a>
            </h2>
          </header>
      </div>
  </article>
</div>
@endforeach
<div class="col-12">
  {!! $posts->render() !!}
</div>
@endif
@endsection
@section('sidebar')

@endsection
