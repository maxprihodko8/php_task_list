var Application = angular.module('TaskFeed', []);
Application.controller('TaskController', TaskController);


function TaskController($scope, $http) {
    $scope.tasks = {};


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


