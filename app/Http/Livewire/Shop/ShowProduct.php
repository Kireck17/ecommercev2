<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Variation;
use App\Models\ShoppingCart;
use Livewire\WithPagination;
use App\Traits\InteractsWithBanner;
use Livewire\Component;

class ShowProduct extends Component
{
    use WithPagination,InteractsWithBanner;

    public $product;
    public $quantity;
    public $variation;

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->quantity = 1;
        $this->variation=$product->variation()->first()->id;
    }
    public function cuantityadd(){
        if ($this->quantity < $this->get_stock()) {
            $this->quantity++;
        }
    }
    public function remove(){
        if($this->quantity > 1){
            $this->quantity--;
        }
    }
    public function get_images()
    {
         $variation=Variation::find($this->variation);
         return $variation->files()->get();
    }
    public function get_attributes()
    {
        $this->get_images();
        $this->get_stock();
        $variation=Variation::find($this->variation);
        return $variation->attribute_value()->get();
    }
    public function get_stock()
    {
        $variation=Variation::find($this->variation);
        return  $variation->stock()->first()->quantity;
    }
    public function fillcart()
    {
        if (auth()->user() != null) {
            $variation=Variation::find($this->variation);
            $shopincart=new ShoppingCart();
            $shopincart->user_id= auth()->user()->id;
            $shopincart->stock_id= $variation->stock()->first()->id;
            $shopincart->quantity= $this->quantity;
            $shopincart->save();

            $this->banner('Se agrego al carrito de compras');
        }else{
            return redirect()->route('login');
        }
    }
    public function render()
    {
        return view('livewire.shop.show-product',[
            'product' => $this->product,
            'trademark' => $this->product
                ->trademark()
                ->first()
                ->product()
                ->where('id','<>',$this->product->id)
                ->paginate(5),
        ]);
    }
}
