<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    public function render()
    {
        return view('livewire.user-create', [
            'roles' => Role::all(),
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'name' => 'required|unique:roles,name',
        'role' => 'required',
    ];

    function formSubmit()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        $user->assignRole($this->role);

        flash()->addSuccess('User Created Successfully');
        return redirect()->route('user.index');
    }
}
