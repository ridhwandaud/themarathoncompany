angular.module('repcApp', [])
  .controller('dashboardCtrl', function($scope,$http) {
      var parameter = "icNo";
      var value = "970421085557";

      $scope.runner = {}; 
      $scope.showIc = true;

      $scope.search = function(runner){
        console.log("search input",runner);

        $scope.errorMessage = "";
        $scope.successMessage = "";

        $scope.runner.params = 'icNo';

        $http.post("api.php?sAction=getData&"+$scope.runner.params+"="+runner.search)
        .then(function(response){

          if(response.data.statuscode == 200)
          {
            $scope.runner = response.data.data;
            $scope.successMessage = response.data.message;

            if($scope.runner.status == "N")
            {
              $scope.collected = false;
              $scope.runner.collect = "self";
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
  .filter('collectFilter',function(){
    return function(collect){
      if(collect == 'self')
      {
        collect = 'Collect Now';
      }else if(collect == 'ob')
      {
        collect = 'Collect on Behalf';
      }
      return collect;
    }
  })
  ;