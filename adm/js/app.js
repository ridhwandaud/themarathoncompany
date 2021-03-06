angular.module('repcApp', ['ngFlash'])
  .controller('dashboardCtrl', function($scope,$http,Flash) {
      var parameter = "icNo";
      var value = "970421085557";

      $scope.runner = {}; 
      $scope.showIc = true;

      $scope.search = function(runner){
        console.log("search input",runner);

        $scope.errorMessage = "";
        $scope.successMessage = "";

        $scope.runner.params = 'icNo';

        if(runner.search == undefined)
        {
          var message = '<strong>Please fill in the ic/cono</strong>';
          var id = Flash.create('warning', message);
          return;
        }

        $http.post("api.php?sAction=getData&"+$scope.runner.params+"="+runner.search)
        .then(function(response){

          if(response.data.statuscode == 200)
          {
            $scope.runner = response.data.data;
            $scope.successMessage = "User found";

            var message = '<strong>' + $scope.successMessage + '</strong>';
            var id = Flash.create('success', message);

            if($scope.runner.status == "N")
            {
              $scope.collected = false;
              $scope.runner.collect = "self";
            }

          }else{
            $scope.errorMessage = response.data.message;
            var message = '<strong>User not found</strong>';
            var id = Flash.create('danger', message);
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

      $scope.collectKit = function(runner,collecter)
      {
        $http.post("api.php?sAction=updtData",runner)
        .then(function(response){
          console.log("response",response);
          $scope.collected = true;
          $scope.runner.status = "Y";
          if(runner.collect == 'self')
            var message = '<strong>Runner successfully collect kit.</strong>';
          else
            var message = '<strong>Runner on behalf successfully collect kit.</strong>';
          var id = Flash.create('success', message);
        },function(error){
          console.log('error : ',error);
        })

      }

      $scope.updateData = function(runner)
      {
        $http.post("api.php?sAction=updtData",runner)
        .then(function(response){

          if(response.data.statuscode == 200)
          {
            $scope.successMessage = "Runner data successfully updated";

            var message = '<strong>' + $scope.successMessage + '</strong>';
            var id = Flash.create('success', message);

            if($scope.runner.status == "N")
            {
              $scope.collected = false;
              $scope.runner.collect = "self";
            }

          }else{
            $scope.errorMessage = response.data.message;
            var message = '<strong>Runner data failed to update</strong>';
            var id = Flash.create('danger', message);
          }

        },function(error){
          console.log('error : ',error);
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