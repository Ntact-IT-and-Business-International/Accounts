<?php

namespace App\Http\Livewire\Income;

use Livewire\Component;
use Modules\Income\Entities\Income as IncomeReceived;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Income extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Income' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.income.income',[
            'income' =>IncomeReceived::getIncome($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the Income
     */
    public static function deleteIncome($income_id)
    {
        IncomeReceived::whereId($income_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
