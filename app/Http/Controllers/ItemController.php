<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route("register");
        }

        $data = [
            "items" => Item::query()->where(
                "user_id", "=", Auth::id()
            )->orderBy("order_id", "desc")->get()
        ];
        return view("todo.index", $data);
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->text = $request->input("text");
        $item->order_id = Item::query()->where("user_id", "=", Auth::id()
            )->max("order_id") + 1;
        $item->user_id = Auth::id();
        $item->save();
        return redirect()->route("index");
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->done ^= 1;
        $item->save();
        return redirect()->route("index");
    }

    public function delete(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->forceDelete();
        return redirect()->route("index");
    }

    public function updateOrder(Request $request, $order, $dir)
    {
        $row = Item::where("order_id", $order)->first();
        $item = null;
        $rowOrderId = $row->order_id;

        if ($dir == "up") {
            $item = Item::where([
                ["user_id", "=", Auth::id()],
                ["order_id", ">", $order]
            ])->orderBy("order_id", "ASC")->first();
        } else if ($dir == "down") {
            $item = Item::where([
                ["user_id", "=", Auth::id()],
                ["order_id", "<", $order]
            ])->orderBy("order_id", "DESC")->first();
        }

        if ($item) {
            $row->order_id = $item->order_id;
            $item->order_id = $rowOrderId;
            $row->save();
            $item->save();
        }
        return redirect()->route("index");
    }
}
