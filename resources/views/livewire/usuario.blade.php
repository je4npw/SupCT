<div>
    <section class="bg-white dark:bg-gray-900 p-4 rounded-lg">
        <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-amber-500">Editar Usuário {{$name}}</h2>
        <livewire:layout.alert/>
        <livewire:layout.avatar name="{{$name}}" avatar="{{$avatar}}"/>

        <form wire:submit.prevent="save">
            <div class="md:flex">
                <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
                    <li>
                        <a href="#{{$activeTab}}" wire:click="switchTab('basic')"
                           class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white {{ $activeTab === 'basic' ? ' dark:bg-amber-500 dark:text-white' : '' }}">
                            <i class="fa-solid fa-user-pen dark:text-amber-500 {{$activeTab === 'basic' ? ' dark:text-white' : '' }} text-2xl mt-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#{{$activeTab}}" wire:click="switchTab('document')"
                           class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white {{ $activeTab === 'document' ? ' dark:bg-amber-500 dark:text-white' : '' }}">
                            <i class="fa-solid fa-address-card dark:text-amber-500 {{$activeTab === 'document' ? ' dark:text-white' : '' }} text-2xl mt-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#{{$activeTab}}" wire:click="switchTab('contact')"
                           class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white {{ $activeTab === 'contact' ? ' dark:bg-amber-500 dark:text-white' : '' }}">
                            <i class="fa-solid fa-paper-plane dark:text-amber-500 {{$activeTab === 'contact' ? ' dark:text-white' : '' }} text-2xl mt-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#{{$activeTab}}" wire:click="switchTab('groups_permissions')"
                           class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white {{ $activeTab === 'groups_permissions' ? ' dark:bg-amber-500 dark:text-white' : '' }}">
                            <i class="fa-solid fa-people-group dark:text-amber-500 {{$activeTab === 'groups_permissions' ? ' dark:text-white' : '' }} text-2xl mt-1"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#{{$activeTab}}" wire:click="switchTab('bank_data')"
                           class="inline-flex items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-gray-50 hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white {{ $activeTab === 'bank_data' ? ' dark:bg-amber-500 dark:text-white' : '' }}">
                            <i class="fa-solid fa-credit-card dark:text-amber-500 {{$activeTab === 'bank_data' ? ' dark:text-white' : '' }} text-2xl mt-1"></i>
                        </a>
                    </li>
                </ul>
                <div
                    class="p-6 bg-gray-50 text-medium text-gray-500 dark:text-gray-400 dark:bg-gray-800 rounded-lg w-full">
                    @if($activeTab === 'basic')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-user-pen dark:text-amber-500 mt-1"></i>
                            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white">Informações Pessoais</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div class="md:col-span-3 xl:col-span-2">
                                <label for="name" class="{{$labelStyle}}">Nome</label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       value="{{$name}}"
                                       class="{{$inputStyle}}"
                                       placeholder="Digite o nome completo (ex: João da Silva)"
                                >
                            </div>

                            <div class="lg:col-span-1">
                                <label for="birth_date" class="{{$labelStyle}}">Data de Nascimento</label>
                                <input
                                    type="date"
                                    id="birth_date"
                                    value="{{$birth_date}}"
                                    class="{{$inputStyle}}"
                                    placeholder="Selecione a data"
                                >
                            </div>

                            <div class="lg:col-span-1">
                                <label for="address" class="{{$labelStyle}}">Endereço</label>
                                <input
                                    type="text"
                                    name="address"
                                    id="address"
                                    value="{{$address}}"
                                    class="{{$inputStyle}}"
                                    placeholder="Rua Fulano de Tal"
                                >
                            </div>

                            <div class="lg:col-span-1">
                                <label for="address_number" class="{{$labelStyle}}">Número</label>
                                <input
                                    type="number"
                                    name="address_number"
                                    id="address_number"
                                    value="{{$address_number}}"
                                    class="{{$inputStyle}}"
                                    placeholder="333"
                                >
                            </div>

                            <div>
                                <label for="cep" class="{{$labelStyle}}">CEP</label>
                                <input
                                    type="text"
                                    id="cep"
                                    value="{{$cep}}"
                                    class="{{$inputStyle}}"
                                    placeholder="12345-987"
                                    input x-mask:dynamic="'99999-999'"
                                />
                            </div>

                            <div>
                                <label for="neighborhood" class="{{$labelStyle}}">Bairro</label>
                                <input
                                    type="text"
                                    name="neighborhood"
                                    id="neighborhood"
                                    value="{{$neighborhood}}"
                                    class="{{$inputStyle}}"
                                    placeholder="Vila Blablá"
                                >
                            </div>

                            <div>
                                <label for="city" class="{{$labelStyle}}">Cidade</label>
                                <input
                                    type="text"
                                    name="city"
                                    id="city"
                                    class="{{$inputStyle}}"
                                    placeholder="Joinville"
                                />
                            </div>

                            <div>
                                <label for="uf" class="{{$labelStyle}}">Estado</label>
                                <input
                                    type="text"
                                    name="uf"
                                    id="uf"
                                    class="{{$inputStyle}}"
                                    placeholder="Santa Catarina"
                                />
                            </div>

                        </div>
                    @endif
                    @if($activeTab === 'document')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-address-card dark:text-amber-500 mt-1"></i>
                            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white">Documentos</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="cpf" class="{{$labelStyle}}">CPF</label>
                                <input
                                    type="text"
                                    name="cpf"
                                    id="cpf"
                                    value="{{$cpf}}"
                                    class="{{$inputStyle}}"
                                    placeholder="000.000.000-00"
                                    x-mask:dynamic="'999.999.999-99'"
                                />
                            </div>

                            <div>
                                <label for="rg" class="{{$labelStyle}}">Identidade</label>
                                <input
                                    type="text"
                                    name="rg"
                                    id="rg"
                                    value="{{$rg}}"
                                    class="{{$inputStyle}}"
                                    placeholder="00000000-0 SSP SP"
                                />
                            </div>

                            <div>
                                <label for="council_registry" class="{{$labelStyle}}">Registro do Conselho</label>
                                <input
                                    type="text"
                                    name="council_registry"
                                    id="council_registry"
                                    class="{{$inputStyle}}"
                                    placeholder="00000000-0"
                                />
                            </div>

                        </div>
                    @endif
                    @if($activeTab === 'contact')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-paper-plane dark:text-amber-500 mt-1"></i>
                            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white">Informações de Contato</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="email" class="{{$labelStyle}}">E-mail</label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    value="{{$email}}"
                                    class="{{$inputStyle}}"
                                    placeholder="exemplo@teste.com"
                                >
                            </div>

                            <div>
                                <label for="main_phone" class="{{$labelStyle}}">Telefone/Celular Principal</label>
                                <input
                                    type="text"
                                    id="main_phone"
                                    name="main_phone"
                                    aria-describedby="helper-text-explanation"
                                    class="{{$inputStyle}}"
                                    x-mask:dynamic="$input.length < 15 ? '(99) 9999-9999' : '(99) 99999-9999'"
                                    placeholder="(00) 0000-0000"
                                    required
                                />
                            </div>

                            <div>
                                <label for="other_phone" class="{{$labelStyle}}">Telefone/Celular de Contato</label>
                                <input
                                    type="text"
                                    id="other_phone"
                                    name="other_phone"
                                    aria-describedby="helper-text-explanation"
                                    class="{{$inputStyle}}"
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
                            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white">Grupos e Permissões</h3>
                        </div>
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="user_type" class="{{$labelStyle}}">Tipo de Usuário</label>
                                <select
                                    id="user_type"
                                    name="user_type"
                                    class="{{$inputStyle}}"
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
                                <label for="cargo" class="{{$labelStyle}}">Cargo</label>
                                <select id="cargo" class="{{$inputStyle}}">
                                    <option>Selecione um tipo</option>
                                    <option value="MON">Monitor</option>
                                </select>
                            </div>

                            <div>
                                <label for="permission-group" class="{{$labelStyle}}">Grupo de Permissões</label>
                                <select
                                    id="permission-group"
                                    class="{{$inputStyle}}">
                                    <option selected="">Selecione um grupo</option>
                                    <option value="ADM">Admin</option>
                                </select>
                            </div>

                        </div>
                    @endif
                    @if($activeTab === 'bank_data')
                        <div class="flex flex-row gap-2">
                            <i class="fa-solid fa-address-card dark:text-amber-500 mt-1"></i>
                            <h3 class="mb-4 text-lg font-bold text-gray-900 dark:text-white">Dados Bancários</h3>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div>
                                <label for="bank" class="{{$labelStyle}}">Banco</label>
                                <input
                                    type="text"
                                    name="bank"
                                    id="bank"
                                    class="{{$inputStyle}}"
                                    placeholder="Seu Grande Banco"
                                />
                            </div>

                            <div>
                                <label for="bank_agency" class="{{$labelStyle}}">Agência</label>
                                <input
                                    type="text"
                                    name="bank_agency"
                                    id="bank_agency"
                                    class="{{$inputStyle}}"
                                    placeholder="0000-0"
                                />
                            </div>

                            <div>
                                <label for="bank_account" class="{{$labelStyle}}">Conta</label>
                                <input
                                    type="text"
                                    name="bank_account"
                                    id="bank_account"
                                    class="{{$inputStyle}}"
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
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                >
                    Cancelar
                </button>
                <button
                    type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    Salvar
                </button>
            </div>
        </form>
    </section>
</div>
