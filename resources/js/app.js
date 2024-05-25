import './bootstrap';

import 'flowbite';

import './toggler.js'

document.addEventListener('livewire:navigated', () => {
    initFlowbite();
})

if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
} else {
    document.documentElement.classList.remove('dark')
}
