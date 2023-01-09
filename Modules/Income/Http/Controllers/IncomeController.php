<?php

namespace Modules\Income\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('income::index');
    }

    /**
     * This function gets form for editing income
     */
    public function editIncome($income_id){
        if (! request()->hasValidSignature()) {
            abort(401);
        }
        return view('income::edit_income', compact('income_id'));
    }
}
