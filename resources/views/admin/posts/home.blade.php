@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Posts</h1>
<a class="btn btn-light btn-outline-secondary"  href="{{ url('admin/posts/create') }}">Add news <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
@endsection
@section('content')

@if ( !$posts->count() )
There is no post till now. Login and write a new post now!!!
@else
  <table class="table table-bordered postbox">
    <thead>
        <tr>
            <th width="40%">Title</th>
            <th width="10%">Categories</th>
            <th width="10%">Tags</th>
            <th width="10%">Author</th>
            <th width="10%">Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $posts as $post )
        <tr>
            <td><a href="{{ url('/admin/posts/'.$post->id.'/edit/') }}">{{ $post->title }}</a></td>
            <td>
             @foreach($post->categories as $category)
                <a href="">{{$category->name}}</a> ,
             @endforeach
            </td>
            <td>
               @foreach($post->tags as $tag)
                  <a href="">{{$tag->name}}</a> ,
               @endforeach
            </td>
            <td>{{ $post->author->name }}</td>
            <td>{{$post->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
  {!! $posts->render() !!}
@endif
@endsection
