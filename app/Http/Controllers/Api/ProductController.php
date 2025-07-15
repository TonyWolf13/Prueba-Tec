<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
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
        $products = Product::paginate(50);
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        /**
         * Se pueden utilizar las reglas de validacion de un Request especializado para evitar
         * la validacion en el controlador, pero para este ejemplo se utiliza la validacion
         * directamente en el controlador.
         * @see https://laravel.com/docs/12.x/validation#form-request-validation
         */

        $product = Product::create($request->validated());

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Es funcional pero puedes manejar excepciones si el producto no existe.
        // Por ejemplo, puedes usar findOrFail() para lanzar una excepción si no se encuentra
        // o manejarlo manualmente como se muestra a continuación.
        /**
         * @see https://laravel.com/docs/12.x/eloquent#not-found-exceptions
         * También puedes utilizar el modelo en lugar de la consulta dentro de la función
         * @see https://laravel.com/docs/12.x/routing#implicit-binding
         */
        return response()->json($product, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {

            $product->update($request->validated());

            return response()->json($product, 200);
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json(['message' => 'error'], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
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
