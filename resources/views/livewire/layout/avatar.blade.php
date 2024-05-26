<form wire:submit.prevent="saveAvatar">
    <div class="flex flex-col items-center justify-center mb-6">
        <div class="relative w-32 h-32 mb-4">
            @if ($photo)
                <img
                    class="w-full h-full border-4 ring-4 border-amber-500 rounded-full shadow-lg object-cover"
                    src="{{ $photo->temporaryUrl() }}"
                    alt="Imagem de {{$name}}"
                >
            @else
                <img class="w-full h-full border-4 ring-4 border-amber-500 rounded-full shadow-lg object-cover"
                     src="{{ asset('avatars/' . basename($avatar)) }}"
                     alt="Imagem de {{$name}}">
            @endif
        </div>
        <div>
            <div class="flex items-center">
                <input
                    class="block w-full text-xs text-amber-500 border border-gray-300 rounded-l-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    id="small_size"
                    type="file"
                    wire:model="photo"
                >
                <button
                    @if(!$photo) disabled @else enabled @endif
                type="submit"
                    class="text-white bg-gray-50 rounded-r-lg text-sm px-5 py-2.5 dark:bg-gray-700"
                >
                    <i class="fa fa-upload text-amber-500"></i>
                </button>
            </div>
            @error('photo')
            <span class="error">{{ $message }}</span>
            @enderror
        </div>
    </div>
</form>
