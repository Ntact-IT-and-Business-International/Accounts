<?php

namespace App\Http\Livewire\Expenses;

use Livewire\Component;
use Modules\Expenses\Entities\Expense;
use Sessions;

class EditExpenses extends Component
{
    public $item_id;
    public $expense_amount;
    public $name_of_person_or_company;
    public $date;
    public $expenses_id;
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
        return view('livewire.expenses.edit-expenses');
    }
    /**
     * This function displays Expenses Information to be edited
     */
    public function mount($expenses_id)
    {
        $this->fill([
            'item_id' => Expense::whereId($this->expenses_id)->value('item_id'),
            'expense_amount' => Expense::whereId($this->expenses_id)->value('expense_amount'),
            'name_of_person_or_company' => Expense::whereId($this->expenses_id)->value('name_of_person_or_company'),
            'date' => Expense::whereId($this->expenses_id)->value('date'),
        ]);
    }
    /**
     * This function updates expenses 
     */
    public function updateExpenses(){
        $this->validate();
        Expense::updateExpense($this->expenses_id,$this->item_id,$this->expense_amount,$this->name_of_person_or_company,$this->date);
        return redirect()->to('expenses/expenses')->with('msg', 'Operation Successful');
    }
}
