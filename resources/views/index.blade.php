<!DOCTYPE>
<html>
@include("head")
<body>
    <script>
        console.log("haha");
        $("#add-todo-form").submit(function (event) {

                event.preventDefault();

                var $form = $(this);
                var token = $form.find("input[name='_token']").val();
                var $text = $form.find("input[name='text']").val();
                var url = $form.attr("action");

                var posting = $.post(
                    url,
                    {"_token": token, "text": text},
                );
                posting.done(
                    function(data) {
                        var content = $(data).find("#content");
                        $("#result").append("jajajaj");
                    }
                )
                }
        )
    </script>
    <div class="container">
        @include("form")
        @include("table")
    </div>
    <div id="result"></div>
</body>
</html>
