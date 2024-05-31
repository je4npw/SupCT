<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\State;
use App\Models\User;
use Exception;
use Gabrielmoura\LaravelCep\Cep;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Component;

class Usuario extends Component
{
    public $activeTab = 'basic';
    // form properties
    public $avatar,
        $name,
        $birth_date,
        $cpf,
        $council_registry,
        $rg,
        $email,
        $main_phone,
        $other_phone,
        $user_type,
        $bank,
        $bank_agency,
        $bank_account;
    public $addressId,
        $address,
        $address_number,
        $cep,
        $neighborhood,
        $city,
        $uf,
        $city_name,
        $state_name;
    public $states = [];
    public $cities = [];

    public function save()
    {
        $user = [
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'council_registry' => $this->council_registry,
            'email' => $this->email,
            'main_phone' => $this->main_phone,
            'other_phone' => $this->other_phone,
            'user_type' => $this->user_type,
            'bank' => $this->bank,
            'bank_agency' => $this->bank_agency,
            'bank_account' => $this->bank_account
        ];
        $address = [
            'address' => $this->address,
            'address_number' => $this->address_number,
            'neighborhood' => $this->neighborhood,
            'city' => $this->city,
        ];


    }

    public function mount($userId)
    {
        try {
            $user = User::findOrFail($userId);

            $this->addressId = $user->address()->first();

            $this->states = State::all();
            $this->cities = $this->uf ? City::where('state_id', $this->uf)->get() : [];

            $this->fill([
                'avatar' => $user->avatar,
                'name' => $user->name,
                'birth_date' => $user->birth_date,
                'address' => $this->addressId ? $this->addressId->address : '',
                'address_number' => $this->addressId ? $this->addressId->address_number : '',
                'neighborhood' => $this->addressId ? $this->addressId->neighborhood : '',
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
            session()->flash('error', 'Usuário não encontrado');
            toast()->warning('Usuário não encontrado', 'Atenção')->push();
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao buscar os dados do usuário');
            toast()->debug('Erro ao buscar usuário')->push();
        }
    }

    public function updatedCity($value)
    {
        try {
            $res = City::findOrFail($value);
            $this->city = $res->id;
            $this->city_name = $res->name;
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Cidade não encontrada');
            toast()->warning('Cidade não encontrada', 'Atenção')->push();
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao buscar a cidade');
            toast()->debug('Erro ao buscar cidade')->push();
        }
    }

    public function updatedUf($value)
    {
        try {
            $this->cities = City::where('state_id', $value)->get();
            $this->city = '';
            $this->city_name = '';
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Estado não encontrado');
            toast()->warning('Estado não encontrado', 'Atenção')->push();
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao buscar estados');
            toast()->debug('Erro ao buscar estados')->push();
        }
    }

    public function updatedCep($value)
    {
        try {
            $cep = Cep::find($value);

            if (is_object($cep)) {
                $state = State::where('uf', $cep->uf)->first();

                $city = City::where('name', $cep->localidade)->first();

                if ($state && $city) {
                    $this->states = State::whereUf($cep->uf)->get();

                    $this->cities = City::where('state_id', $state->id)
                        ->where('name', $cep->localidade)
                        ->get();

                    $this->fill([
                        'address' => $cep->logradouro,
                        'neighborhood' => $cep->bairro,
                        'uf' => $state->id,
                        'city' => $city->id,

                    ]);
                } else {
                    session()->flash('error', 'Estado ou cidade não encontrados');
                }
            }
        } catch (Exception $e) {
            session()->flash('error', 'Ocorreu um erro ao buscar dados do CEP informado');
        }
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
