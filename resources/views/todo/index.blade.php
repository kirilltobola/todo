<!DOCTYPE>
<html lang="ru">
@include("todo._head")
<body>
    @include("todo._navbar")
    <div class="container fs-3 rounded-2">
        <div class="container m-5 bg-light">
            @include("todo._add")
            <div class="container">
                @include("todo._items_list")
            </div>
        </div>
    </div>
</body>
</html>
