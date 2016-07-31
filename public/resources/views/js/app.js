/**
 * Created by shikun on 2016/2/29.
 */
'use strict';
var virtualApp = angular.module('virtualApp',[
    'ui.router',
    'homeCtrl',
    'PlanCtrl',
    'loginCtrl',
    'userService',
    'PlanService'
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
            controller: 'homeController'
        })
        .state('home',{
            url:'/',
            templateUrl: '/resources/views/html/home/home.html',
            controller: 'homeController'
        })
        .state('plan',{
            url:'/plan',
            templateUrl:'/resources/views/html/plan/plan.html',
            controller:'PlanController'
        }).state('add',{
            url:'/plan/add',
            templateUrl:'/resources/views/html/plan/add.html',
            controller:'AddPlanController'
        }).state('myPlan',{
            url:'/myPlan',
            templateUrl:'/resources/views/html/myPlan/myPlan.html',
            controller:'MyPlanController'
        })
        .state('user',{
            url:'/user',
            templateUrl:'/resources/views/html/user/user.html',
            controller:'placeController'
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
virtualApp.controller('AppCtrl', ['$scope','$rootScope', '$state','USER', function($scope,$rootScope, $state,USER) {
    $scope.$state = $state;
    $rootScope.LoginStatus = USER.isLogged;
}]);