<?php

namespace App\Http\Livewire\Admin\Create;

use Livewire\Component;

class CreateForms extends Component
{
    public $apartados;

    public function mount()
    {
        $this->apartados=['marcas','categorias','subcategorias','origen','almacenes','productos','proveedores','existencias','kits'];
    }

    public function render()
    {
        return view('livewire.admin.create.create-forms')
            ->layout('layouts.admin');
    }
}
