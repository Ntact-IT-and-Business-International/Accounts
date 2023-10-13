<?php

namespace App\Http\Livewire\Expenses;

use Livewire\Component;
use Modules\Expenses\Entities\Expense;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Expenses extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Expenses' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'expenses.id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.expenses.expenses',[
            'expenses' =>Expense::getExpenses($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the Expense
     */
    public static function deleteExpenses($expenses_id)
    {
        Expense::whereId($expenses_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
