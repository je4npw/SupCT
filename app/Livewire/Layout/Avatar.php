<?php

namespace App\Livewire\Layout;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

class Avatar extends Component
{
    use WithFileUploads;

    use WireToast;

    #[Validate('image|max:1024')]
    public $photo;

    public $avatar;

    public $name;

    public function saveAvatar()
    {
        try {

            $ext = $this->photo->getClientOriginalExtension();

            $filename = Str::uuid() . '.' . $ext;

            if (DB::table('users')->where('id', Auth::user()->id)->update(['avatar' => $filename])) {

                $this->photo->storePubliclyAs('avatars', $filename);

            }

            toast()
                ->success('A imagem de usuário foi alterada.', '🆗 Sucesso:')
                ->push();

        } catch (\Exception $e) {

            toast()
                ->warning('Houve um erro ao alterar a imagem de usuário.', 'Atenção:')
                ->push();

        }

    }

    public function render()
    {
        return view('livewire.layout.avatar');
    }
}
