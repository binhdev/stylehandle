@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Add New Post</h1>
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
<div ng-app="panel" ng-controller="admincontroller">
<form action="{{url('/admin/posts')}}" method="post" >
   <div class="row" >
      <div class="col-sm-8" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <input required="required" value="{{old('title')}}" placeholder="Enter title here" type="text" name="title" class="form-control" />
            </div>
            <div class="form-group">
              <textarea name='body' class="form-control tinymce" >{{ old('body') }}</textarea>
            </div>
            <div id="seo" class="postbox">
                <h3>Seo<i class="fa fa-sort-up collapse" data-toggle="collapse" data-target="#seo-content" aria-expanded="false" aria-controls="submitdiv-content"></i></h3>
                <div class="collapse" id="seo-content" >
                    <div class="form-group">
                        <input value="" placeholder="Title" type="text" name="seo_title" class="form-control" />
                    </div>
                    <div class="form-group">
                        <textarea name='seo_description' class="form-control"></textarea>
                    </div>
                     <div class="form-group">
                        <input value="" placeholder="Enter image share" type="text" name="share_image" class="form-control" />
                    </div>
                     <div class="form-group">
                        <input value="" placeholder="Get info from this url" type="text" name="share_url" class="form-control" />
                    </div>
                </div>
          </div>
      </div>
      <div class="col-sm-4">
          <div id="submitdiv" class="postbox">
              <h3>Publish<i class="fa fa-sort-up collapsed" data-toggle="collapse" data-target="#submitdiv-content" aria-expanded="false" aria-controls="submitdiv-content"></i></h3>
              <div class="collapse show" id="submitdiv-content" >
                    <input type="submit" name='publish' class="btn btn-sm btn-success" value="Publish"/>
                    <input type="submit" name='save' class="btn btn-sm btn-outline-secondary" value="Save Draft" />
              </div>
          </div>
          <div id="category" class="postbox">
              <h3>Categories <a class="btn-them"  data-toggle="modal" data-target="#add-category" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
              </h3>
              <div class="row">
                  <div class="col-md-12">
                  <ul id="categorychecklist">
                      @foreach($categories as $cat)
                        <li style="list-style: none">
                        <input type="checkbox"  type="checkbox" name="category[]" value="{{$cat->id}}" name="categories[]" value="{{$cat->id}}" />
                           {{$cat->name}}
                        </li>
                      @endforeach
                  </ul>
                  </div>
              </div>
          </div>
          <div id="tag" class="postbox">
              <h3>Tags <a class="btn-them"  data-toggle="modal" data-target="#add-category" ><i class="fa fa-plus-circle" aria-hidden="true"></i></a>
              </h3>
              <div class="row">
                  <div class="col-md-12 form-inline">
                            <div class="form-gorup">
                                <input id="input-tags" type="text" class="form-control" name="tag" />
                            </div>
                            <div id="add-tags" style="margin-left:10px;" class="btn btn-outline-secondary">add</div>
                            <p>Separate tags with commas ","</p>
                            <div id="show-tags" class="col-12"></div>
                            <div class="">
                                Choose from the most used tags
                            </div>
                  </div>
              </div>
          </div>
          <div id="thumbnail" class="postbox" >
                <h3>Featured Image</h3>
                <div class="row">
                    <div class="col-12" ng-show="thumbnail">
                        <input type="hidden" ng-model="thumbnail" value="[[thumbnail]]" name="thumbnail"/>
                        <div class="image-upload">
                             <img alt="Click to change thumbnail" src="[[thumbnail]]" />
                             <div class="thumbnail-hover"></div>
                        </div>
                      </div>
                    </div>
                <div class="row">
                    <div class="col-12">
                      <a href="" data-toggle="modal" data-target="#modal-upload">Set featured image</a>
                    </div>
                </div>
          </div>
      </div>
  </div>
</form>
//create category
<div id="add-category" class="modal fade" tabindex="-1" role="dialog">
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
//modal upload image
<div  id="modal-upload" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title">Featured Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" data-toggle="pill" href="#nav-upload">Upload file</a>
                </li>
                <li class="nav-item">
                  <a ng-click="getAllPhotos()" id="nav-media-tab" class="nav-link" data-toggle="pill" href="#nav-media">Media library</a>
                </li>
            </ul>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade container show active" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-tab">
                  <form id="upload-image" method="POST" enctype="multipart/form-data" action="{{url('/upload-image')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="input-file">
                            <input type="file"  name="image" class="upload" style="position:fixed;top:0;left:0;opacity: 0;width: 0;height: 0"/>
                            <button type="button" class="btn btn-outline-secondary btn-light">Select Files</button>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="nav-media" role="tabpanel" aria-labelledby="nav-media-tab">
                    <div ng-show="photos" class="container-list-photos">
                      <div class="list-photos row">
                        <div ng-repeat="(key, value) in photos" ng-click="showInfoPhoto(value.id)" ng-class="{'active': active==value.id}" class="photo-item col-2" photo-id="[[value.id]]">
                            <div class="thumbnail">
                              <img src="[[value.url]]"/>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="info-photo">
                        <div ng-show="info">
                            <h3>ATTACHMENT DETAILS</h3>
                            <div class="thumbnail">
                                <img src="[[info.url]]" />
                            </div>
                            <div class="title">
                                [[info.title]]
                            </div>
                            <form class="form-inline" id="photo-edit" method="POST" action='{{url("/admin/photos/")}}'>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="url">URL</label>
                                    <div class="col-sm-8">
                                      <input class="form-control form-control-sm" id="url" type="text" disabled value="[[root_url]][[info.url]]" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="title">Title</label>
                                    <div class="col-sm-8">
                                      <input ng-model="info.title" class="form-control form-control-sm" id="title" type="text" value="[[info.title]]" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="caption">Caption</label>
                                    <div class="col-sm-8">
                                      <input ng-model="info.caption" class="form-control-sm form-control" id="caption" type="text" value="[[info.caption]]" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="alt-text">Alt text</label>
                                    <div class="col-sm-8">
                                      <input ng-model="info.alt_text" class="form-control form-control-sm" id="alt-text" type="text" value="[[info.alt_text]]"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="description">Description</label>
                                    <div class="col-sm-8">
                                      <input ng-model="info.description" class="form-control form-control-sm" id="description" type="text" value="[[info.description]]" />
                                    </div>
                                </div>
                                <br />
                                <div class="form-group row">
                                  <div class="col-sm-12">
                                      <a class="btn btn-danger btn-sm" href="{{url('admin/photos/delete')}}/[[info.id]]{{'?_token='.csrf_token()}}" alt="detle [[info.title]]">Delete</a>
                                      <div ng-click="updatePhoto(info)" class="btn btn-success btn-sm" alt="update [[info.title]]">Update</div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
      </div><!--end modal body-->
      <div class="modal-footer">
         <button ng-click="thumbnail=root_url+info.url" type="button" data-dismiss="modal" ng-disabled="!info" class="btn btn-primary">Set seautured image</button>
     </div>
    </div>
  </div>
</div>
</div>
<script src="{{asset('/app/controllers/admincontroller.js') }}"></script>
<script type="text/javascript">
$(document).ready(function() {
    var root=location.protocol+'//'+location.host;
    $('textarea').focus(function(){
      $(this).select();
    });
    $('.input-file button').on('click',function(){
           $("input.upload").click();
    });

    $('input.upload').change(function(){
          $('#modal-upload').modal('hide');
          $(".image-upload img")[0].src = window.URL.createObjectURL(this.files[0]);
              $(".image-upload").show().css({'opacity':'0.5'});
              var formupload=$("#upload-image");
              var url=formupload.attr("action");
               $.ajax({
                  url: url,
                  type: formupload.attr("method"),
                  dataType: "JSON",
                  data: new FormData(formupload[0]),
                  processData: false,
                  contentType: false,
                  success: function (data, status)
                  {
                      $(".image-upload>img")[0].src =data;
                      $(".image-upload").css('opacity','1');
                      $("#thumbnail input[name='thumbnail']").val(data);
                  },
                  error: function (xhr, desc, err)
                  {
                    alert(err);
                  }
              });
    });

    $("#add-tags").on('click', function () {
        var string_tags=$('#input-tags').val();
        tags=string_tags.split(",");
        $.each(tags,function(key,value){
            var append_tags='<span class="input-tag"><i class="fa fa-times-circle btn-remove"></i>'+value+'<input type="hidden" name="tags[]" value="'+value+'" /></span>';
            $('#show-tags').append(append_tags).on('click', 'span', function () {
                $(this).remove();
            });
        });
        $('#input-tags').val("");
    });
});

</script>
@endsection
