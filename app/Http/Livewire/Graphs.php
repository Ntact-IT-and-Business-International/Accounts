<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Items\Entities\Item;
use Modules\SoldItems\Entities\SoldItem;

class Graphs extends Component
{
    public function render()
    {
        $items_array = Item::selectItem()->pluck('item_name')->toArray();
        //a graph of products sold per month vs profits
        //products sold per day vs profits
        return view('livewire.graphs',[
            'items_in_stalk' => $items_array
        ]);
    }
}
