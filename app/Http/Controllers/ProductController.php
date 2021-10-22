<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order_rule;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('active', true)->get();
        return view('products.index')
                ->with(compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show')
                ->with(compact('product'));
    }

    public function getPriceAttribute($value)
    {
        $discount = $value * ($this -> discount/ 100);
        $final_price = $value-$discount;
        return number_format($final_price, 2);
    }

    public function order(Product $product, Request $request)
    {
        $rule = new Order_rule();
        $rule->product = $product;
        $rule->type = $request->type;
        $rule->size = $request->size;
        

        $request->session()->push('cart', $rule);
        return redirect()->route('cart');
    }
}
