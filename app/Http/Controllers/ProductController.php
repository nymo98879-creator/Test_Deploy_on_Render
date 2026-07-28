<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'required|file',
            'des' => 'nullable',
        ]);

        try {
            $title = $request->title;
            $price = $request->price;
            $stock = $request->stock;
            $des = $request->des;

            if ($request->hasFile('image')) {
                $image_path = $request->file('image')->store('uploads', 'public');
            }

            Product::create([
                'title' => $title,
                'price' => $price,
                'stock' => $stock,
                'image' => $image_path,
                'des' => $des,
            ]);

            return redirect()->route('products.index')
                ->with('success', 'Insert Product Successfully !!!');

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {

            $product = Product::findOrFail($id);

            return view('products.update', compact('product'));

        } catch (Exception $e) {
            return back()->with('error', $e->getPrevious());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image',
            'des' => 'nullable',
        ]);

        try {
            $product = Product::findOrFail($id);

            $data = [
                'title' => $request->title,
                'price' => $request->price,
                'stock' => $request->stock,
                'des' => $request->des,
            ];

            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::disk('public')->delete($product->image);
                }

                $data['image'] = $request->file('image')->store('uploads', 'public');
            }

            $product->update($data);

            return redirect()->route('products.index')->with('success', 'Updated Product Successfully !!!');

        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->delete();

            return redirect()->route('products.index')
                ->with('success', 'Product deleted successfully!');
        }catch(Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }
}
