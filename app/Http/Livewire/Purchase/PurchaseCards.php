<?php

namespace App\Http\Livewire\Purchase;

use Livewire\Component;
use Modules\Purchase\Entities\Purchases;

class PurchaseCards extends Component
{
    public function render()
    {
        return view('livewire.purchase.purchase-cards',[
            'total'=>Purchases::totalPurchases(),
            'todays_purchase_total'=>Purchases::todaysPurchaseTotal()
        ]);
    }
}
