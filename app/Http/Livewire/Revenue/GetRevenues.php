<?php

namespace App\Http\Livewire\Revenue;

use App\Traits\WithSorting;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Revenue\Entities\Revenue;

class GetRevenues extends Component
{
    use WithPagination, WithSorting;

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render(): Factory|View|Application
    {
        return view('livewire.revenue.get-revenues',[
            'revenues' => Revenue::getRevenues($this->perPage)
        ]);
    }
}
