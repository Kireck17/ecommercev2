<?php

namespace App\Http\Livewire\Admin\Create\Forms;

use App\Models\WareHouse;
use App\Traits\InteractsWithBanner;
use Livewire\Component;

class Almacen extends Component
{
    use InteractsWithBanner;

    public $warehouse;

    protected $rules = [
        'warehouse.name' => "required|max:200|unique:warehouses,name",
    ];

    protected $validationAttributes = [
        'warehouse.name' => "Nombre",
    ];

    public function Mount()
    {
       $this->warehouse = [];
    }

    public function Save()
    {
        $this->validate();
        $warehouses = new WareHouse($this->warehouse);
        $warehouses->save();
        $this->warehouse = [];
        $this->banner('Almacen(es) guardado(s) correctamente');
    }
    public function render()
    {
        return view('livewire.admin.create.forms.almacen');
    }
}
