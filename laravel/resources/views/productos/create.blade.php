@extends('plantilla.principal')
@section('titulo')
Crear Producto
@endsection
@section('cabecera')
Crear Producto
@endsection
@section('contenido')
<!-- Formulario simplificado para práctica -->
<div class="max-w-2xl mx-auto mt-10 bg-gradient-to-br from-gray-100 to-gray-300 backdrop-blur-lg shadow-2xl p-10 rounded-lg border border-gray-300">
    <form class="space-y-6" method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
        <!-- Campo: Nombre del Producto -->
        @csrf
        <div>
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Nombre del Producto
            </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{@old('nombre')}}"
                placeholder="Ejemplo: Televisor LED"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            />
            <x-error for="nombre"></x-error>
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
            >{{@old('descripcion')}}</textarea>
            <x-error for="descripcion"></x-error>
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
                oninput="preview.src=window.URL.createObjectURL(this.files[0])"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            />
            <div class="mt-2">
                <img id="preview" src="{{Storage::url('images/products/noimage.jpg')}}" alt="" class="w-56 aspect-video object-fill border-2">
            </div>
            <x-error for="imagen"></x-error>
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
                value="{{@old('stock')}}"
                placeholder="Ejemplo: 100"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-blue-400 focus:border-blue-400
                    bg-white text-gray-800 shadow-sm"
            />
            <x-error for="stock"></x-error>
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
                @foreach($categorias as $item)
                <!-- Añade más opciones según necesites -->
                    <option value="{{$item->id}}"@selected(@old('category_id')==$item->id)>{{$item->nombre}}</option>
                @endforeach
            </select>
            <x-error for="category_id"></x-error>
        </div>

        <!-- Botones: GUARDAR, LIMPIAR, CANCELAR -->
        <div class="flex justify-end gap-4 mt-6">
            <!-- Botón GUARDAR -->
            <button
                type="submit"
                class="
                    px-6 py-3 rounded-lg text-white font-bold
                    bg-blue-500 hover:bg-blue-700 
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-save mr-2"></i>
                GUARDAR
            </button>

            <!-- Botón LIMPIAR -->
            <button
                type="reset"
                class="
                    px-6 py-3 rounded-lg text-blue-700 font-bold
                    border border-blue-500 hover:bg-blue-100 
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-brush mr-2"></i>
                LIMPIAR
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
