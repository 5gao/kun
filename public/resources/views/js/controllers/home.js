/**
 * Created by shikun on 2016/2/29.
 */
angular.module('homeCtrl',[
    'virtualApp'
])
    .controller('homeController',['$scope','$rootScope','USER',function($scope,$rootScope,USER){
        $rootScope.LoginStatus = USER.isLogged;
    }]);