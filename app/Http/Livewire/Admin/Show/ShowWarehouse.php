<?php

namespace App\Http\Livewire\Admin\Show;

use Livewire\Component;
use App\Models\WareHouse;
use Livewire\WithPagination;
use App\Traits\InteractsWithBanner;

class ShowWarehouse extends Component
{
    use InteractsWithBanner;
    use WithPagination;
    public $search;
    public $wareho;
    public $porpagina=5;


    //recargar a la hora de actualizar
    protected $listeners=['recargar'=>'render'];

    public function mount()
    {
        $this->search="";
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function updatedPorpagina()
    {
        $this->resetPage();
    }

    
    public function render()
    {
        return view('livewire.admin.show.show-warehouse',[
            'warehouse'=> WareHouse::where('name','LIKE',"%{$this->search}%")->orderBy('name','ASC')->paginate($this->porpagina),
        ])->layout("layouts.admin");
    }
}
