angular.module('userService',[
    'virtualApp'
]).factory('UserSvc', ['$http', '$q','USER', function ($http, $q, USER) {

    var getList = function (keyword) {
        var defer = $q.defer();
        $http.post('/api/user/list',{
            keyword:keyword
        }).success(function (res) {
            defer.resolve(res);
        }).error(function () {
            defer.reject();
        });
        return defer.promise
    };
    var login = function(username,password){
        var defer = $q.defer();
        $http.post('/api/user/login',{
            username:username,
            password:password
        }).success(function (res) {
            angular.extend(USER, res.data);
            USER.isLogged = true;
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    var isLogin = function(){
        var defer = $q.defer();
        $http.post('/api/user/isLogin'
        ).success(function (res) {
            if(res.status==-1){
                defer.reject();
            }else{
                angular.extend(USER, res.data[0]);
                USER.isLogged = true;
                defer.resolve(res);
            }
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    var loginOut = function() {
        var defer = $q.defer();
        $http.get('/api/user/loginOut'
        ).success(function (res) {
            if(res.status==-1){
                defer.reject();
            }else{
                defer.resolve(res);
            }
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    return {
        getList : getList,
        login:login,
        isLogin:isLogin,
        loginOut:loginOut
    }
}]);