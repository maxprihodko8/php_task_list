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
                <p>{{task.status}}</p>
                <p ng-show="task.is_completed == 1">Completed!</p>
                <p ng-show="is_admin && task.is_completed == 0"><input type="button" ng-click="completeTask(task.id)"></p>
                <button ng-show="is_admin" ng-click="editTask(task)">Edit task</button>
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
    <button ng-disabled="currentPage >= tasks.length/pageSize - 1" ng-click="currentPage=currentPage+1">
        Next
    </button>

    <button id="myBtn">New Task</button>

    <div id="myModal" class="modal">

        <div class="modal-content">
            <form action="/api/newtask" method="post" enctype="multipart/form-data">
                <span class="close">&times;</span>
                <input type="hidden" name="id" value="{{new_task.id}}" />
                <label for="username"> Username
                    <input ng-model="new_task.username" name="username" id="username"/>
                </label>
                <label for="email"> Email
                    <input ng-model="new_task.email" name="email" id="email"/>
                </label>
                <label for="text"> Text
                    <textarea rows="10" cols="30" ng-model="new_task.text" name="text" id="text"></textarea>
                </label>
                <label for="text"> Status
                    <input ng-model="new_task.status" name="status" id="status" />
                </label>
                <label for="image"> Image
                    <input type="file" size = '50' name="image" id="image"/>
                </label>
                <!--<input type="submit" value="Submit" ng-click="newTaskFunc()">-->
                <input type="submit" value="Submit"/>
                <input type="checkbox" ng-click="showNewTask = !showNewTask" aria-label="toggle feature view">Превью
            </form>
        </div>

        <ul class="list" id="new_task_ul" ng-show="showNewTask">
            <li class="list-item">
                <div class="list-content">
                    <h2>{{new_task.username}}</h2>
                    <p>{{new_task.status}}</p>
                    <p>{{new_task.text}}</p>
                    <p>{{new_task.email}}</p>
                </div>
            </li>
        </ul>

    </div>

</div>



<script type="application/javascript" src="/web/js/angular_app.js"></script>
<script type="application/javascript" src="/web/js/modal.js"></script>
