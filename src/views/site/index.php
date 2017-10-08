<div ng-app="TaskFeed" ng-controller="TaskController" class="ng-cloak">
    <span class="errors_field">
        {{errors}}
    </span>
    <ul ng-repeat="task in tasks" class="list">
        <li class="list-item">
            <div class="list-content">
                <h2>{{task.status}}</h2>
                <img ng-src="{{task.image}}" />
                <p>{{task.text}}</p>
            </div>
        </li>
    </ul>
</div>



<script type="application/javascript" src="/web/js/angular_app.js"></script>
