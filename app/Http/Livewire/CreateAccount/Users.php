<?php

namespace App\Http\Livewire\CreateAccount;

use Livewire\Component;
use App\Models\User;
use App\Traits\WithSorting;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination, WithSorting;

    protected $listeners = ['Users' => '$refresh'];

    //over ridding sortby from the trait
    public $sortBy = 'id';

    //using the bootstrap pagination theme
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.create-account.users',[
            'users' =>User::getUser($this->search, $this->sortBy, $this->sortDirection, $this->perPage)
        ]);
    }
    /**
     * This function deletes the User
     */
    public static function deleteUser($user_id)
    {
        User::whereId($user_id)->delete();
        session()->flash('success', 'Operation Successful');
    }
}
