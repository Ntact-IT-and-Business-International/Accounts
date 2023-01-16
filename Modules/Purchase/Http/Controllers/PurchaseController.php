<?php

namespace Modules\Purchase\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('purchase::index');
    }
    /**
     * This function edits purchase
     */
    public function editPurchase($purchase_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('purchase::edit_purchase',compact('purchase_id'));
    }
}
