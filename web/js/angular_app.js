var Application = angular.module('TaskFeed', []);
Application.controller('TaskController', TaskController);


function TaskController($scope, $http) {
    $scope.tasks = {};

    $scope.currentPage = 0;
    $scope.pageSize = 3;
    
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
    getMessages();

}


Application.filter('startFrom', function() {
    return function(input, start) {
        start = +start;
        return input.slice(start);
    }
});