@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Add new site</h1>
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
<form action="{{url('/admin/sites/')}}" method="post">
<div class="row">
    <div class="col-sm-4">
        <h4 class="modal-title">Add site</h4>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input required="required" value="{{ old('name') }}" placeholder="Enter site name" type="text" name="name" class="form-control" />
            </div>
            <input type="submit" name='publish' class="btn btn-success" value = "Add new"/>
    </div>
   <div class="col-sm-8">
       <h3> Info site </h3>
       <div class="id="info-site" class="postbox">
           <div class="form-group">
               <label for="title" class="col-sm-3 control-label" > Site Title</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="title" name="title" value="{{$post->option->title or 'Enter title site'}}">
               </div>
           </div>
           <div class="form-group">
               <label for="description" class="col-sm-3 control-label"> Site Description</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="description" name="description" value="{{$post->option->description or 'Enter description site'}}">
               </div>
           </div>
            <div class="form-group">
               <label for="keywords" class="col-sm-3 control-label"> Site keywords</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="keywords" name="keywords" value="{{$post->option->keywords or 'Enter keywords site'}}">
               </div>
           </div>
            <div class="form-group">
               <label for="copyright" class="col-sm-3 control-label"> Site copyright</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="copyright" name="copyright" value="{{$post->option->copyright or 'Enter copyright site'}}">
               </div>
           </div>
           <div class="form-group">
              <label for="domain_verify" class="col-sm-3 control-label">Domain verify</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="domain_verify" name="domain_verify" value="{{$post->option->domain_verify or 'Enter Domain verify'}}">
              </div>
          </div>
          <div class="form-group">
             <label for="domain_analytic" class="col-sm-3 control-label">Domain Analytic</label>
             <div class="col-sm-9">
                 <input type="text" class="form-control" id="domain_analytic" name="domain_analytic" value="{{$post->option->domain_analytic or 'Enter Domain Analytic'}}">
             </div>
           </div>
           <div class="form-group">
              <label for="ping_sites" class="col-sm-3 control-label">Ping sites</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="ping_sites" name="ping_sites" value="{{$post->option->ping_sites or 'Ping sites'}}">
              </div>
          </div>
          <div class="form-group">
             <label for="site_icon" class="col-sm-3 control-label">Site icon</label>
             <div class="col-sm-9">
                 <input type="text" class="form-control" id="site_icon" name="site_icon" value="{{$post->option->site_icon or 'link img icon site'}}">
             </div>
           </div>
           <div class="form-group">
              <label for="site_logo" class="col-sm-3 control-label">Site logo</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control" id="site_logo" name="site_logo" value="{{$post->option->site_logo or 'link img logo site'}}">
              </div>
            </div>
            <div class="form-group">
               <label for="site_style" class="col-sm-3 control-label">Site style</label>
               <div class="col-sm-9">
                   <input type="text" class="form-control" id="site_style" name="site_style" value="{{$post->option->site_style or 'link img style site'}}">
               </div>
            </div>
       </div>
   </div> <!-- end col-sm-8 -->
 </div> <!-- end row -->
</form> <!-- end form option of site -->
@endsection
