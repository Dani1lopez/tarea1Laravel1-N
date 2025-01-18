@extends('plantilla.principal')
@section('titulo')
Inicio Categorías
@endsection

@section('cabecera')
Gestión de Categorías
@endsection

@section('contenido')
<!-- Botón "NUEVA" con diseño más vistoso -->
<div class="flex flex-row-reverse mb-4">
    <a 
        href="{{route('categories.create')}}" 
        class="
            flex items-center gap-2 px-4 py-2 
            rounded-xl font-bold text-white
            bg-gradient-to-r from-blue-600 via-green-500 to-teal-500 
            shadow-lg transform hover:scale-105 transition-all duration-300
        "
    >
        <i class="fas fa-plus"></i>
        <span>NUEVA</span>
    </a>
</div>

<!-- Contenedor de la tabla con efecto "vidrio" y sombra -->
<div class="relative shadow-2xl sm:rounded-lg bg-white/30 backdrop-blur-md p-4">
    <table class="w-full text-sm text-left text-gray-800 border-separate border-spacing-y-3 border-spacing-x-0">
        <thead class="text-xs font-bold uppercase bg-gradient-to-r from-blue-600 via-green-500 to-teal-500 text-white">
            <tr class="shadow-sm">
                <th scope="col" class="px-6 py-3">NOMBRE</th>
                <th scope="col" class="px-6 py-3">COLOR</th>
                <th scope="col" class="px-6 py-3">ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $item)
            <!-- Fila de ejemplo 1 -->
            <tr class="transition-colors duration-300 hover:bg-blue-50 rounded-md shadow-md bg-white">
                <!-- Columna: Nombre -->
                <th scope="row" class="px-6 py-4 font-semibold text-gray-900">
                    {{$item->nombre}}
                </th>
                <!-- Columna: Color -->
                <td class="px-6 py-4">
                    <div 
                        class="p-2 rounded-xl w-32 text-white text-center" 
                        style="background-color:{{$item->color}};"
                    >
                        #3498db
                    </div>
                </td>
                <!-- Columna: Acciones -->
                <td class="px-6 py-4">
                    <form class="flex items-center gap-2" method="post" action="{{route('categories.destroy',$item)}}">
                        <!-- Enlace Editar -->
                        @csrf
                        @method('DELETE')
                        <a 
                            href="{{route('categories.edit',$item)}}" 
                            class="
                                px-2 py-1 rounded-md bg-green-500 text-white 
                                hover:bg-green-700 transition-colors
                            "
                        >
                            <i class="fas fa-edit"></i>
                        </a>
                        
                        <!-- Botón Borrar -->
                        <button 
                            type="submit"
                            class="
                                px-2 py-1 rounded-md bg-red-500 text-white 
                                hover:bg-red-700 transition-colors
                            "
                        >
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('alertas')
<x-comalerta />
@endsection
