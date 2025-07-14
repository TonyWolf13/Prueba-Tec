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
        // intenta obtener todos los productos con las seeders de 5000 datos.
        $products = Product::all();
        return response()->json($products, 200);
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * Se pueden utilizar las reglas de validacion de un Request especializado para evitar
         * la validacion en el controlador, pero para este ejemplo se utiliza la validacion
         * directamente en el controlador.
         * @see https://laravel.com/docs/12.x/validation#form-request-validation
         */

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
        // Es funcional pero puedes manejar excepciones si el producto no existe.
        // Por ejemplo, puedes usar findOrFail() para lanzar una excepción si no se encuentra
        // o manejarlo manualmente como se muestra a continuación.
        /**
         * @see https://laravel.com/docs/12.x/eloquent#not-found-exceptions
         * También puedes utilizar el modelo en lugar de la consulta dentro de la función
         * @see https://laravel.com/docs/12.x/routing#implicit-binding
         */

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

    /**
     * No se encuentraron las funciones para optimizar la extracción y optimización de consultas
     * de productos solicitadas en el ejercicio.
     * @see https://laravel.com/docs/12.x/queries#main-content
     * @see https://laravel.com/docs/12.x/queries#select-statements
     * @see https://laravel.com/docs/12.x/queries#where-clauses
     * @see https://laravel.com/docs/12.x/queries#orderby
     * @see https://laravel.com/docs/12.x/queries#limit-and-offset
     */
}
