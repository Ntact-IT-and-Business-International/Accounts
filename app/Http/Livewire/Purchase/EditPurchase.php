<?php

namespace App\Http\Livewire\Purchase;

use Livewire\Component;
use Modules\Purchase\Entities\Purchases;
use Session;

class EditPurchase extends Component
{
    public $purchase_id;
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
        return view('livewire.purchase.edit-purchase');
    }
    /**
     * This function displays Purchase Information to be edited
     */
    public function mount($purchase_id)
    {
        $this->fill([
            'name_of_item' => Purchases::whereId($this->purchase_id)->value('name_of_item'),
            'quantity' => Purchases::whereId($this->purchase_id)->value('quantity'),
            'unit_price' => Purchases::whereId($this->purchase_id)->value('unit_price'),
        ]);
    }

    /**
     * Purchase edited is validated
     * Then Purchase information is updated
     */
    public function updatePurchase()
    {
        $this->validate();
        Purchases::updatePurchase($this->purchase_id, $this->name_of_item,$this->quantity,$this->unit_price,);
        return redirect()->to('/purchase/purchases')->with('msg', 'Operation Successful');
    }
}
