@extends('plantilla.principal')
@section('titulo')
Editar Categoría
@endsection

@section('cabecera')
Editar Categoría
@endsection

@section('contenido')
<!-- Contenedor del formulario con diseño renovado -->
<div class="max-w-xl mx-auto mt-10 bg-gradient-to-br from-white/70 to-gray-50 backdrop-blur-md shadow-xl p-8 rounded-lg border border-gray-200">
    <form class="space-y-6" method="POST" action="{{route('categories.update',$category)}}">
        @csrf
        @method('PUT')
        <!-- Campo: Nombre de la Categoría -->
        <div>
            <label for="nombre" class="block text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">
                Nombre de la Categoría
            </label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{@old('nombre',$category->nombre)}}"
                placeholder="Ej: Electrónica"
                class="w-full px-4 py-3 rounded-lg border border-gray-300
                    focus:ring-2 focus:ring-teal-400 focus:border-teal-400
                    bg-gray-100 text-gray-900"
            />
        </div>

        <!-- Campo: Color de la Categoría -->
        <div>
            <label for="color" class="block text-sm font-bold text-gray-800 mb-2 uppercase tracking-wide">
                Color de la Categoría
            </label>
            <input
                type="color"
                id="color"
                name="color"
                value="{{@old('color',$category->color)}}"
                class="w-full h-12 rounded-lg border border-gray-300
                    cursor-pointer focus:ring-2 focus:ring-teal-400 focus:border-teal-400"
            />
        </div>

        <!-- Botones -->
        <div class="flex justify-end gap-4 mt-6">
            <!-- Botón GUARDAR -->
            <button
                type="submit"
                class="
                    px-6 py-3 rounded-lg text-white font-bold
                    bg-teal-500 hover:bg-teal-700
                    transition-transform transform hover:scale-105
                ">
                <i class="fas fa-save mr-2"></i>
                GUARDAR
            </button>

            <!-- Botón CANCELAR -->
            <a
                href="{{route('categories.index')}}"
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
