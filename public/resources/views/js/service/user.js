angular.module('userService',[
    'virtualApp'
]).factory('UserSvc', ['$http', '$q','USER', function ($http, $q, USER) {

    var getList = function () {
        var defer = $q.defer();
        $http.get('/api/user/list').success(function (res) {
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
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
    return {
        getList : getList,
        login:login
    }
}]);