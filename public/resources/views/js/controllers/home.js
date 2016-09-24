/**
 * Created by shikun on 2016/2/29.
 */
angular.module('HomeCtrl',[
    'virtualApp'
])
    .controller('HomeController',['$scope','$rootScope','USER','UserSvc','PlanSvc',function($scope,$rootScope,USER,UserSvc,PlanSvc){
        $scope.homeList = {};
        PlanSvc.getHomeList().then(function(data){
            console.log(data);
            $scope.homeList = data.data.list;
            console.log($scope.homeList)
        },function(){

        });
    }]);