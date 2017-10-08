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

    <button id="myBtn">New Task</button>

    <div id="myModal" class="modal">

        <div class="modal-content">
            <form>
                <span class="close">&times;</span>
                <label for="username"> Username
                    <input ng-model="new_task.username" id="username"/>
                </label>
                <label for="email"> Email
                    <input ng-model="new_task.email" id="email"/>
                </label>
                <label for="text"> Text
                    <textarea ng-model="new_task.text" id="text"></textarea>
                </label>
                <label for="image"> Image
                    <input ng-model="new_task.image" id="image"/>
                </label>
                <input type="submit" value="Submit" ng-click="newTaskFunc()">
            </form>
        </div>

    </div>
</div>


<script>
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    };

    span.onclick = function() {
        modal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>





<script type="application/javascript" src="/web/js/angular_app.js"></script>
