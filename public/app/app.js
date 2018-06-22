var root = location.protocol + '//' + location.host;
var app = angular.module('panel', []).constant('API_URL', root);
app.constant("CSRF_TOKEN", '{{ csrf_token() }}');
app.config(function($interpolateProvider) {
   $interpolateProvider.startSymbol('[[');
  $interpolateProvider.endSymbol(']]');
});
app.config(['$httpProvider', function($httpProvider) {
    $httpProvider.defaults.headers.common['X-CSRFToken'] = '{{ csrf_token|escapejs }}';
}]);
app.factory('Service', function ($http, API_URL){
    var res = {};
    res.get = function (model) {
        return $http({
            method: 'GET',
            dataType: 'jsonp',
            url: API_URL +"/"+model
        });
    }
    res.search = function ($data, model) {
        return $http({
          method: 'POST',
          data: $data,
          url: API_URL +"/"+model
        });
    }
    res.save = function ($data,model) {
        return $http({
            method: 'PUT',
            data: $data,
            url: API_URL +"/"+model+"/"+$data.id
        });
    }
    res.Delete = function (id,model) {
      return $http({
          method: 'DELETE',
          dataType: 'jsonp',
          url: API_URL +"/"+model+"/"+id
      });
    };
    return res;
});
