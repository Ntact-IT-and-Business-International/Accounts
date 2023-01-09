<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use Modules\Income\Entities\Income;

class IncomeCards extends Component
{
    public function render()
    {
        return view('livewire.income.income-cards',[
            'total_income_today' =>Income::todaysTotalIncome(),
            'total_income' =>Income::totalIncome()
        ]);
    }
}
