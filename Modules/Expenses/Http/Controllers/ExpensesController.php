<?php

namespace Modules\Expenses\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('expenses::index');
    }

    /**
     * This function gets form for editing expenses
     */
    public function editExpenses($expenses_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('expenses::edit_expenses',compact('expenses_id'));
    }
}
