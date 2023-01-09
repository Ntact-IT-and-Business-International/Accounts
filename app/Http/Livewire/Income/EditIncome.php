<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use Modules\Income\Entities\Income;
use Session;

class EditIncome extends Component
{
    public $amount;
    public $source_of_income;
    public $income_id;
    /**
     * Validate income
     */
    protected $rules=[
        'amount' =>'required',
        'source_of_income' =>'required',
    ];

    public function render()
    {
        return view('livewire.income.edit-income');
    }

    /**
     * This function displays Income Information to be edited
     */
    public function mount($income_id)
    {
        $this->fill([
            'amount' => Income::whereId($this->income_id)->value('amount'),
            'source_of_income' => Income::whereId($this->income_id)->value('source_of_income'),
        ]);
    }

    /**
     * Income edited is validated
     * Then Income information is updated
     */
    public function updateIncome()
    {
        $this->validate();
        Income::updateIncome($this->income_id, $this->amount,$this->source_of_income);
        return redirect()->to('/income/income')->with('msg', 'Operation Successful');
    }
}
