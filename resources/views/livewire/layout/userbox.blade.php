<div>
    <button
        type="button"
        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-green-300 dark:focus:ring-red-500"
        id="user-menu-button"
        aria-expanded="false"
        data-dropdown-toggle="dropdown"
    >
        <span class="sr-only">Abrir menu de usuário</span>
        <img
            class="w-8 h-8 rounded-full"
            src="https://github.com/je4npw.png"
            alt="user photo"
        />
    </button>
    <div
        class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded-xl border border-red-500 divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
        id="dropdown"
    >
        <div class="py-3 px-4">
              <span class="block text-sm font-semibold text-gray-900 dark:text-red-500">
                  {{Auth::user()->name}}</span>
            <span class="block text-sm text-gray-900 truncate dark:text-white">
                         [ {{Auth::user()->email}} ]
                    </span>
        </div>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <a href="{{route('usuario')}}"
                   class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-white"
                >Meu Perfil</a>
            </li>
            <li>
                <a href="#"
                   class="block py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-300 dark:hover:text-white"
                >Configurações</a>
            </li>
        </ul>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <a href="#"
                   class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <i class="fa fa-heart pr-4"></i>
                    My likes
                </a>
            </li>
            <li>
                <a href="#"
                   class="flex items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                    <i class="fa fa-archive pr-4"></i>
                    Collections
                </a>
            </li>
            <li>
                <a
                    href="#"
                    class="flex justify-between items-center py-2 px-4 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                >
                  <span class="flex items-center">
                    <i class="fa fa-fire pr-4"></i>
                    Pro version
                  </span>
                    <svg
                        aria-hidden="true"
                        class="w-5 h-5 text-gray-400"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                        ></path>
                    </svg>
                </a>
            </li>
        </ul>
        <ul class="py-1 text-gray-700 dark:text-gray-300" aria-labelledby="dropdown">
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')"
                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Sair') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </div>
</div>
