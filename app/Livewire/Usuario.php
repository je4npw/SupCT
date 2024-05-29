<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
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
    public $city_name;
    public $state_name;
    public $states = [];
    public $cities = [];


    public function save()
    {

    }

    public function mount($userId)
    {
        try {
            $user = User::findOrFail($userId);

            $userAddress = $user->address()->first();

            $this->states = State::all();

            $this->cities = $this->uf ? City::where('state_id', $this->uf)->get() : [];

            $this->fill([
                'avatar' => $user->avatar,
                'name' => $user->name,
                'birth_date' => $user->birth_date,
                'address' => $userAddress ? $userAddress->address : '',
                'address_number' => $userAddress ? $userAddress->address_number : '',
                'neighborhood' => $userAddress ? $userAddress->neighborhood : '',
                'uf' => $this->uf,
                'city' => $this->city,
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
                'bank_account' => $user->bank_account
            ]);
        } catch (ModelNotFoundException $e) {
            // Lida com o caso em que o usuário não foi encontrado
            session()->flash('error', 'Usuário não encontrado');
            toast()->warning('Usuário não encontrado', 'Atenção')->push();
        } catch (\Exception $e) {
            // Lida com outros tipos de exceções
            session()->flash('error', 'Ocorreu um erro ao buscar os dados do usuário');
            toast()->debug('Erro ao buscar usuário')->push();

        }
    }

    public function updatedUf($value)
    {
        $this->cities = City::where('state_id', $value)->get();
        $this->city = '';
        $this->city_name = '';
    }

    public function searchCep()
    {
//        try {
//
//            if ($this->cep) {
//
//                $cep = Cep::find($this->cep);
//
//                $this->fill([
//                    'address' => $cep->logradouro,
//                    'neighborhood' => $cep->bairro,
//                    'city' => $cep->localidade,
//                    'uf' => $cep->uf,
//                ]);
//
//            }
//
//        } catch (\JsonException $e) {
//
//            toast()->debug($e)->push();
//
//        }

    }

    public function switchTab($tab): void
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        if (!empty($this->uf)){
            $this->cities = City::where('state_id', $this->uf)->get();
        }

        return view('livewire.usuario');

    }
}
