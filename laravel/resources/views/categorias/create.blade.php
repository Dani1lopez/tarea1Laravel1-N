@extends('plantilla.principal')
@section('titulo')
Crear Categoría
@endsection
@section('cabecera')
Crear Categoría
@endsection
@section('contenido')
<!-- Formulario simplificado para práctica -->
<div class="max-w-lg mx-auto mt-10 bg-gradient-to-br from-white/80 to-gray-50 backdrop-blur-md shadow-xl p-8 rounded-lg border border-gray-200">
    <form class="space-y-6" method="POST" action="{{route('categories.store')}}">
        @csrf
        <!-- Campo: Nombre de la Categoría -->
        <div>
            <label for="nombre" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Nombre de la Categoría
            </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{@old('nombre')}}"
                placeholder="Ejemplo: Electrónica"
                class="w-full px-4 py-3 rounded-md border border-gray-300
                    focus:ring-2 focus:ring-teal-400 focus:border-teal-400
                    bg-gray-100 text-gray-800"
            />
            <x-error for="nombre"></x-error>
        </div>

        <!-- Campo: Color de la Categoría -->
        <div>
            <label for="color" class="block mb-2 text-sm font-bold text-gray-700 uppercase tracking-wide">
                Color de la Categoría
            </label>
            <input
                type="color"
                id="color"
                name="color"
                value="{{@old('color')}}"
                class="w-full h-12 rounded-md border border-gray-300
                    cursor-pointer focus:ring-2 focus:ring-teal-400 focus:border-teal-400"
            />
            <x-error for="color"></x-error>
        </div>

        <!-- Botones: GUARDAR, LIMPIAR, CANCELAR -->
        <div class="flex justify-end gap-4 mt-6">
            <!-- Botón GUARDAR -->
            <button
                type="submit"
                class="
                    px-6 py-3 rounded-md text-white font-bold
                    bg-teal-500 hover:bg-teal-700 
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-save mr-2"></i>
                GUARDAR
            </button>

            <!-- Botón LIMPIAR -->
            <button
                type="reset"
                class="
                    px-6 py-3 rounded-md text-teal-700 font-bold
                    border border-teal-500 hover:bg-teal-100 
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-brush mr-2"></i>
                LIMPIAR
            </button>

            <!-- Botón CANCELAR -->
            <a
                href="{{route('categories.index')}}"
                class="
                    px-6 py-3 rounded-md text-white font-bold
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
