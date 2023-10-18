<?php

namespace App\Http\Livewire\Revenue;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use LivewireUI\Modal\ModalComponent;
use Modules\Revenue\Entities\Revenue;

class Create extends ModalComponent
{
    public $amount;
    public $dateOfRevenue;

    public $sourceOfFunds = "Business";

    protected $rules = [
        'amount' => 'required',
        'dateOfRevenue' => 'required',
        'sourceOfFunds' => 'required',
    ];

    public function render(): Factory|View|Application
    {
        return view('livewire.revenue.create');
    }

    public function submit()
    {
        $this->validate();
        //Refresh Items component
        $this->emit('Revenue.GetRevenues', 'refreshComponent');
        Revenue::createRevenue($this->amount, $this->dateOfRevenue, $this->sourceOfFunds);
        //closes modal after adding item
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
