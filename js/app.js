angular.module('repcApp', [])
  .controller('dashboardCtrl', function($scope,$http) {
      var parameter = "icNo";
      var value = "970421085557";

      $scope.runner = {};

      $scope.runner.params = "icNo";

      $scope.search = function(runner){
        console.log("search input",runner);

        $http.post("api.php?sAction=getData&"+runner.params+"="+runner.search)
        .then(function(response){

          console.log(response.data.data);
          if(response.data.statuscode == 200)
          {
            $scope.runner = response.data.data;
            $scope.successMessage = response.data.message;
          }else{
            $scope.errorMessage = response.data.message;
          }
          

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