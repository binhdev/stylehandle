app.controller('admincontroller', function($scope, Service){
    $scope.root_url=root;
    $scope.getAllPhotos = function(){
      Service.get('admin/photos/all').then(function (d) {
          $scope.photos = d.data.data;
      }, function (d) {
          // alert(d.data);
      });
    };
    $scope.showInfoPhoto = function($id){
      $('photo-item').removeClass('active');
      $scope.active=$id;
        // angular.element(obj.target).addClass('active');
        Service.get('admin/photos/'+$id).then(function (d) {
            $scope.info = d.data;
        }, function (d) {
            // alert(d.data);
        });
    };
    $scope.updatePhoto = function(info){
        Service.save($scope.info,'admin/photos').then(function (d) {
            console.log(d);
        },function (d) {
            alert('Thay đổi thất bại!')
            console.log(d);
        });
    };
    $category=[];
    $category.id=0;
    $scope.editCategory = function($id){
      // console.log($id);
        Service.get('admin/categories/'+$id).then(function(d){
            if(d.data){
              $scope.category=d.data;
              $scope.url=root+"/admin/categories/"+$scope.category.id;
            }

        })
    };
    $scope.deleteTag = function($id,name){
        var returnvalue = confirm("Bạn muốn xoá tag:" + name);
        if (returnvalue == true) {
              Service.Delete($id,'admin/tags').then(function (d) {
                  console.log(d);
              }, function (d) {

              });
          }
    };
    $scope.updateThumbnail = function(url){
        $('input[name="thumbnail"]').val(url);
        $('.image-upload>img').attr('src',url);
    };
    $scope.selectMenu = function(){
       var $id=$('#menus').val();
       Service.get('admin/menus/'+$id).then(function(d){
           console.log(d.data);
           if(d.data){
             $scope.choosemenu=d.data[0];
             console.log($scope.choosemenu.name);
           }

       })
    };
    $scope.searchPosts  = function(str){
      $scope.search = {
         searchStr:str
       };
      Service.search($scope.search,'admin/posts/search').then(function(d){
          console.log(d);
          if(d.data){
            $scope.posts=d.data;
          }

      })
    };
    $scope.test = function(menulink){
        if(menulink==false){
            $scope.noneSelect=true;
        }
        else {
          $scope.noneSelect=false;
        }
    };
});
