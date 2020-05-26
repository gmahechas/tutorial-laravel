<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index')->with([
            'products' => Product::all()
        ]);
    }

    public function create()
    {
        return view('product.create');
    }

    public function store()
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1024'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:availible,unavaible'],
        ];

        request()->validate($rules);

        if(request()->status == 'availible' && request()->stock == 0) {
            session()->flash('error', 'If avaible must have stock');
            return redirect()
                ->back()
                ->withInput(request()->all())
                ->withErrors('If available must have stock');
        }

        $product = Product::create(request()->all());
        return redirect()->route('product.index')->with(['success' => 'The new product was created']);
    }

    public function show($product)
    {
        return view('product.show')->with([
            'product' => Product::findOrFail($product)
        ]);
    }

    public function edit($product)
    {
        return view('product.edit')->with([
            'product' => Product::findOrFail($product)
        ]);
    }

    public function update($product)
    {
        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1024'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:availible,unavaible'],
        ];

        request()->validate($rules);

        $product = Product::findOrFail($product);
        $product->update(request()->all());
        return redirect()->route('product.index')->with(['success' => 'The product was updated']);
    }

    public function destroy($product)
    {
        $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('product.index')->with(['success' => 'The product was destroy']);
    }
}
