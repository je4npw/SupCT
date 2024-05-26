<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class Alert extends Component
{
    public $type = 'info';
    public $message = '';
    public $dismissible = false;
    public $timeout = 0;

    protected $listeners = ['showAlert' => 'show'];

    public function show($type, $message, $dismissible, $timeout)
    {
        $this->type = $type;
        $this->message = $message;
        $this->dismissible = $dismissible;
        $this->timeout = $timeout;
    }

    public function hide()
    {
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.layout.alert');
    }
}
