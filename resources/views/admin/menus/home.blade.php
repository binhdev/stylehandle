@extends('admin.layouts.app')
@section('title')
<h1 class="header-panel">Menus</h1>
<a class="btn btn-light btn-outline-secondary" data-toggle="modal" data-target="#add-new">
  Add news <i class="fa fa-plus-circle" aria-hidden="true"></i>
</a>
@endsection
@section('content')
<div ng-app="panel" ng-controller="admincontroller">
@if ( !$posts->count() )
There is no menu till now.
@else

<div class="row">
  <div class="col-12">
      <label>Chọn menu</label>
      <select  required name="menu" id="menus" ng-change="selectMenu()" ng-model="menu">
        <option value="">--Select Menu--</option>
        @foreach($posts as $post)
        <option value="{{$post->id}}">{{$post->name}}</option>
        @endforeach
      </select>
  </div>
</div>
<!--  Accordion-->
<div class="row">
   <div class="col-4">
      <div id="accordion">
        <div class="card">
          <div class="card-header" id="heading-posts">
            <h5 class="mb-0">
              <div class="btn btn-link" data-toggle="collapse" data-target="#posts" aria-expanded="true" aria-controls="posts">
                Posts
              </div>
            </h5>
          </div>
          <div id="posts" class="collapse show" aria-labelledby="heading-posts" data-parent="#accordion">
            <form method="post" action="{{url('/admin/menus/addlink/posts')}}">
            <div class="card-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input required type="hidden" name="menuid" value="[[menu]]" />
                <input placeholder="keyword to search" class="search form-control" value="" ng-model="strPort" ng-change="searchPosts(strPort)"/>
                <ul id="search-post" ng-show="posts">
                    <li ng-repeat="post in posts">
                        <input ng-change="test(menulink)" name="idPosts[]" ng-model="menulink" type="checkbox" class="menu-item-checkbox" value="[[post.id]]" /> [[post.title]]
                    </li>
                </ul>
                <input ng-show="posts" ng-disabled="noneSelect==true" ng-init="noneSelect=true" type="submit" class="btn btn-success" />
            </div>
          </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="heading-categories">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#categories" aria-expanded="false" aria-controls="categories">
                Categories
              </button>
            </h5>
          </div>
          <div id="categories" class="collapse" aria-labelledby="heading-categories" data-parent="#accordion">
            <div class="card-body">
              <input class="search form-control"  />
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="heading-other">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#other" aria-expanded="false" aria-controls="other">
                Custom links
              </button>
            </h5>
          </div>
          <div id="other" class="collapse" aria-labelledby="heading-other" data-parent="#accordion">
            <div class="card-body">
                <div class="form-group row">
                      <label class="col-sm-4" for="url">Url</label>
                      <input class="form-control col-sm-8" value="" name="url" />
                </div>
                <div class="form-group row">
                      <label class="col-sm-4" for="url">Link text</label>
                      <input type="text" class="form-control col-sm-8" value="" name="link-text" />
                </div>
              <div class="form-group">
                  <a href="" class="btn btn-outline-secondary">Add to Menu</a>
              </div>
            </div>
          </div>
        </div>
      </div> <!--end accordion-->
  </div>
  <div class="col-8">
      <div class="postbox">
        <h3>Menu name: [[choosemenu.name]] -  menu slug <input type="text" value="[[choosemenu.slug]]" />
        </h3>
        <div id="list-menu">
          <div class="card" ng-repeat="listmenus in choosemenu.menulinks">
            <div class="card-header" id="heading-[[listmenus.id]]">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#[[listmenus.id]]" aria-expanded="true" aria-controls="collapseOne">
                  [[listmenus.name]]
                </button>
              </h5>
            </div>

            <div id="[[listmenus.id]]" class="collapse" aria-labelledby="heading-[[listmenus.id]]" data-parent="#list-menu">
              <div class="card-body">
                test
              </div>
            </div>
          </div>

        </div>
      </div>
  </div>
</div>
</form>
@endif
  <div id="add-new" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <form action="{{url('/admin/menus/')}}" method="post">
              <div class="modal-header">
                <h5 class="modal-title">Add menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                          <label for="name">Menu name</label>
                          <input required value="{{ old('name') }}" placeholder="Enter category name" type="text" id="name" name="name" class="form-control" />
                      </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add new</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('/app/controllers/admincontroller.js') }}"></script>
@endsection
