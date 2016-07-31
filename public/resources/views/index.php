<!DOCTYPE html>
<html lang="en" ng-app="virtualApp" ng-controller="AppCtrl">
<head>
    <meta charset="UTF-8">
    <title>狨猴</title>
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="col-md-10 col-md-offset-1">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <!--<div class="navbar-header">
            <a class="navbar-brand" href="#">狨猴</a>
        </diV>-->
        <div>
            <ul class="nav navbar-nav">
                <li><a ui-sref-active="active" href="javascript://" ui-sref="home"><span class="glyphicon glyphicon-home"></span>狨猴</a></li>
                <li><a ui-sref-active="active" href="javascript://" ui-sref="plan" >计划</a></li>
                <li><a ui-sref-active="active" href="javascript://" ui-sref="myPlan" ng-if="LoginStatus" >我的计划</a></li>
                <!--<li><a ui-sref-active="active" href="javascript://" ui-sref="brand" >公司</a></li>
                <li><a ui-sref-active="active" href="javascript://" ui-sref="brand" >品牌建设</a></li>
                <li><a ui-sref-active="active" href="javascript://" ui-sref="place">渠道建设</a></li>-->
                <!--<li><a ui-sref-active="active" href="javascript://">人才管理</a></li>
                <li><a ui-sref-active="active" href="javascript://">升将通</a></li>-->
                <!--<li><a ui-sref-active="active" href="javascript://">下载</a></li>-->
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a ui-sref-active="active" href="javascript://" ui-sref="login" ng-if="!LoginStatus">登录</a></li>
            </ul>
        </div>
    </nav>
</div>
<div class="col-md-10 col-md-offset-1">
    <div ui-view>

    </div>
</div>
<!-- JavaScripts -->
<script src="/resources/views/lib/jquery/dist/jquery.min.js"></script>
<script src="/resources/views/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/resources/views/lib/angular/angular.js"></script>
<script src="/resources/views/lib/angular-route/angular-route.js"></script>
<script src="/resources/views/lib/angular-ui-router/release/angular-ui-router.min.js"></script>
<script src="/resources/views/lib/My97DatePicker/WdatePicker.js"></script>
<script src="/resources/views/js/app.js"></script>
<script src="/resources/views/js/controllers/plan.js"></script>
<script src="/resources/views/js/controllers/user.js"></script>
<script src="/resources/views/js/controllers/home.js"></script>
<script src="/resources/views/js/controllers/login.js"></script>
<script src="/resources/views/js/service/user.js"></script>
<script src="/resources/views/js/service/plan.js"></script>
</body>
</html>
