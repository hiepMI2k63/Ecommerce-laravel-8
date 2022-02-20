<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Pagination\Paginator;
use App\Models\Category;



class Shopcomponent extends Component
{

    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting = 'default';
        $this->pagesize = 8;
    }




    public static function store($product_id, $product_name, $product_price)
    {

        Cart::add($product_id, $product_name,1, $product_price)->associate('App\Models\Product');

        session()->flash('success','Thêm mới một mục vào rỏ hàng');
        return redirect()->route('cart');
    }



    public function render()
    {

        if($this->sorting =="date")
        {

            $data = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        elseif($this->sorting =="price")
        {
            $data = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting =="price-desc")
        {
            $data = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else
        {
            $data = Product::paginate($this->pagesize);
        }


        $count1 = Product::count();

        $listCar = Category::all();


        return view('livewire.shopcomponent',compact(['data','count1','listCar']))->layout('layout.app');
    }
}
