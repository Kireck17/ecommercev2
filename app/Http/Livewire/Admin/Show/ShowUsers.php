<?php

namespace App\Http\Livewire\Admin\Show;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class ShowUsers extends Component
{
    use WithPagination;
    public $perpage=10;
    public $porpagina=5;
    public $search;
 
    protected $listeners=['updatePermissions' => 'render'];
    
    

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
        return view('livewire.admin.show.show-users',[
            'users' => User::where('name','LIKE',"%{$this->search}%")->orderBy('name','ASC')->paginate($this->porpagina),
        ])->layout("layouts.admin");
    }
}
