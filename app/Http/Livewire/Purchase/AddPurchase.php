<?php

namespace App\Http\Livewire\Purchase;

use Livewire\Component;
use Modules\Purchase\Entities\Purchases;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddPurchase extends ModalComponent
{
    public $name_of_item;
    public $quantity;
    public $unit_price;
    /**
     * Validate income
     */
    protected $rules=[
        'name_of_item' =>'required',
        'quantity' =>'required',
        'unit_price' =>'required',
    ];

    public function render()
    {
        return view('livewire.purchase.add-purchase');
    }

    /**
     *validate income
     *create purchase and then close the modal
     */
    public function submit(){
        //validate income
        $this->validate();
        Purchases::addPurchase($this->name_of_item,$this->quantity,$this->unit_price);
        //Refresh Purchase component
        $this->emit('Purchase.Purchase', 'refreshComponent');
         //closes modal after adding Income
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
