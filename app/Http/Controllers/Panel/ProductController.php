<?php

namespace App\Http\Controllers\Panel;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Archive;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.products.index', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view('panel.products.create')->with('productCategories', $productCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());           

        // Pega o arquivo do request
        $file = $request->file('image');

        // Salva no storage (exemplo: 'storage/app/public/archives')
        $path = $file->store('archives', 'public');

        // Salva no banco de dados
        $archive = Archive::create([
            'name' => $file->getClientOriginalName(),
            'description' => $request->description,
            'type' => $file->getMimeType(),
            'path' => $path,
            'extension' => $file->getClientOriginalExtension(),
            'product_id' => $product->id
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('panel.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('panel.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
