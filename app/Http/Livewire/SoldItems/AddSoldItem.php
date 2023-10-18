<?php

namespace App\Http\Livewire\SoldItems;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use LivewireUI\Modal\ModalComponent;
use Modules\Items\Entities\Item;
use Modules\SoldItems\Entities\SoldItem;

class AddSoldItem extends ModalComponent
{
    public $itemId;
    public $sellingPrice;
    public $dateOfSelling;
    public $quantity;

    protected $rules = [
        'itemId' => 'required|exists:purchases,item_id',
        'sellingPrice' => 'required',
        'dateOfSelling' => 'required',
        'quantity' => 'required'
    ];

    protected $messages = [
        'itemId.required' => 'Please Select an Item from the list',
        'itemId.exists' => 'The selected is not registered under purchased items, consider registering it',
        'sellingPrice.required' => 'Please enter the amount this item has been sold.',
        'dateOfSelling.required' => 'The Date of Selling field is required.',
        'quantity.required' => 'Quantity sold out is required.',
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.sold-items.add-sold-item',[
            'items' => Item::selectItem()
        ]);
    }

    public function submit(){
        $this->validate();
        SoldItem::createSoldItem($this->itemId, $this->sellingPrice,$this->dateOfSelling, $this->quantity);
        $this->emit('Sold-Item.Sold-Item','refreshComponent');
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
