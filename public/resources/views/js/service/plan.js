angular.module('PlanService',[
    'virtualApp'
]).factory('PlanSvc', ['$http', '$q', function ($http, $q) {

    var getList = function () {
        var defer = $q.defer();
        $http.get('/api/plan/list').success(function (res) {
            defer.resolve(res);
        }).error(function (reason) {
            defer.reject(reason);
        });
        return defer.promise
    };
    var view = function(id){
        var defer = $q.defer();
        $http.post('/api/plan/view',{
            params:{
                id:id
            }
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    var deleteQu = function(id){
        var defer = $q.defer();
        $http.post('/api/plan/delete',{
            params:{
                id:id
            }
        }).success(function(res){
            defer.resolve(res);
        }).error(function(reason){
            defer.reject(reason);
        });
        return defer.promise;
    };
    var add = function(data){
        var defer = $q.defer();
        $http.post('/api/plan/add',{
            params:{
                data:data
            }
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
        delete:deleteQu
    }
}]);