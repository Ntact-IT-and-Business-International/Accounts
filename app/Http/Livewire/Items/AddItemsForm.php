<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;
use Modules\Items\Entities\Item;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddItemsForm extends ModalComponent
{
    public $item_name;

    /**
     * This function validates Item
     */
    protected $rules =[
        'item_name' => 'required | unique:items',
    ];

    public function render()
    {
        return view('livewire.items.add-items-form');
    }
    /**
     * This function creates Item
     */
    public function submit()
    {
        $this->validate();
        //Refresh Items component
        $this->emit('Items.Items', 'refreshComponent');

        Item::addItem($this->item_name);
        //closes modal after adding item
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
