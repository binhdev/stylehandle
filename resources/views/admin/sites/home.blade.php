@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Sites</h1>
<a class="btn btn-light btn-outline-secondary" data-toggle="modal" data-target="#add-new">
  Add news <i class="fa fa-plus-circle" aria-hidden="true"></i>
</a>
@endsection
@section('content')
@if ( !$posts->count() )
There is no site till now.
@else
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
        selector : "textarea.tinymce",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | media",
    });
</script>
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
            <a href="{{ url('admin/sites/delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger btn-sm">
              <i class="fa fa-trash"></i>
            </a>
          </td>
          <td><a href="{{ url('/admin/sites/'.$post->id.'/edit/') }}">{{ $post->name }}</a></td>
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
        <form action="{{url('/admin/sites/')}}" method="post">
            <div class="modal-header">
              <h5 class="modal-title">Add site</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="name">Site name</label>
                        <input required value="{{ old('name') }}" placeholder="Enter site name" type="text" id="name" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="description">Site description</label>
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
@endsection
