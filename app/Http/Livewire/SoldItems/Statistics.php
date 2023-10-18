<?php

namespace App\Http\Livewire\SoldItems;

use Livewire\Component;
use Modules\SoldItems\Entities\SoldItem;

class Statistics extends Component
{
    public function render()
    {
        return view('livewire.sold-items.statistics',[
            'total_revenue_generated' => SoldItem::calculateTotalRevenueGenerated(),
            'total_revenue_generated_today' => SoldItem::calculateTotalRevenueGeneratedToday(),
            'total_generated_profits_today' => SoldItem::calculateTotalProfitsGeneratedToday(),
            'profits_made' =>SoldItem::calculateProfits(),
        ]);
    }
}
