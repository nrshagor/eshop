<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image format and size
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        // Store the image in the public folder
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Create a new product with the form data
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => '0', // Default status
            'category' => $request->category, // Default status

        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image format and size
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        // Update image if a new one is provided
        if ($request->hasFile('image')) {
            // Delete old image
            if ($product->image) {
                unlink(public_path('images/' . $product->image));
            }

            // Store the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
        }

        // Update other fields
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
