<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class Productall extends Component
{
    public function render()
    {
        $data = Product::orderBy('id','ASC')->Search()->paginate(5);
        return view('livewire.admin.productall',compact('data'))->layout('layout.app');

    }
}
