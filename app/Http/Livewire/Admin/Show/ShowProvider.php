<?php

namespace App\Http\Livewire\Admin\Show;

use Livewire\Component;
use App\Models\Provider;
use App\Models\Origin;
use App\Models\Variation;
use App\Traits\InteractsWithBanner;

use Livewire\WithPagination;

class ShowProvider extends Component
{
    use InteractsWithBanner;
    use WithPagination;
    public $search;
    public $provi;
    public $orig;
    public $vari;
    public $porpagina=5;

    
    //recargar a la hora de actualizar
    protected $listeners=['recargar'=>'render'];

   

    public function mount()
    {
        $this->search="";
        $this->or=Origin::all();
        $this->va=Variation::all();
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
        return view('livewire.admin.show.show-provider',[
            'provider'=> Provider::where('name','LIKE',"%{$this->search}%")->orderBy('name','ASC')->paginate($this->porpagina),
        ])
        ->layout("layouts.admin");
    }
}
