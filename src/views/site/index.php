<div ng-app="TaskFeed" ng-controller="TaskController" class="ng-cloak">
    <span class="errors_field">
        {{errors}}
    </span>
    <ul ng-repeat="task in tasks">
        <li>
            {{task.id}}
        </li>

        <li>
            {{task.status}}
        </li>
        <li>
            {{task.text}}
        </li>
    </ul>
</div>


<script type="application/javascript" src="/web/js/angular_app.js"></script>
