<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\Component;

class Welcome extends Component
{
    use WithPagination;

    public $search;
    public $categories;

    public function mount()
    {
        $this->categories = Category::has('product')->get()->unique('name');
    }
    public function render()
    {
        return view('livewire.shop.welcome',[
            'products' => Product::where('name','LIKE',"%{$this->search}%")->paginate(5),
        ]);
    }
}
