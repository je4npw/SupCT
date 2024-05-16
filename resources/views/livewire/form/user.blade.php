<div>
    <section class="bg-white dark:bg-gray-900">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Editar Usuário</h2>
        <div class="pt-4 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700"/>
        <h3 class="mb-4 text-md font-bold text-gray-900 dark:text-white">Informações Pessoais</h3>
        <form wire:submit="save">
            <div class="pb-8 grid gap-4 md:grid-cols-2 lg:grid-cols-3 sm:gap-6">
                <div class="lg:col-span-2">
                    <label for="name" class="{{$labelStyle}}">Nome</label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{$name}}"
                           class="{{$inputStyle}}"
                           placeholder="Digite o nome completo (ex: João da Silva)"
                    >
                </div>
                <div class="lg:col-span-1 lg:row-span-5 flex flex-col items-center justify-center lg:mx-18 lg:mb-4 mb-5 mx-5 ">
                    <img class="w-full h-full border-4 ring-4 border-gray-800 m-3 rounded-full shadow-lg" src="{{$avatar}}" alt="Imagem de {{$name}}"/>
                    <input class="block w-full text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">

                </div>
                <div class="w-full lg:col-span-1">
                    <label for="category" class="{{$labelStyle}}">Data de Nascimento</label>
                    <div>
                        <input
                            datepicker
                            datepicker-autohide
                            datepicker-format="dd/mm/yyyy"
                            type="text"
                            class="{{$inputStyle}}"
                            placeholder="Selecione a data"
                        >
                    </div>
                </div>

                <div class="w-full lg:col-span-1">
                    <label for="endereco" class="{{$labelStyle}}">Endereço</label>
                    <input
                        type="text"
                        name="endereco"
                        id="endereco"
                        class="{{$inputStyle}}"
                        placeholder="Rua Fulano de Tal"
                    >
                </div>
                <div class="w-full lg:col-span-1">
                    <label for="endereco-numero" class="{{$labelStyle}}">Número</label>
                    <input
                        type="number"
                        name="endereco-numero"
                        id="endereco-numero"
                        class="{{$inputStyle}}"
                        placeholder="333"
                    >
                </div>
                <div class="w-full">
                    <label for="bairro" class="{{$labelStyle}}">Bairro</label>
                    <input
                        type="text"
                        name="bairro"
                        id="bairro"
                        class="{{$inputStyle}}"
                        placeholder="Vila Blablá"
                    >
                </div>
                <div class="w-full">
                    <label for="cep" class="{{$labelStyle}}">CEP</label>
                    <input
                        type="text"
                        id="cep"
                        class="{{$inputStyle}}"
                        placeholder="12345-987"
                        pattern="^\d{5}(-\d{4})?$"
                    />
                </div>
                <div class="w-full">
                    <label for="uf" class="{{$labelStyle}}">Estado</label>
                    <input
                        type="text"
                        name="uf"
                        id="uf"
                        class="{{$inputStyle}}"
                        placeholder="Santa Catarina"
                    />
                </div>
                <div class="w-full">
                    <label for="city" class="{{$labelStyle}}">Cidade</label>
                    <input
                        type="text"
                        name="city"
                        id="city"
                        class="{{$inputStyle}}"
                        placeholder="Joinville"
                    />
                </div>
                <div class="w-full">
                    <label for="brand" class="{{$labelStyle}}">E-mail</label>
                    <input
                        type="email"
                        name="e-mail"
                        id="e-mail"
                        value="{{$email}}"
                        class="{{$inputStyle}}"
                        placeholder="exemplo@teste.com"
                    >
                </div>
            </div>
            <div class="pt-8 mt-4 space-y-2 font-medium border-t border-gray-200 dark:border-gray-700"/>
            <h3 class="mb-4 text-md font-bold text-gray-900 dark:text-white">Informações de contato</h3>
            <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3 sm:gap-6">
                <div>
                    <label for="category" class="{{$labelStyle}}">Tipo de Usuário</label>
                    <select id="category" class="{{$inputStyle}}">
                        <option selected="">Selecione um tipo</option>
                        <option value="ADM">Voluntário</option>
                        <option value="CLT">Funcionário CLT</option>
                        <option value="CDR">Captador de Recursos</option>
                        <option value="EST">Estagiário</option>
                        <option value="AUT">Autônomo</option>
                    </select>
                </div>

                <div class="w-full">
                    <label for="price" class="{{$labelStyle}}">Price</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        class="{{$inputStyle}}"
                        placeholder="$2999"
                    >
                </div>
                <div>
                    <label for="category" class="{{$labelStyle}}">Grupo de permissões</label>
                    <select
                        id="category"
                        class="{{$inputStyle}}">
                        <option selected="">Selecione um grupo</option>
                        <option value="ADM">Admin</option>
                    </select>
                </div>
                <div>
                    <label for="item-weight" class="{{$labelStyle}}">Item
                        Weight (kg)</label>
                    <input
                        type="number"
                        name="item-weight"
                        id="item-weight"
                        class="{{$inputStyle}}"
                        placeholder="12"
                    >
                </div>
            </div>
            <div class="flex flex-row-reverse mt-6">
                <button
                    type="button"
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

