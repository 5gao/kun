/**
 * Created by shiKun on 2016/2/29.
 */
angular.module('UserCtrl',[
    'virtualApp'
])
    .controller('UserController',['$scope','USER','UserSvc',function($scope,USER,UserSvc){

        console.log(USER);
        $scope.userInfo = USER;
        $scope.submit = function(){
            if($scope.username){

            }
        };
    }])
    .controller('MyPlanController',['$scope','UserSvc','PlanSvc',function($scope,UserSvc,PlanSvc){
        function  getMyPlan(keyword){
            UserSvc.getList(keyword).then(function(data){
                $scope.myPlan = data.data.list;
                $scope.count = data.data.count;
                console.log($scope);
            },function(){

            });
        }
        function remove(id){
            PlanSvc.deletePlan(id).then(function(data){
                if(data.status==1){
                    alert('删除成功');
                }
            },function(){

            });
        }
        function changeStatus(id,status){
            PlanSvc.updateStatus(id,status).then(function(data){
                console.log(data);
            },function(){

            });
        }
        function changePublic(id,public){
            PlanSvc.updatePublic(id,public).then(function(data){
                console.log(data);
            },function(){

            });
        }
        getMyPlan();

        $scope.remove = function(id)
        {
            remove(id);
        };
        $scope.changeStatus = function(id,status)
        {
            changeStatus(id,status);
        };

        $scope.changePublic = function(id,public){
            changePublic(id,public);
        };
        $scope.search = function()
        {
            getMyPlan($scope.keyword);
        };
    }])
    .controller('InfoController',['$scope','UserSvc','PlanSvc','USER',function($scope,UserSvc,PlanSvc,USER){
        console.log(1);
        $scope.userInfo = USER;
        $scope.status = false

        $scope.editStatus = function()
        {
            $scope.status = true;
        }
    }]);