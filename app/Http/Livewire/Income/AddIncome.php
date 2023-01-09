<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use Modules\Income\Entities\Income;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddIncome extends ModalComponent
{
    public $amount;
    public $source_of_income;
    /**
     * Validate income
     */
    protected $rules=[
        'amount' =>'required',
        'source_of_income' =>'required',
    ];

    public function render()
    {
        return view('livewire.income.add-income');
    }
    /**
     *validate income
     *create income and then close the modal
     */
    public function submit(){
        //validate income
        $this->validate();
        Income::addIncome($this->amount,$this->source_of_income);
        //Refresh Income component
        $this->emit('Income.Income', 'refreshComponent');
         //closes modal after adding Income
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
