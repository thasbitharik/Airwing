<?php

namespace App\Http\Controllers;
use App\Models\Item;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function saveData(Request $request)
    {
        $item = new Item();
        $item->name = $request->name;
        $item->size = $request->size;
        $item->quantity = $request->quantity;
        $item->type = $request->type;
        $item->save();

    }
}
