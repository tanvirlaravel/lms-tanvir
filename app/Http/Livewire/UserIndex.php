<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserIndex extends Component
{
    public $users;
    public function render()
    {
        return view('livewire.user-index');
    }
}
