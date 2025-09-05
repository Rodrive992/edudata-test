@extends('layouts.app')

@section('title', 'Edudata - Portal de Transparencia Educativa')

@section('content')
<div class="container mx-auto px-4 py-4">

    <!-- Banner -->
    <div class="mb-6 rounded-xl overflow-hidden shadow-md">
        <img src="{{ asset('images/bannercapacitaciones.png') }}" alt="Banner Capacitaciones" class="w-full h-60 md:h-70 object-contain md:object-cover">
    </div>

      <!-- Encabezado mejorado -->
        <div class="text-center mb-2">
            <div class="max-w-4xl mx-auto">                
                <div class="inline-block bg-gray-100/80 px-6 py-3 rounded-lg mb-6 backdrop-blur-sm border border-gray-200">
                    <p class="text-lg font-medium text-gray-700">
                       Panel de información de capacitaciones brindadas por el Ministerio de Educación, Ciencia y Tecnología.
                </div>
            </div>
        </div>
     
    <!-- Filtros -->
    <div class="bg-white shadow-lg rounded-xl p-6 mb-10">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Filtros de búsqueda</h2>
        <form method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <!-- Año -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Año</label>
                <select name="anio" class="form-select w-full">
                    <option value="">Todos</option>
                    @php $anioActual = now()->year; @endphp
                    @foreach(range($anioActual, 2025) as $a)
                        <option value="{{ $a }}" {{ request('anio') == $a ? 'selected' : '' }}>{{ $a }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Mes -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Mes</label>
                <select name="mes" class="form-select w-full">
                    <option value="">Todos</option>
                    @foreach(range(1, 12) as $m)
                        <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                            {{ ucfirst(\Carbon\Carbon::create()->month($m)->locale('es')->isoFormat('MMMM')) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Localidad -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Localidad</label>
                <input type="text" name="localidad" value="{{ request('localidad') }}" class="form-input w-full" placeholder="Buscar por localidad">
            </div>

            <!-- Modalidad -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Modalidad</label>
                <select name="modalidad" class="form-select w-full">
                    <option value="">Todas</option>
                    <option value="Virtual" {{ request('modalidad') == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                    <option value="Presencial" {{ request('modalidad') == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                </select>
            </div>

            <!-- Botón -->
            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Tabla -->
    <div class="mt-12">
        <h2 class="text-xl font-bold text-gray-800 mb-4 text-center">Listado de Capacitaciones</h2>
        <div class="overflow-x-auto bg-white shadow rounded-xl">
            <table class="min-w-full text-sm text-gray-800 border border-gray-200">
                <thead class="bg-blue-100 text-gray-700 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-2 border">Oferente</th>
                        <th class="px-4 py-2 border">Denominación</th>
                        <th class="px-4 py-2 border">Tipo</th>
                        <th class="px-4 py-2 border">Modalidad</th>
                        <th class="px-4 py-2 border">Eje</th>
                        <th class="px-4 py-2 border">Nivel</th>
                        <th class="px-4 py-2 border">Localidad</th>
                        <th class="px-4 py-2 border">Dirección</th>
                        <th class="px-4 py-2 border">Inicio</th>
                        <th class="px-4 py-2 border">Finalización</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($capacitaciones as $cap)
                        <tr class="hover:bg-blue-50 border-t border-gray-200">
                            <td class="px-4 py-2">{{ $cap->oferente }}</td>
                            <td class="px-4 py-2">{{ $cap->denominacion_proyecto }}</td>
                            <td class="px-4 py-2">{{ $cap->tipo_proyecto }}</td>
                            <td class="px-4 py-2">{{ $cap->modalidad }}</td>
                            <td class="px-4 py-2">{{ $cap->eje }}</td>
                            <td class="px-4 py-2">{{ $cap->nivel }}</td>
                            <td class="px-4 py-2">{{ $cap->localidad }}</td>
                            <td class="px-4 py-2">{{ $cap->direccion }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}</td>
                            <td class="px-4 py-2">{{ \Carbon\Carbon::parse($cap->fecha_finalizacion)->format('d/m/Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-gray-500 py-6">No se encontraron capacitaciones con los filtros aplicados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginación -->
            <div class="p-4">
                {{ $capacitaciones->links() }}
            </div>
        </div>
    </div>  
</div>
@endsection