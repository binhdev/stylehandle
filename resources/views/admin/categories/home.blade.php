@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Categories</h1>
<a class="btn btn-light btn-outline-secondary" data-toggle="modal" data-target="#add-new">
  Add news <i class="fa fa-plus-circle" aria-hidden="true"></i>
</a>
@endsection
@section('content')
@if ( !$posts->count() )
There is no category till now.
@else
<div ng-app="panel" ng-controller="admincontroller">
<table class="table table-bordered postbox">
  <thead>
      <tr>
          <th width="10px"></th>
          <th width="200px">Name</th>
          <th width="60%">Description</th>
          <th>slug</th>
      </tr>
  </thead>
  <tbody>
      @foreach( $posts as $post )
      <tr>
          <td>
            <a href="{{ url('admin/categories/delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger btn-sm">
              <i class="fa fa-trash"></i>
            </a>
          </td>
          <td><a data-toggle="modal" data-target="#update" ng-click="editCategory({{$post->id}})" href="">{{ $post->name }}</a></td>
          <td>{{ $post->description }}</td>
          <td>{{$post->slug}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
  {!! $posts->render() !!}
@endif
  <div id="add-new" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{url('/admin/categories/')}}" method="post">
              <div class="modal-header">
                <h5 class="modal-title">Add category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label for="name">Category name</label>
                          <input required value="{{ old('name') }}" placeholder="Enter category name" type="text" id="name" name="name" class="form-control" />
                      </div>
                      <div class="form-group">
                          <label for="description">Category description</label>
                          <textarea required value="{{ old('description') }}" type="text" id="description" name="description" class="form-control" />Description</textarea>
                      </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add new</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
        </form>
      </div>
    </div>
  </div>
    <div id="update" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="POST" action='[[url]]'>
                <div class="modal-header">
                  <h5 class="modal-title">Add category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="_method" value="PUT">
                      <div class="form-group">
                        <input required="required" value="[[category.name]]" type="text" name="name" class="form-control" />
                      </div>
                      <div class="form-group">
                        <textarea name='description' class="form-control">[[category.description]]</textarea>
                      </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
                </div>
          </form>
        </div>
      </div>
    </div>
</div>
<script src="{{asset('/app/controllers/admincontroller.js') }}"></script>
@endsection
