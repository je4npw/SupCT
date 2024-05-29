<div>
    @php
        $style = [
            'h2' => "mb-4 text-2xl font-bold text-gray-900 dark:text-amber-500",
            'ul' => "flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0",
            'label' => "block mb-2 text-sm font-medium text-gray-900 dark:text-white",
            'input' => "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500",
            'navs' => "inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:hover:bg-gray-700 dark:hover:text-white",
            'navTitle'=> "mb-4 text-lg font-bold text-gray-900 dark:text-white",
            'content' => "p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full",
            'cancelBtn' => "focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900",
            'submitBtn' => "focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800",
            'cepBtn' => "text-white absolute end-0.5 bottom-0.5 bg-amber-900 hover:bg-amber-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-amber-500 dark:hover:bg-gray-500 dark:focus:ring-amber-800"
        ];
        $icons = ['basic' => 'user-pen', 'document' => 'address-card', 'contact' => 'paper-plane', 'groups_permissions' => 'people-group', 'bank_data' => 'credit-card']
    @endphp
    <section class="bg-white dark:bg-gray-900 p-4 rounded-lg">
        <h2 class="{{ $style['h2'] }}">Editar Usuário {{ $name }}</h2>
        <livewire:layout.avatar :name="$name" :avatar="$avatar"/>

        <form wire:submit.prevent="save">
            <div class="md:flex">
                <ul class="{{ $style['ul'] }}">
                    @foreach($icons as $tab => $icon)
                        <li>
                            <a href="#{{ $activeTab }}" wire:click="switchTab('{{ $tab }}')"
                               class="{{ $style['navs'] }} {{ $activeTab !== $tab ? 'dark:bg-gray-800' : 'dark:bg-amber-500 dark:text-white' }}">
                                <i class="fa-solid fa-{{ $icon }} dark:text-amber-500 {{ $activeTab === $tab ? 'dark:text-white' : '' }} text-2xl mt-1"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="{{ $style['content'] }}">
                    @if($activeTab === 'basic')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-user-pen dark:text-amber-500 mt-1"></i>
                            <h3 class="{{ $style['navTitle'] }}">Informações Pessoais</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div class="md:col-span-3 xl:col-span-2">
                                <label for="name" class="{{ $style['label'] }}">Nome</label>
                                <input type="text"
                                       wire:model="name"
                                       id="name"
                                       class="{{ $style['input'] }}"
                                       placeholder="Digite o nome completo (ex: João da Silva)"
                                       autocomplete="name"
                                >
                            </div>

                            <div class="lg:col-span-1">
                                <label for="birth_date" class="{{ $style['label'] }}">Data de Nascimento</label>
                                <input
                                    type="date"
                                    wire:model="birth_date"
                                    id="birth_date"
                                    class="{{ $style['input'] }}"
                                    placeholder="Selecione a data"
                                >
                            </div>

                            <div>
                                <label for="cep" class="{{ $style['label'] }}">CEP</label>
                                <div class="relative">
                                    <input type="search"
                                           id="cep"
                                           wire:model="cep"
                                           x-mask="99999-999"
                                           class="{{$style['input']}}"
                                           placeholder="Digite o CEP"
                                           required
                                    />
                                    <button type="button"
                                            wire:click="searchCep"
                                            class="{{$style['cepBtn']}}">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="lg:col-span-1">
                                <label for="address" class="{{ $style['label'] }}">Endereço</label>
                                <input
                                    type="text"
                                    wire:model="address"
                                    id="address"
                                    class="{{ $style['input'] }}"
                                    placeholder="Seu endereço"
                                    autocomplete="address"
                                >
                            </div>

                            <div class="lg:col-span-1">
                                <label for="address_number" class="{{ $style['label'] }}">Número</label>
                                <input
                                    type="number"
                                    wire:model="address_number"
                                    id="address_number"
                                    class="{{ $style['input'] }}"
                                    placeholder="333"
                                >
                            </div>

                            <div>
                                <label for="neighborhood" class="{{ $style['label'] }}">Bairro</label>
                                <input
                                    type="text"
                                    wire:model="neighborhood"
                                    id="neighborhood"
                                    class="{{ $style['input'] }}"
                                    placeholder="Seu bairro"
                                >
                            </div>

                            <div>
                                <label for="uf" class="{{ $style['label'] }}">Estado</label>
                                <select
                                    wire:model.change="uf"
                                    id="uf"
                                    class="{{ $style['input'] }}"
                                >
                                    <option>Selecione um estado</option>
                                    @foreach($states as $state)
                                        <option value={{$state['id']}}>{{$state['name']}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label for="city" class="{{ $style['label'] }}">Cidade</label>
                                <select
                                    wire:model="city"
                                    id="city"
                                    class="{{ $style['input'] }}"
                                >
                                    <option value="">Selecione uma cidade</option>
                                    @foreach($cities as $c)
                                        <option value={{$c['id']}}>{{$c['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    @if($activeTab === 'document')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-address-card dark:text-amber-500 mt-1"></i>
                            <h3 class="{{ $style['navTitle'] }}">Documentos</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="cpf" class="{{ $style['label'] }}">CPF</label>
                                <input
                                    type="text"
                                    wire:model="cpf"
                                    id="cpf"
                                    class="{{ $style['input'] }}"
                                    placeholder="000.000.000-00"
                                    x-mask:dynamic="'999.999.999-99'"
                                />
                            </div>

                            <div>
                                <label for="rg" class="{{ $style['label'] }}">Identidade</label>
                                <input
                                    type="text"
                                    wire:model="rg"
                                    id="rg"
                                    class="{{ $style['input'] }}"
                                    placeholder="00000000-0 SSP SP"
                                />
                            </div>

                            <div>
                                <label for="council_registry" class="{{ $style['label'] }}">Registro do Conselho</label>
                                <input
                                    type="text"
                                    wire:model="council_registry"
                                    id="council_registry"
                                    class="{{ $style['input'] }}"
                                    placeholder="00000000-0"
                                />
                            </div>

                        </div>
                    @endif
                    @if($activeTab === 'contact')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-paper-plane dark:text-amber-500 mt-1"></i>
                            <h3 class="{{ $style['navTitle'] }}">Informações de Contato</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="email" class="{{ $style['label'] }}">E-mail</label>
                                <input
                                    type="email"
                                    wire:model="email"
                                    id="email"
                                    class="{{ $style['input'] }}"
                                    placeholder="exemplo@teste.com"
                                >
                            </div>

                            <div>
                                <label for="main_phone" class="{{ $style['label'] }}">Telefone/Celular Principal</label>
                                <input
                                    type="text"
                                    wire:model="main_phone"
                                    id="main_phone"
                                    class="{{ $style['input'] }}"
                                    x-mask:dynamic="$input.length < 15 ? '(99) 9999-9999' : '(99) 99999-9999'"
                                    placeholder="(00) 0000-0000"
                                    required
                                />
                            </div>

                            <div>
                                <label for="other_phone" class="{{ $style['label'] }}">Telefone/Celular de
                                    Contato</label>
                                <input
                                    type="text"
                                    wire:model="other_phone"
                                    id="other_phone"
                                    class="{{ $style['input'] }}"
                                    x-mask:dynamic="$input.length < 15 ? '(99) 9999-9999' : '(99) 99999-9999'"
                                    placeholder="(00) 0000-0000"
                                    required
                                />
                            </div>
                        </div>
                    @endif
                    @if($activeTab === 'groups_permissions')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-people-group dark:text-amber-500 mt-1"></i>
                            <h3 class="{{ $style['navTitle'] }}">Grupos e Permissões</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="user_type" class="{{ $style['label'] }}">Tipo de Usuário</label>
                                <select
                                    wire:model="user_type"
                                    id="user_type"
                                    class="{{ $style['input'] }}"
                                >
                                    <option>Selecione um tipo</option>
                                    <option value="VOL">Voluntário</option>
                                    <option value="CLT">Funcionário CLT</option>
                                    <option value="CDR">Captador de Recursos</option>
                                    <option value="EST">Estagiário</option>
                                    <option value="AUT">Autônomo</option>
                                </select>
                            </div>

                            <div>
                                <label for="cargo" class="{{ $style['label'] }}">Cargo</label>
                                <select wire:model="cargo" id="cargo" class="{{ $style['input'] }}">
                                    <option>Selecione um tipo</option>
                                    <option value="MON">Monitor</option>
                                </select>
                            </div>

                            <div>
                                <label for="permission_group" class="{{ $style['label'] }}">Grupo de Permissões</label>
                                <select
                                    wire:model="permission_group"
                                    id="permission_group"
                                    class="{{ $style['input'] }}">
                                    <option>Selecione um grupo</option>
                                    <option value="ADM">Admin</option>
                                </select>
                            </div>

                        </div>
                    @endif
                    @if($activeTab === 'bank_data')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-address-card dark:text-amber-500 mt-1"></i>
                            <h3 class="{{ $style['navTitle'] }}">Dados Bancários</h3>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="bank" class="{{ $style['label'] }}">Banco</label>
                                <input
                                    type="text"
                                    wire:model="bank"
                                    id="bank"
                                    class="{{ $style['input'] }}"
                                    placeholder="Seu Grande Banco"
                                />
                            </div>

                            <div>
                                <label for="bank_agency" class="{{ $style['label'] }}">Agência</label>
                                <input
                                    type="text"
                                    wire:model="bank_agency"
                                    id="bank_agency"
                                    class="{{ $style['input'] }}"
                                    placeholder="0000-0"
                                />
                            </div>

                            <div>
                                <label for="bank_account" class="{{ $style['label'] }}">Conta</label>
                                <input
                                    type="text"
                                    wire:model="bank_account"
                                    id="bank_account"
                                    class="{{ $style['input'] }}"
                                    placeholder="00000-0"
                                />
                            </div>

                        </div>
                    @endif
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <button
                    type="button"
                    wire:click="cancel"
                    class="{{ $style['cancelBtn'] }}"
                >
                    Cancelar
                </button>
                <button
                    type="submit"
                    wire:click="save"
                    class="{{ $style['submitBtn'] }}"
                >
                    Salvar
                </button>
            </div>
        </form>
    </section>
</div>
