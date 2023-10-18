<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Expenses\Entities\Expense;
use Modules\Income\Entities\Income;
use Modules\Purchase\Entities\Purchases;
use Modules\Revenue\Entities\Revenue;
use Modules\SoldItems\Entities\SoldItem;

class Cards extends Component
{
    public function render(): Factory|View|Application
    {
        return view('livewire.cards',[
            'total_income' =>Income::totalIncome(),
            'total_expenditure' =>Expense::totalExpenses(),
            'monthly_expenditure' =>Expense::monthlyTotalExpenses(),
            'monthly_revenue' =>SoldItem::getMonthlyRevenue(),
            'generated_revenue' =>SoldItem::calculateTotalRevenueGenerated(),
            'monthly_purchases' =>Purchases::monthlyPurchases(),
            'profits_made' =>SoldItem::calculateProfits(),
            'monthly_profits_made' =>SoldItem::calculateMonthlyProfits(),
        ]);
    }
}
