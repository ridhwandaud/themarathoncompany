angular.module('repcApp', [])
  .controller('dashboardCtrl', function($scope,$http) {
      var parameter = "icNo";
      var value = "970421085557";

      $scope.runner = {};

      $scope.runner.params = "icNo";

      $scope.showIc = true;

      $scope.search = function(runner){
        console.log("search input",runner);

        $scope.errorMessage = "";
        $scope.successMessage = "";

        $http.post("api.php?sAction=getData&"+runner.params+"="+runner.search)
        .then(function(response){

          console.log(response.data.data);
          if(response.data.statuscode == 200)
          {
            $scope.runner = response.data.data;
            $scope.successMessage = response.data.message;
            console.log($scope.runner.status)
            if($scope.runner.status == "N")
            {
              $scope.collected = false;
              alert("asasd");
            }

          }else{
            $scope.errorMessage = response.data.message;
          }
          

        })
      }

      $scope.searchForm = function(valid)
      {
        if(valid)
        {
          searchSubmitted = true;
        }
      }

      $scope.change = function(runner){
        $scope.runner.search = "";
        if(runner.params == "icNo")
        {
          $scope.showIc = true;
        }else{
          $scope.showIc = false;
        }
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