angular.module('repcApp', [])
  .controller('dashboardCtrl', function($scope,$http) {
      var parameter = "icNo";
      var value = "970421085557";


      $scope.search = function(){

        $http.post("api.php?sAction=getData&"+parameter+"="+value)
        .then(function(response){

          console.log(response.data.data);

          $scope.runner = response.data.data;

        })
      }
      
  })
  .filter('statusFilter',function(){
    return function(status){
      if(status == 'N')
      {
        status = 'Pending for collection';
      }else if(status == 'Y')
      {
        status = 'Collected';
      }
      return status;
    }
  })
  ;