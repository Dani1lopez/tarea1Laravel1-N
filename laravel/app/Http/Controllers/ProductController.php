<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Product::orderBy('nombre')->paginate(5);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Category::orderBy('nombre')->get();
        return view('productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->validate($this->rules());
        $datos['imagen'] = ($request->imagen) ? $request->imagen->store('images/products/') : 'images/products/noimage.jpg';
        Product::create($datos);

        return redirect()->route('products.index')->with('mensaje', 'Producto creado con exito');
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
    public function edit(Product $product)
    {
        $categorias = Category::select('nombre', 'id')->orderBy('nombre')->get();
        return view('productos.edit', compact('product', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $datos = $request->validate($this->rules($product->id));
        //ESTA ES OTRA MANERA DE HACERLO NO SE SI ASI ESTA BIEN FUNCIONAR FUNCIONA
        // Verifica si se envió una nueva imagen
        if ($request->hasFile('imagen')) {
            // Elimina la imagen vieja solo si no es la imagen por defecto
            if (basename($product->imagen) != 'noimage.jpg') {
                Storage::delete($product->imagen);
            }

            // Guarda la nueva imagen
            $datos['imagen'] = $request->imagen->store('images/products/');
        } else {
            // Mantén la imagen anterior si no se envió una nueva
            $datos['imagen'] = $product->imagen;
        }

        // Actualiza el producto con los datos
        $product->update($datos);

        return redirect()->route('products.index')->with('mensaje', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if (basename($product->imagen) != 'noimage.jpg') {
            Storage::delete($product->imagen);
        }
        $product->delete();
        return redirect()->route('products.index')->with('mensaje', 'Producto borrado con exito');
    }

    private function rules(?int $id = null): array
    {
        return [
            'nombre' => ['required', 'string', 'min:4', 'max:50', 'unique:products,nombre,' . $id],
            'descripcion' => ['required', 'string'],
            'imagen' => ['image', 'max:2048'],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:products,id']
        ];
    }
}
