@extends('plantilla.principal')
@section('titulo')
Editar Producto
@endsection
@section('cabecera')
Editar Producto
@endsection
@section('contenido')
<!-- Formulario simplificado para edición -->
<div class="max-w-2xl mx-auto mt-10 bg-gradient-to-br from-gray-100 to-gray-300 backdrop-blur-lg shadow-2xl p-10 rounded-lg border border-gray-300">
    <form class="space-y-6" method="POST" action="{{route('products.update',$product)}}" enctype="multipart/form-data">
        <!-- Campo: Nombre del Producto -->
        @csrf
        @method('PUT')
        <div>
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Nombre del Producto
            </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{@old('nombre',$product->nombre)}}"
                placeholder="Ejemplo: Televisor LED"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            />
        </div>

        <!-- Campo: Descripción del Producto -->
        <div>
            <label for="descripcion" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Descripción del Producto
            </label>
            <textarea
                id="descripcion"
                name="descripcion"
                rows="4"
                placeholder="Ejemplo: Televisor LED de 55 pulgadas con resolución 4K"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm resize-none"
            >{{@old('descripcion',$product->descripcion)}}</textarea>
        </div>

        <!-- Campo: Imagen del Producto -->
        <div>
            <label for="imagen" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Imagen del Producto
            </label>
            <input
                type="file"
                id="imagen"
                name="imagen"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            />
            <div class="mt-2">
                <img id="preview" src="{{Storage::url($product->imagen)}}" alt="" class="w-56 aspect-video object-fill border-2">
            </div>
        </div>

        <!-- Campo: Stock del Producto -->
        <div>
            <label for="stock" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Stock del Producto
            </label>
            <input
                type="number"
                id="stock"
                name="stock"
                value="{{@old('stock',$product->stock)}}"
                placeholder="Ejemplo: 100"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            />
        </div>

        <!-- Campo: Categoría del Producto -->
        <div>
            <label for="category_id" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Categoría del Producto
            </label>
            <select
                id="category_id"
                name="category_id"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            >
                <option value="" disabled selected>Selecciona una categoría</option>
                <!-- Opciones de categorías estáticas -->
                @foreach($categorias as $item)
                <!-- Añade más opciones según necesites -->
                    <option value="{{$item->id}}"@selected(@old('category_id',$product->category_id)==$item->id)>{{$item->nombre}}</option>
                @endforeach
            </select>
        </div>

        <!-- Botones: EDITAR, CANCELAR -->
        <div class="flex justify-end gap-4 mt-6">
            <!-- Botón EDITAR -->
            <button
                type="submit"
                class="
                    px-6 py-3 rounded-lg text-white font-bold
                    bg-blue-500 hover:bg-blue-700 
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-edit mr-2"></i>
                EDITAR
            </button>

            <!-- Botón CANCELAR -->
            <a
                href="{{route('products.index')}}"
                class="
                    px-6 py-3 rounded-lg text-white font-bold
                    bg-red-500 hover:bg-red-700 
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-times mr-2"></i>
                CANCELAR
            </a>
        </div>
    </form>
</div>
@endsection
