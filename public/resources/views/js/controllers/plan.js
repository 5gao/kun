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
    .controller('AddPlanController',['$scope','$state','PlanSvc',function($scope,$state,PlanSvc){
        function add(title,describe,public){
            PlanSvc.add(title,describe,public).then(function(data){
                if(data.status){
                    alert('发布成功')
                }
            },function(){
                alert('提交失败');
            });
        }
        $scope.submit = function(){
            if(!$scope.title || !$scope.describe)return false;
            add($scope.title,$scope.describe,$scope.public);
        };
    }]);