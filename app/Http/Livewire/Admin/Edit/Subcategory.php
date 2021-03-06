<?php

namespace App\Http\Livewire\Admin\Edit;

use Livewire\Component;
use App\Models\SubCategory as SubCategoria;
use App\Traits\InteractsWithBanner;

class Subcategory extends Component
{
    use InteractsWithBanner;
    public $is_show;
    public $subcategory;
    

    public function mount(SubCategoria $subcategory)
    {
        $this->is_show=false;
        $this->subcategory=$subcategory;
        
    }

    protected $rules = [
        'subcategory.name' => "required|max:200|unique:subcategories,name",
    ];

    protected $validationAttributes = [
        'subcategory.name' => "Nombre",
    ];

    public function edit_componente()
	{
		$this->is_show=true;
	}
    public function save_changes()
	{
        $this->validate();
		$this->subcategory->save();
        $this->is_show=false;
		$this->banner('SubCategoria Editada correctamente');
		$this->emit('recargar');
	}

    public function cancelar()
	{
		$this->is_show=false;
	}
    public function render()
    {
        return view('livewire.admin.edit.subcategory');
    }
}
