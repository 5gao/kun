/**
 * Created by shiKun on 2016/2/29.
 */
angular.module('PlanCtrl',[
    'virtualApp'
])
    .controller('PlanController',['$scope','$state','PlanSvc','USER',function($scope,$state,PlanSvc,USER){
        $scope.planList = {};
        function getList()
        {
            PlanSvc.getList().then(function(data){
                $scope.planList = data.data.list;
            },function(){

            });
        }
        getList();
        $scope.add = function()
        {
            if(USER.isLogged){
                $state.go('add');
            }else{
                $state.go('login');
            }
        };
    }])
    .controller('AddPlanController',['$scope','PlanSvc',function($scope,PlanSvc){


    }]);