/**
 * Created by shikun on 2016/2/29.
 */
angular.module('loginCtrl',[
        'virtualApp'
    ])
    .controller('loginController',['$scope','$state','UserSvc','USER',function($scope,$state,UserSvc,USER){
        function login(username,password){
            UserSvc.login(username,password).then(function(data){
                if(data.status==1){
                    $state.go('home')
                }else{
                    alert('请重新登录');
                }
            },function(){
                alert('请重新登录');
            })
        }

        $scope.submit = function(){
            if(!$scope.username || !$scope.password){
                alert('重新输入');
                return false;
            }
            login($scope.username,$scope.password);
        };
    }]);