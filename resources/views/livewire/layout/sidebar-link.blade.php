<ul class="space-y-1 font-medium">
    @if($menuItems)
        @foreach($menuItems as $item)
            <li>
                <a href="{{ route($item['item_link']) }}"
                   wire:navigate
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="text-amber-500 fa {{$item['fa_icon']}}"></i>
                    <span class="ms-3">{{$item['item_name']}}</span>
                </a>
            </li>
        @endforeach
    @endif
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href=""
               onclick="event.preventDefault();
                   this.closest('form').submit();"
               class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <i class="text-amber-500 fa fa-sign-out"></i>
                <span class="ms-3">Sair</span>
            </a>
        </form>
    </li>
</ul>
