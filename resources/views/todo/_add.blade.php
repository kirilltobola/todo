<form id="add-todo-form" style="margin-left: 25%" action="{{ route("store") }}" method="post">
    @csrf

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="todo_text" class="form-label">Текст:</label>
        </div>
        <div class="col-auto">
            <input type="text" class="form-control" id="todo_text" name="text" required>
        </div>
        <div class="col-auto">
            <button id="btn-add-todo" type="submit" class="btn btn-primary">Добавить</button>
        </div>
    </div>
</form>
