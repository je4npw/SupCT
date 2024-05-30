<?php

namespace Tests\Unit;

use App\Http\Livewire\Usuario;
use App\Models\State;
use App\Models\City;
use Livewire\Livewire;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioComponentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_updates_state_and_city_based_on_cep()
    {

        $state = State::create(['name' => 'São Paulo', 'uf' => 'SP']);
        $city = City::create(['name' => 'São Paulo', 'state_id' => $state->id]);


        \Mockery::mock('alias:Gabrielmoura\LaravelCep\Cep')
            ->shouldReceive('find')
            ->with('01001-000')
            ->andReturn((object)[
                'logradouro' => 'Praça da Sé',
                'bairro' => 'Sé',
                'localidade' => 'São Paulo',
                'uf' => 'SP'
            ]);


        Livewire::test(Usuario::class)
            ->set('cep', '01001-000')
            ->call('updatedCep', '01001-000')
            ->assertSet('address', 'Praça da Sé')
            ->assertSet('neighborhood', 'Sé')
            ->assertSet('uf', $state->id)
            ->assertSet('city', $city->id)
            ->assertSee('São Paulo');
    }
}
