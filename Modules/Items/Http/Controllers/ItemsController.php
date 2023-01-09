<?php

namespace Modules\Items\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('items::index');
    }

    /**
     * This function gets form for editing Item
     */
    public function editItem($item_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('items::edit_item',compact('item_id'));
    }
}
