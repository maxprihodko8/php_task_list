var Application = angular.module('TaskFeed', []);
Application.controller('TaskController', TaskController);

Application.directive('fileUpload', function () {
    return {
        scope: true,
        link: function (scope, el, attrs) {
            el.bind('change', function (event) {
                var files = event.target.files;
                for (var i = 0; i < files.length; i++) {
                    scope.$emit("fileSelected", {file: files[i]});
                }
            });
        }
    };
});

function TaskController($scope, $http) {
    $scope.tasks = {};
    $scope.sort = 'status';

    $scope.currentPage = 0;
    $scope.pageSize = 3;

    $scope.new_task = {
        'username': '',
        'email': '',
        'text': '',
        'image': ''
    };
    $scope.files = [];

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

    $scope.newTaskFunc = function sendNewTask() {
        var url = '/api/newtask';
        console.log($scope.files);
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

    getMessages();
}


Application.filter('startFrom', function() {
    return function(input, start) {
        start = +start;
        return input.slice(start);
    }
});
