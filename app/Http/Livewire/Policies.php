<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Policies extends Component
{
    public function render()
    {
        $post = Post::get();// Fetch the post

        if (Gate::allows('view', $post)) {
            // Allow access to view the post
        } else {
            // Deny access
        }
        return view('livewire.policies',compact('post'));
    }
}
