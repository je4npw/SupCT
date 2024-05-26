<div id="default-alert">
    @if ($message)
        @php
            $alertClasses = [
                'info' => 'text-blue-800 border-blue-300 bg-blue-50 dark:text-blue-400 dark:bg-gray-800 dark:border-blue-800',
                'danger' => 'text-red-800 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800',
                'success' => 'text-green-800 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800',
                'alert' => 'text-yellow-800 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800',
                'neutral' => 'text-gray-800 border-gray-300 bg-gray-50 dark:text-gray-300 dark:bg-gray-800 dark:border-gray-600',
            ];
            $iconClasses = [
                'info' => 'text-blue-500',
                'danger' => 'text-red-500',
                'success' => 'text-green-500',
                'alert' => 'text-yellow-500',
                'neutral' => 'text-gray-500',
            ];
        @endphp
        <div id="alert-border"
             class="flex items-center p-4 mb-4 {{ $alertClasses[$type] }} border-t-4 fixed top-14 right-4 z-50"
             role="alert">
            <svg class="flex-shrink-0 w-4 h-4 {{ $iconClasses[$type] }}" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium mx-3">
                {{ $message }}
            </div>
            <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-transparent {{ $iconClasses[$type] }} rounded-lg focus:ring-2 focus:ring-{{ $type }}-400 p-1.5 hover:bg-gray-200 inline-flex items-center justify-center h-8 w-8 dark:hover:bg-gray-700"
                    aria-label="Close" wire:click="hide">
                <span class="sr-only">Fechar</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif
</div>
