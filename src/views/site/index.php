<div ng-app="TaskFeed" ng-controller="TaskController" class="ng-cloak" id="task_div">
    <form>
        Сортировка
        <input type="radio" name="sort_col" ng-model="sort" value="username"> имя
        <input type="radio" name="sort_col" ng-model="sort" value="email"> Email
        <input type="radio" name="sort_col" ng-model="sort" value="status"> Статус

    </form>
    <ul ng-repeat="task in tasks  | orderBy: sort | startFrom:currentPage*pageSize | limitTo:pageSize" class="list">
        <li class="list-item">
            <div class="list-content">
                <h2>{{task.username}}</h2>
                <img ng-src="{{task.image}}" />
                <p>{{task.text}}</p>
                <p>{{task.email}}</p>
            </div>
        </li>
    </ul>

    <button ng-disabled="currentPage == 0" ng-click="currentPage=currentPage-1">
        Previous
    </button>
    {{currentPage+1}}/{{numberOfPages()}}
    <button ng-disabled="currentPage >= data.length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next
    </button>

</div>





<script type="application/javascript" src="/web/js/angular_app.js"></script>
