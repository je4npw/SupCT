<?php

namespace App\Livewire\Layout;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Avatar extends Component
{
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $photo;

    public $avatar;

    public $name;

    public function saveAvatar()
    {
        try {

            $ext = $this->photo->getClientOriginalExtension();

            $filename = Str::uuid()  . '.' . $ext;


            if (DB::table('users')->where('id', Auth::user()->id)->update(['avatar' => $filename])) {

                $this->photo->storePubliclyAs('avatars', $filename);

            }

            $this->dispatch('showAlert', 'success', 'Avatar de usuário alterado com sucesso!', true, '500');

        } catch (\Exception $e) {

            $this->dispatch('showAlert', 'danger', 'Houve um erro! Avatar de usuário não foi alterado...', true, 500);

        }

    }

    public function render()
    {
        return view('livewire.layout.avatar');
    }
}
