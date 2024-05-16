<?php

namespace App\Livewire\Form;

use App\Http\Controllers\UserController as UC;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class User extends Component
{

    public string $labelStyle="block mb-2 text-sm font-medium text-gray-900 dark:text-white";
    public string $inputStyle="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
    public string $saveButton="";
    public string $cancelButton="";
    public function save()
    {

    }
    public function render()
    {
        $user = new UC();

        $userId = Auth::user()->id;

        $arr = $user->getById($userId);

        return view('livewire.form.user')->with([
            'id' => $arr->id,
            'name' => $arr->name,
            'email' => $arr->email,
            'avatar' => $arr->avatar
        ]);
    }
}
