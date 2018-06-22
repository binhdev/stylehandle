@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Site {{$post->name}}</h1>
@endsection
@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
  tinymce.init({
        selector : "textarea.tinymce",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | media",
    });
</script>

  <div class="row">
    <div class="col-sm-4">
      <form method="POST" action='{{ url("/admin/sites/".$post->id) }}'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
      <div class="postbox">

          <div class="form-group">
              <label for="name">Name</label>
              <input required value="{{ $post->name }}" type="text" id="name" name="name" class="form-control" />
          </div>
          <div class="form-group">
              <label for="name"> Description</label>
              <textarea required value="{{$post->description}}" id="description" name="description" class="form-control" />{{$post->description}}</textarea>
          </div>
          <div class="form-group" >
                <input type="submit" name='publish' class="btn btn-sm btn-success" value="update"/>
          </div>
      </div>
    </form>

    </div>
   <div class="col-sm-8 postbox">
     <form id="form-edit" method="post" action='{{ url("/admin/sites/".$post->id) }}'>
       <h3> Info site<i class="fa fa-sort-up collapsed" data-toggle="collapse" data-target="#more-info" aria-expanded="false"></i></h3>
       <div id="info-site">
          <div class="collapse" id="more-info">
            <div class="row">
                  <div class="form-group">
                      <label for="title" >Site Title</label>
                      <input type="text" class="form-control" id="title" name="title" value="{{$post->option->title or 'Enter title site'}}">
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                       <textarea type="text" class="form-control tinymce" id="option-description" name="description" value="{{$post->option->description or 'Enter description site'}}">
                         {{$post->option->description or 'Enter description site'}}
                       </textarea>
                  </div>
                </div>
            </div>
           <div class="row">
               <div class="form-group col-6">
                   <label for="site_icon" class="control-label">Site icon</label>
                   <input type="text" class="form-control" id="site_icon" name="site_icon" value="{{$post->option->site_icon or 'link img icon site'}}">
               </div>
               <div class="form-group col-6">
                     <label for="site_logo" class="control-label">Site logo</label>
                     <input type="text" class="form-control" id="site_logo" name="site_logo" value="{{$post->option->site_logo or 'link img logo site'}}">
               </div>
                  <div class="form-group col-6">
                       <label for="copyright" class="control-label"> Site copyright</label>
                       <input type="text" class="form-control" id="copyright" name="copyright" value="{{$post->option->copyright or 'Enter copyright site'}}">
                  </div>
                  <div class="form-group col-6">
                      <label for="domain_verify" class="control-label">Domain verify</label>
                      <input type="text" class="form-control" id="domain_verify" name="domain_verify" value="{{$post->option->domain_verify or 'Enter Domain verify'}}">
                  </div>
                  <div class="form-group col-6">
                      <label for="domain_analytic" class="control-label">Domain Analytic</label>
                      <input type="text" class="form-control" id="domain_analytic" name="domain_analytic" value="{{$post->option->domain_analytic or 'Enter Domain Analytic'}}">
                  </div>

                  <div class="form-group col-12">
                    <input type="submit" name='publish' class="btn btn-sm btn-success" value="update"/>

                  </div>

             </div>
       </div><!--end collapse -->
     </form>
   </div> <!-- end col-sm-8 -->
 </div> <!-- end row -->
@endsection
