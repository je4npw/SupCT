<ul class="space-y-2 font-medium">
    @if($menuItems)
        @foreach($menuItems as $item)
            <li>
                <a href="{{ route($item['item_link']) }}"
                   class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <i class="fa {{$item['fa_icon']}}"></i>
                    <span class="ms-3">{{$item['item_name']}}</span>
                </a>
            </li>
        @endforeach
    @endif
</ul>
