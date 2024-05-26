<?php

namespace App\Livewire;

use App\Models\User;
use Gabrielmoura\LaravelCep\Cep;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Usuario extends Component
{
    public $activeTab = 'basic';

    // form properties
    public $avatar;
    public $name;
    public $birth_date;
    public $address;
    public $address_number;
    public $cep;
    public $neighborhood;
    public $city;
    public $uf;
    public $cpf;
    public $rg;
    public $email;


    public function save()
    {

    }

    public function mount($userId)
    {
        try {
            $user = User::findOrFail($userId);

            $this->fill([
                'avatar' => $user->avatar,
                'name' => $user->name,
                'birth_date' => $user->birth_date,
                'address' => $user->address,
                'address_number' => $user->address_number,
                'cep' => $user->cep,
                'neighborhood' => $user->neighborhood,
                'city' => $user->city,
                'uf' => $user->uf,
                'cpf' => $user->cpf,
                'rg' => $user->rg,
                'council_registry' => $user->council_registry,
                'email' => $user->email,
                'main_phone' => $user->main_phone,
                'other_phone' => $user->other_phone,
                'user_type' => $user->user_type,
                'office_id' => $user->office_id,
                'permission_group_id' => $user->permission_group_id,
                'bank' => $user->bank,
                'bank_agency' => $user->bank_agency,
                'bank_account' => $user->bank_account,
            ]);
        } catch (ModelNotFoundException $e) {
            // Lida com o caso em que o usuário não foi encontrado
            session()->flash('error', 'Usuário não encontrado');
        } catch (\Exception $e) {
            // Lida com outros tipos de exceções
            session()->flash('error', 'Ocorreu um erro ao buscar os dados do usuário');
        }
    }

    public function searchCep()
    {
        $cep = Cep::find($this->cep);

        $this->fill([
            'address' => $cep->logradouro,
            'neighborhood' => $cep->bairro,
            'city' => $cep->localidade,
            'uf' => $cep->uf,
        ]);
    }

    public function switchTab($tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.usuario');

    }
}
