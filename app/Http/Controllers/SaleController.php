<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with([
            'product',
            'customer',
            'user'
        ])->get();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $customers = Customer::all();

        return view('sales.create', compact(
            'products',
            'customers'
        ));
    }
public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required',
        'customer_id' => 'required',
        'quantity' => 'required|integer|min:1',
    ]);

    $product = Product::findOrFail($request->product_id);

    // Check if the quantity being requested is available in stock
    if ($request->quantity > $product->stock_quantity) {
        return back()->with(
            'error',
            'Not enough stock available.'
        );
    }

    $totalPrice = $product->price * $request->quantity;

    Sale::create([
        'product_id' => $request->product_id,
        'customer_id' => $request->customer_id,
        'sold_by' => Auth::id(),
        'quantity' => $request->quantity,
        'total_price' => $totalPrice,
    ]);

    // reduces the stock quantity after a sale is made
    $product->stock_quantity -= $request->quantity;
    $product->save();

    return redirect()->route('sales.index');
}
}