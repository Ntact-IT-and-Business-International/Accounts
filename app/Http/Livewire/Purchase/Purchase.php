<?php

namespace App\Http\Livewire\Purchase;

use Livewire\Component;
use Modules\Purchase\Entities\Purchases;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Purchase extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Purchase' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.purchase.purchase',[
            'purchases'=>Purchases::getPurchase($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the Purchase
     */
    public static function deletePurchase($purchase_id)
    {
        Purchases::whereId($purchase_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
