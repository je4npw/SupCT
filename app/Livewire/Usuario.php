<?php

namespace App\Livewire;

use App\Http\Controllers\UserController as UC;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Usuario extends Component
{
    use WithFileUploads;

    public string $labelStyle="block mb-2 text-sm font-medium text-gray-900 dark:text-white";
    public string $inputStyle="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500";
    public string $saveButton="";
    public string $cancelButton="";

    #[Validate('image|max:1024')]
    public $photo;

    public $toast = false;
    public function save()
    {

    }

    public function saveAvatar() :string
    {
        $ext = $this->photo->getClientOriginalExtension();

        $filename = strtolower( str_replace(" ", "_", Auth::user()->name) ) . '.' . $ext;

        DB::table('users')->where('id', Auth::user()->id)->update(['avatar' => $filename]);

        $this->photo->storePubliclyAs(path: 'avatars', name: $filename);

        return $this->toast = true;
    }
    public function render()
    {
        $user = new UC();

        $userId = Auth::user()->id;

        $arr = $user->getById($userId);

        return view('livewire.usuario')->with([
            'id' => $arr->id,
            'name' => $arr->name,
            'email' => $arr->email,
            'avatar' => $arr->avatar,
            'birth_date' => $arr->birth_date,
            'address' => $arr->address,
            'address_number' => $arr->address_number,
            'neighborhood' => $arr->neighborhood,
            'cep' => $arr->cep,
            'cpf' => $arr->cpf,
        ]);
    }
}
