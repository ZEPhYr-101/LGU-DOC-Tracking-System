<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AccessLog extends Component
{
    public function render()
    {
        return view('livewire.admin.access-log')->layout('layouts.main');;
    }
}
