/**
 * Created by shiKun on 2016/2/29.
 */
angular.module('PlanCtrl',[
    'virtualApp'
])
    .controller('PlanController',['$scope','$state','PlanSvc','CollectSvc','USER',function($scope,$state,PlanSvc,CollectSvc,USER){
        $scope.planList = {};
        $scope.page = 0;
        $scope.offset = 10;
        $scope.currentPage = 0;
        function getList(page,offset,keyword)
        {
            console.log($scope.page);
            PlanSvc.getList(page,offset,keyword).then(function(data){
                if(data.status==1){
                    $scope.planList = data.data.list;
                    $scope.count = data.data.count;
                }
            },function(){

            });
        }
        function likes(id,title)
        {
            CollectSvc.likes(id,title).then(function(data){
                console.log(data);
            },function(){

            });
        }
        function collect(id,title)
        {
            CollectSvc.add(id,title).then(function(data){
                console.log(data);
            },function(){

            });
        }
        getList($scope.page,$scope.offset,'');
        $scope.add = function()
        {
            if(USER.isLogged){
                $state.go('add');
            }else{
                $state.go('login');
            }
        };
        $scope.view = function(id)
        {
            $state.go('view',{id:id});
        };
        $scope.collect = function(id,title){
            if(USER.isLogged){
                collect(id,title);
            }else{
                $state.go('login');
            }
        };

        $scope.likes = function(id,title)
        {
            if(USER.isLogged){
                likes(id,title);
            }else{
                $state.go('login');
            }
        };
        $scope.search = function()
        {
            getList($scope.keyword);
        };
        $scope.nextPage = function()
        {
            console.log($scope.currentPage);
            console.log($scope.offset);
            if($scope.count>(parseInt($scope.offset)*parseInt($scope.currentPage+1))){
                $scope.currentPage =$scope.currentPage+1;
                var page = parseInt($scope.offset)*parseInt($scope.currentPage);
                getList(page,$scope.offset,$scope.keyword);
            }


        };
        $scope.oldPage = function()
        {
            if($scope.currentPage>0){
                $scope.currentPage =$scope.currentPage-1;
                var page = parseInt($scope.offset)*parseInt($scope.currentPage);
                getList(page,$scope.offset,$scope.keyword);
            }

        }
    }])
    .controller('AddPlanController',['$scope','$state','PlanSvc',function($scope,$state,PlanSvc){
        function add(title,describe,public){
            PlanSvc.add(title,describe,public).then(function(data){
                if(data.status){
                    alert('发布成功')
                }
            },function(){
                alert('提交失败');
            });
        }
        $scope.submit = function(){
            if(!$scope.title || !$scope.describe)return false;
            add($scope.title,$scope.describe,$scope.public);
        };
    }])
    .controller('ViewPlanController',['$scope','$state','$stateParams','PlanSvc',function($scope,$state,$stateParams,PlanSvc){
        var id = $stateParams.id;
        function view(id){
            PlanSvc.view(id).then(function(data){
                if(data.status==1){
                    $scope.planInfo = data.data[0];
                }
            },function(){

            });
        }
        function likes(id)
        {
            PlanSvc.likes(id).then(function(data){
                console.log(data);
            },function(){

            });
        }
        function comment(id,content){
            PlanSvc.comment(id,content).then(function(data){
                console.log(data);
            },function(){

            });
        }

        function collect(id)
        {
            PlanSvc.collect(id).then(function(data){
                console.log(data);
            },function(){

            });
        }
        view(id);
        $scope.collect = function(id){
            collect(id);
        };

        $scope.likes = function(id){

        };
        $scope.comment = function(id){

            comment(id,$scope.content);
        }


    }]);