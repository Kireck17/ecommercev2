<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use Livewire\Component;

class NavLinkCategories extends Component
{
    public function render()
    {
        return view('livewire.shop.nav-link-categories',[
            'categories' => Category::has('product')->get()->unique('name'),
        ]);
    }
}
