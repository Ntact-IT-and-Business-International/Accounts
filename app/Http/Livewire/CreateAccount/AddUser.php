<?php

namespace App\Http\Livewire\CreateAccount;

use Livewire\Component;

class AddUser extends Component
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
        'confirm_password' =>'required',
    ];
    public function render()
    {
        return view('livewire.create-account.add-user');
    }
    public function submit(){
        $this->validate();
        user::createAccount($this->name, $this->email,$this->password, $this->current_photo);
        //Refresh Income component
        $this->emit('CreateAccount.Users', 'refreshComponent');
         //closes modal after adding Income
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
