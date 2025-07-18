<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::all();
        return response()->json($products, 200);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json($product,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $product = Product::find($id);
        if(!$product){
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($product, 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validate = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
        ]);

        try {
            $product = product::find($id);
        if (!$product){
            return response()->json(['message' => 'producto no encontrado'], 404);
        }

        
        Log::info("producto encontrado");

        $product->update($validate);

        return response()->json($product, 200);
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json(['message' => 'error'], 400);
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $product =Product::find($id);
        if (!$product){
            return response()->json(['message' => 'producto no encontrado'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Producto eliminado'], 200);

    }
}
