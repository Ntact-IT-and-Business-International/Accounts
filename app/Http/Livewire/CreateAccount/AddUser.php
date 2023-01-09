<?php

namespace App\Http\Livewire\CreateAccount;

use Livewire\Component;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddUser extends ModalComponent
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    /**
     * Validate income
     */
    protected $rules=[
        'name' =>'required',
        'email' =>'required|unique:users',
        'password' =>'required',
        'confirm_password' => 'required|same:password',
    ];
    public function render()
    {
        return view('livewire.create-account.add-user');
    }
    public function submit(){
        $this->validate();
        User::createAccount($this->name, $this->email, $this->password);
        //Refresh Income component
        $this->emit('CreateAccount.Users', 'refreshComponent');
         //closes modal after adding Income
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
