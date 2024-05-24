import './bootstrap';

import 'flowbite';

import './datepicker.js'

import './toggler.js'

document.addEventListener('livewire:navigated', () => {
    initFlowbite();
})
