<div>
    <section class="bg-white dark:bg-gray-900 p-6 rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-bold text-gray-900 dark:text-amber-500">Editar Usuário</h2>

        <div class="flex flex-col items-center justify-center mb-6">
            <div class="relative w-48 h-48 mb-4">
                <img class="w-full h-full border-4 ring-4 border-amber-500 rounded-full shadow-lg object-cover"
                     src="{{$avatar}}" alt="Imagem de {{$name}}">
            </div>
            <div>
                <input
                    class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="small_size"
                    type="file"
                >
            </div>
        </div>

        <form wire:submit.prevent="save">
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
                        datepicker
                        datepicker-autohide
                        datepicker-format="dd/mm/yyyy"
                        type="text"
                        id="birth_date"
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
                        class="{{$inputStyle}}"
                        placeholder="333"
                    >
                </div>

                <div>
                    <label for="neighborhood" class="{{$labelStyle}}">Bairro</label>
                    <input
                        type="text"
                        name="neighborhood"
                        id="neighborhood"
                        class="{{$inputStyle}}"
                        placeholder="Vila Blablá"
                    >
                </div>

                <div>
                    <label for="cep" class="{{$labelStyle}}">CEP</label>
                    <input
                        type="text"
                        id="cep"
                        class="{{$inputStyle}}"
                        placeholder="12345-987"
                        input x-mask:dynamic="'99999-999'"
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

            </div>

            <div class="pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
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
            </div>

            <div class="pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
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
            </div>

            <div class="pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
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
            </div>
            <div class="pt-8 mt-8 border-t border-gray-200 dark:border-gray-700">
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

            </div>

            <div class="flex justify-end mt-8">
                <button
                    type="submit"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                >
                    Salvar
                </button>
                <button
                    type="button"
                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                >
                    Cancelar
                </button>
            </div>
        </form>
    </section>

</div>
