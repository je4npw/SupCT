<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuario extends Component
{
    public string $labelStyle="block mb-2 text-sm font-medium text-gray-900 dark:text-white";
    public string $inputStyle="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
    public $activeTab = 'basic';

    // form properties
    public $avatar;
    public $name;
    public $birth_date;
    public $address;
    public $address_number;
    public $cep;
    public $neighborhood;
    public $cpf;
    public $rg;
    public $email;


    public function save()
    {

    }

    public function mount($userId)
    {
        $user = User::find($userId);

        $this->avatar = $user->avatar;

        $this->name = $user->name;
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {

        return view('livewire.usuario');

    }
}
