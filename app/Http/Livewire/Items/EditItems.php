<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;
use Modules\Items\Entities\Item;

class EditItems extends Component
{
    public $item_id;
    public $item_name;
    /**
     * Validate item
     */
    protected $rules =[
        'item_name' =>'required'
    ];
    
    public function render()
    {
        return view('livewire.items.edit-items');
    }
    /**
     * This function displays item to be edited
     */
    public function mount($item_id)
    {
        $this->fill([
            'item_name' => Item::whereId($this->item_id)->value('item_name'),
        ]);
    }

    /**
     * item edited is validated
     * Then Item information is updated
     */
    public function updateItem()
    {
        $this->validate();
        Item::updateItem($this->item_id, $this->item_name);
        return redirect()->to('/items/items')->with('msg', 'Operation Successful');
    }
}
