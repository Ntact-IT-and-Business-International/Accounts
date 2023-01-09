<?php

namespace App\Http\Livewire\Expenses;
use Modules\Expenses\Entities\Expense;

use Livewire\Component;

class ExpensesCards extends Component
{
    public function render()
    {
        return view('livewire.expenses.expenses-cards',[
            'total' =>Expense::totalExpenses(),
            'todays_total'=>Expense::todaysTotal()
        ]);
    }
}
