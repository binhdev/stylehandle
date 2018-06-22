@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Edit Category <b>{{$post->name}}</b></h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-4" >
         <form action="{{url('/admin/edit-category')}}/{{$post->id}}" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="category_id" value="{{ $post->id }}{{ old('post_id') }}">
            <div class="form-group">
              <input required="required" value="@if(!old('name')){{$post->name}}@endif{{ old('name') }}" placeholder="Enter name category" type="text" name="name" class="form-control" />
            </div>
            <div class="form-group">
              <textarea name='description' class="form-control">@if(!old('description')){!! $post->description !!}@endif{!! old('description') !!}</textarea>
            </div>
            <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
        </form>
    </div>
</div>

@endsection
