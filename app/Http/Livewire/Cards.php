<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Expenses\Entities\Expense;
use Modules\Income\Entities\Income;

class Cards extends Component
{
    public function render()
    {
        return view('livewire.cards',[
            'total_income' =>Income::totalIncome(),
            'total_expenses' =>Expense::totalExpenses(),
            'monthly_expenses' =>Expense::monthlyTotalExpenses()
        ]);
    }
}
