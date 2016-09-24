/**
 * Created by shikun on 2016/2/29.
 */
'use strict';
var virtualApp = angular.module('virtualApp',[
    'ui.router',
    'HomeCtrl',
    'PlanCtrl',
    'loginCtrl',
    'UserCtrl',
    'userService',
    'PlanService',
    'CollectService'
]);
virtualApp.constant().value('USER',{
    isLogged: false,
    username: ''
});
virtualApp.config(['$stateProvider','$urlRouterProvider',function($stateProvider,$urlRouterProvider){
    $urlRouterProvider.otherwise('/');
    $stateProvider
        .state('dashboard',{
            url: '/',
            templateUrl: '/resources/views/html/home/home.html',
            controller: 'HomeController'
        })
        .state('home',{
            url:'/',
            templateUrl: '/resources/views/html/home/home.html',
            controller: 'HomeController'
        })
        .state('plan',{
            url:'/plan',
            templateUrl:'/resources/views/html/plan/plan.html',
            controller:'PlanController'
        }).state('add',{
            url:'/plan/add',
            templateUrl:'/resources/views/html/plan/add.html',
            controller:'AddPlanController'
        }).state('view',{
            url:'/plan/view/:id',
            templateUrl:'/resources/views/html/plan/view.html',
            controller:'ViewPlanController'
        }).state('myPlan',{
            url:'/myPlan',
            templateUrl:'/resources/views/html/myPlan/myPlan.html',
            controller:'MyPlanController'
        })
        .state('user',{
            url:'/user',
            templateUrl:'/resources/views/html/user/user.html',
            controller:'UserController'
        })
        .state('user.userBasic',{
            url:'/userBasic',
            templateUrl:'/resources/views/html/user/basic.html',
            controller:'UserController'
        })
        .state('user.info',{
            url:'/userInfo',
            templateUrl:'/resources/views/html/user/info.html',
            controller:'InfoController'
        })
        .state('login',{
            url:'/login',
            templateUrl:'/resources/views/html/login/login.html',
            controller:'loginController'
        });
}]);
virtualApp.run(function($rootScope){

});
virtualApp.controller('MainCtrl', [function() {

}]);
virtualApp.controller('AppCtrl', ['$scope','$rootScope', '$state','USER','UserSvc', function($scope,$rootScope, $state,USER,UserSvc) {
    $scope.$state = $state;
    UserSvc.isLogin().then(function(data){
        $rootScope.LoginStatus = USER.isLogged;
        $rootScope.username = USER.username;
    },function(){
        $rootScope.LoginStatus = USER.isLogged;
    });


    $scope.loginOut = function()
    {
        UserSvc.loginOut().then(function(data){
            USER.isLogged = false;
            USER.username = '';
            $rootScope.LoginStatus = USER.isLogged;
            $rootScope.username = USER.username;
        },function(){

        });
    }
}]);