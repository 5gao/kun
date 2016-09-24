<!DOCTYPE html>
<html lang="en" ng-app="virtualApp" ng-controller="AppCtrl">
<head>
    <meta charset="UTF-8">
    <title>简单计划</title>
    <link href="/resources/views/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/resources/views/css/main.css" rel="stylesheet">
</head>
<body>
<div>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div>
            <div class="col-xs-6 col-lg-4 col-xs-offset-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a ui-sref-active="active" href="javascript://" ui-sref="home"><span
                                class="glyphicon glyphicon-home"></span>首页</a></li>
                    <li>
                        <a ui-sref-active="active" href="javascript://" ui-sref="plan">
                            <span class="glyphicon glyphicon-tree-conifer"></span>计划
                        </a>
                    </li>
                    <li>
                        <a ui-sref-active="active" href="javascript://" ui-sref="myPlan" ng-if="LoginStatus">
                            <span class="glyphicon glyphicon-heart"></span> 我的计划</a>
                    </li>
                </ul>
            </div>
            <div class="col-xs-4 col-lg-4 col-xs-offset-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a ui-sref-active="active" href="javascript://" ui-sref="login" ng-if="!LoginStatus">登录</a>
                    </li>
                    <li class="dropdown" ng-if="LoginStatus">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript://">{{username}}</a>
                        <ul class="dropdown-menu" style="width: 100px;">
                            <li><a href="javascript://" ui-sref="user.userBasic">我的主页</a></li>
                            <li><a href="javascript://" ng-click="loginOut()">退出登录</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="row">
    <div ui-view>

    </div>
</div>
<div class="col-md-12 col-md-offset" style="margin-bottom: -10px;">
    <hr>
    <footer class="footer">
        <div class="container">
            <p>&copy; 2016 hiplan.cn</p>
            <p class="text-muted">备案号</p>
        </div>
    </footer>
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
<script src="/resources/views/js/service/collect.js"></script>
</body>
</html>
