<?php

namespace App\Http\Livewire\CreateAccount;

use Livewire\Component;
use App\Models\User;
use App\Models\UserType;
use LivewireUI\Modal\ModalComponent;
use Session;

class AddUser extends ModalComponent
{
    public $name;
    public $email;
    public $user_type;
    public $password;
    public $confirm_password;
    /**
     * Validate income
     */
    protected $rules=[
        'name' =>'required',
        'email' =>'required|unique:users',
        'user_type'=>'required',
        'password' =>'required',
        'confirm_password' => 'required|same:password',
    ];
    public function render()
    {
        return view('livewire.create-account.add-user',[
            'user_types'=>UserType::getUserType()
        ]);
    }
    public function submit(){
        $this->validate();
        User::createAccount($this->name, $this->email, $this->user_type,$this->password);
        //Refresh Income component
        $this->emit('CreateAccount.Users', 'refreshComponent');
         //closes modal after adding Income
        $this->closeModal();
        Session::flash('msg', 'Operation Successful');
    }
}
