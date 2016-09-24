angular.module('CollectService',[
    'virtualApp'
]).factory('CollectSvc', ['$http', '$q', function ($http, $q) {

    var add = function (id,title) {
        var defer = $q.defer();
        $http.post('/api/collect/add',{
            id:id,
            title:title
        }).success(function (res) {
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    var likes = function (id,title) {
        var defer = $q.defer();
        $http.post('/api/collect/likes',{
            id:id,
            title:title
        }).success(function (res) {
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    return {
        add : add,
        likes:likes
    }
}]);