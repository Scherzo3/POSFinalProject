<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')
        ->store('products', 'public');
    }
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock_quantity' => $request->stock_quantity,
        'image' => $imagePath,
    ]);
    return redirect()->route('products.index');
    }
    public function edit(Product $product)
    {
    return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
    $request->validate([
        'name' => 'required|max:255',
        'price' => 'required|numeric|min:0',
        'stock_quantity' => 'required|integer|min:0',
    ]);
    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'stock_quantity' => $request->stock_quantity,
    ]);
    return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
    $product->delete();

    return redirect()->route('products.index');
    }
}