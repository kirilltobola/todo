<table class="table">
    <tbody>
        @foreach($items as $item)
            <tr>
                <th @if($item->done) class="text-decoration-line-through" @endif>
                    {{ $item->text }}
                </th>

                <th>
                    <form action="{{route("update", ["id" => $item->id])}}" method="post">
                        @csrf
                        @method("PUT")
                        <button type="submit">Done</button>
                    </form>
                </th>

                <th>
                    <form action="{{route("delete", ["id" => $item->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Delete</button>
                    </form>
                </th>

                <th>
                    <form action="{{route("order", ["order" => $item->order_id, "dir" => "up"])}}" method="post">
                        @csrf
                        @method("PUT")
                        <button type="submit">Up</button>
                    </form>
                </th>

                <th>
                    <form action="{{route("order", ["order" => $item->order_id, "dir" => "down"])}}" method="post">
                        @csrf
                        @method("PUT")
                        <button type="submit">Down</button>
                    </form>
                </th>
            </tr>
        @endforeach
    </tbody>
</table>
