<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
    // Show the product form and list all products
    public function index()
    {
        $products = Product::all();
        $product = null;
        return view('pro-product', compact('products', 'product'));
    }

    // Edit product
    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            $products = Product::all();
            return view('pro-product', compact('product', 'products'));
        } catch (\Exception $e) {
            return redirect()->route('pro-product')->with('error', 'Product not found: ' . $e->getMessage());
        }
    }

    // Delete product
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            if ($product->image && file_exists(public_path('uploaded_img/' . $product->image))) {
                unlink(public_path('uploaded_img/' . $product->image));
            }
            $product->delete();
            return redirect()->route('pro-product')->with('success', 'Product deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('pro-product')->with('error', 'Failed to delete product: ' . $e->getMessage());
        }
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'details'  => 'required|string|max:1000',
            'price'    => 'required|numeric|min:0',
            'image'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploaded_img'), $imageName);

            $product = Product::create([
                'name'     => $request->name,
                'category' => $request->category,
                'details'  => $request->details,
                'price'    => $request->price,
                'image'    => $imageName,
            ]);

            Log::info('Product created: ', ['id' => $product->id, 'attributes' => $product->toArray()]);

            return redirect()->route('pro-product')->with('success', 'Product added successfully!');
        } catch (\Exception $e) {
            Log::error('Failed to add product: ' . $e->getMessage());
            return redirect()->route('pro-product')->with('error', 'Failed to add product: ' . $e->getMessage());
        }
    }

    // Update existing product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'details'  => 'required|string|max:1000',
            'price'    => 'required|numeric|min:0',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $product = Product::findOrFail($id);
            $data = [
                'name'     => $request->name,
                'category' => $request->category,
                'details'  => $request->details,
                'price'    => $request->price,
            ];

            if ($request->hasFile('image')) {
                if ($product->image && file_exists(public_path('uploaded_img/' . $product->image))) {
                    unlink(public_path('uploaded_img/' . $product->image));
                }
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploaded_img'), $imageName);
                $data['image'] = $imageName;
            }

            $product->update($data);
            return redirect()->route('pro-update.edit', $product->id)->with('success', 'Product updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('pro-product')->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }
}