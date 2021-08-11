<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;

class ShowCategory extends Component
{
    use WithPagination;

    public $category;
    public $search;

    //Search aparece solo si se realiza una busqueda
    protected $queryString=['search'=>['except'=>""]];

    public function mount(Category $category)
    {
        $this->category=$category;
        $this->search="";

    }
    public function render()
    {
        return view('livewire.shop.show-category',[
            'category' => $this->category,
            //where para realizar la busqueda
            'products' => $this->category->product()->where('name','LIKE',"%{$this->search}%")->orderBy('name','ASC')->paginate(15),
        ]);
    }
}
