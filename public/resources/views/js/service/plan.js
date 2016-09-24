angular.module('PlanService',[
    'virtualApp'
]).factory('PlanSvc', ['$http', '$q', function ($http, $q) {

    var getList = function (page,offset,keyword) {
        var defer = $q.defer();
        $http.post('/api/plan/list',{
            page:page,
            offset:offset,
            keyword:keyword
        }).success(function (res) {
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    var getHomeList = function () {
        var defer = $q.defer();
        $http.post('/api/home/list').success(function (res) {
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    var view = function(id){
        var defer = $q.defer();
        $http.post('/api/plan/view',{
            id:id
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    var deletePlan = function(id){
        var defer = $q.defer();
        $http.post('/api/plan/delete',{
            id:id
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    var add = function(title,describe,public){
        var defer = $q.defer();
        $http.post('/api/plan/add',{
            title:title,
            describe:describe,
            public:public
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    var updateStatus = function(id,status){
        var defer = $q.defer();
        $http.post('/api/plan/status/update',{
            id:id,
            status:status
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    var updatePublic = function(id,public){
        var defer = $q.defer();
        $http.post('/api/plan/public/update',{
            id:id,
            public:public
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    return {
        getList : getList,
        add:add,
        view:view,
        deletePlan:deletePlan,
        getHomeList:getHomeList,
        updateStatus:updateStatus,
        updatePublic:updatePublic

    }
}]);