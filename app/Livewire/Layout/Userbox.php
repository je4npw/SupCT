<?php

namespace App\Livewire\Layout;

use App\Http\Controllers\UserController as UC;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Userbox extends Component
{
    public $avatar;
    public function render()
    {
        $user = new UC();

        $userId = Auth::user()->id;

        $this->avatar = $user->getById($userId)->avatar;

        return view('livewire.layout.userbox')->with(['avatar' => $this->avatar]);
    }
}
