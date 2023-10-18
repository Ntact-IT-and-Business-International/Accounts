<?php

namespace App\Http\Livewire\SoldItems;

use App\Traits\WithSorting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\SoldItems\Entities\SoldItem;

class GetSoldItems extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['SoldItems' => '$refresh'];

    //over ridding sort by from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render(): Factory|View|Application
    {
        return view('livewire.sold-items.get-sold-items',[
            'sold_items' => SoldItem::getSoldItems($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
}
