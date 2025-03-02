<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias=Category::orderBy('nombre')->get();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->rules());
        Category::create($request->all());
        return redirect()->route('categories.index')->with('mensaje','Categoria creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categorias.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate($this->rules($category->id));
        $category->update($request->all());
        return redirect()->route('categories.index')->with('mensaje','Categoria editada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('mensaje','Categoria borrada con exito');
    }

    private function rules(?int $id=null):array{
        return [
            'nombre'=>['required','min:4','max:60','unique:categories,nombre,'.$id],
            'color'=>['required','color-hex'],
        ];
    }
}
