<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view("index", [
            "items" => Item::orderBy("order_id", "desc")->get()
        ]);
    }

    public function store(Request $request)
    {
        $item = new Item();
        $item->text = $request->input("text");
        $item->order_id = Item::max("id") + 1;
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

    public function updateOrder(Request $request, $order, $dir)
    {
        $row = Item::where("order_id", $order)->first();
        $item = null;
        $rowOrderId = $row->order_id;

        if ($dir == "up") {
            $item = Item::where("order_id", ">", $order)->orderBy("order_id", "ASC")->first();
        } else if ($dir == "down") {
            $item = Item::where("order_id", "<", $order)->orderBy("order_id", "DESC")->first();
        }

        if ($item) {
            $row->order_id = $item->order_id;
            $item->order_id = $rowOrderId;
            $row->save();
            $item->save();
        }
        return redirect()->route("index");
    }

    public function delete(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->forceDelete();
        return redirect()->route("index");
    }
}
