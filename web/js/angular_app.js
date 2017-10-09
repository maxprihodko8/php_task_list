var Application = angular.module('TaskFeed', []);
Application.controller('TaskController', TaskController);


function TaskController($scope, $http) {
    $scope.tasks = {};
    $scope.sort = 'status';

    $scope.currentPage = 0;
    $scope.pageSize = 3;

    $scope.new_task = {
        'username': '',
        'email': '',
        'text': '',
        'image': '',
        'status': ''
    };
    $scope.files = [];
    $scope.is_admin = false;

    $scope.$on("fileSelected", function (event, args) {
        $scope.$apply(function () {
            $scope.files.push(args.file);
        });
    });

    $scope.numberOfPages=function(){
        return Math.ceil($scope.tasks.length/$scope.pageSize);
    };

    function getMessages() {
        var url = '/api/tasks';

        $http({
            method: 'POST',
            url: url,
            headers: {
                'Content-type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }
        }).then(function successCallback(response) {
            if (response !== null && response.status === 200) {
                $scope.tasks = response.data;
            }
        }, function errorCallback(response) {
        });
    }

    function isAdminCheck() {
        if (getCookie('is_admin')) {
            $scope.is_admin = true;
        }
    }

    $scope.completeTask = function (id) {
        var url = '/api/completetask/' + id;
        $http({
            method: 'POST',
            url: url,
            headers: {
                'Content-type': undefined,
                'Access-Control-Allow-Origin': '*'
            }
        }).then(function successCallback(response) {
            location.reload();
        }, function errorCallback(response) {
        });
    };

    $scope.newTaskFunc = function sendNewTask() {
        var url = '/api/newtask';

        $http({
            method: 'POST',
            url: url,
            data: {model: $scope.new_task, files: $scope.files},
            headers: {
                'Content-type': undefined,
                'Access-Control-Allow-Origin': '*'
            }
        }).then(function successCallback(response) {
            location.reload();
        }, function errorCallback(response) {
        });
    };

    $scope.editTask = function (task) {
        $scope.new_task = task;
        document.getElementById('myBtn').click();
    };

    getMessages();
    isAdminCheck();
}


Application.filter('startFrom', function() {
    return function(input, start) {
        start = +start;
        return input.slice(start);
    }
});

function getCookie(name) {
    var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
    ));
    return matches ? decodeURIComponent(matches[1]) : undefined;
}