<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;
use Modules\Items\Entities\Item;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Items extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Items' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.items.items',[
            'items' => Item::getItems($this->search, $this->sortBy, $this->sortDirection, $this->perPage),
        ]);
    }

    /**
     * This function deletes the item
     */
    public static function deleteItem($item_id)
    {
        Item::whereId($item_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
