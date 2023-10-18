<?php

namespace App\Http\Livewire\Purchase;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Items\Entities\Item;
use Modules\Purchase\Entities\Purchases;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddPurchase extends ModalComponent
{
    public $itemId;
    public $quantity;
    public $unit_price;
    public $date_of_purchase;
    /**
     * Validate income
     */
    protected $rules=[
        'itemId' =>'required',
        'quantity' =>'required',
        'unit_price' =>'required',
        'date_of_purchase' =>'required'
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.purchase.add-purchase',[
            'items' => Item::selectItem()
        ]);
    }

    /**
     *validate income
     *create purchase and then close the modal
     */
    public function submit(){
        //validate income
        $this->validate();
        Purchases::addPurchase($this->itemId,$this->quantity,$this->unit_price,$this->date_of_purchase);
        //Refresh Purchase component
        $this->emit('Purchase.Purchase', 'refreshComponent');
         //closes modal after adding Income
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
