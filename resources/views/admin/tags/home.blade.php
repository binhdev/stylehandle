@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Tags</h1>
@endsection
@section('content')
@if ( !$posts->count() )
There is no tags till now.
@else
<div class="row" ng-app="panel" ng-controller="admincontroller">
      @foreach( $posts as $post )
      <div class="col-sm-2">
          <i ng-click="deleteTag({{$post->id}},'{{$post->name}}')" class="fa fa-times-circle btn-remove"></i> {{$post->name}} ({{count($post->posts)}})
      </div>
      @endforeach
  {!! $posts->render() !!}
@endif
</div>
<script src="{{asset('/app/controllers/admincontroller.js') }}"></script>
@endsection
