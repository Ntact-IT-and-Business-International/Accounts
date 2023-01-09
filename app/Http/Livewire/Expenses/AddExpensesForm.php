<?php

namespace App\Http\Livewire\Expenses;

use Livewire\Component;
use Modules\Expenses\Entities\Expense;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddExpensesForm extends ModalComponent
{
    public $item_id;
    public $expense_amount;
    public $name_of_person_or_company;
    public $date;
    /**
     * validate Expenses
     */
    protected $rules =[
        'item_id' =>'required',
        'expense_amount' =>'required',
        'name_of_person_or_company' =>'required',
        'date' =>'required',
    ];

    public function render()
    {
        return view('livewire.expenses.add-expenses-form');
    }
    /**
     * Validate the expenses
     * create expenses
     * refresh the commponent
     * and close the modal
     */
    public function submit(){
        $this->validate();
        Expense::addExpenses($this->item_id,$this->expense_amount,$this->name_of_person_or_company,$this->date);
        $this->emit('Expenses.Expenses','refreshComponent');
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
