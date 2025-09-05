@extends('layouts.app')

@section('title', 'Edudata - Administración y Ejecución')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Banner principal -->
    <div class="mb-8 rounded-xl overflow-hidden">
        <img src="{{ asset('images/banneradministracion-v2.png') }}" alt="Banner Administración y Ejecución"
             class="w-full h-60 md:h-70 object-contain md:object-cover">
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-2">
        <div class="max-w-4xl mx-auto">
            <div class="inline-block bg-gray-100/80 px-6 py-3 rounded-lg mb-6 backdrop-blur-sm border border-gray-200">
                <p class="text-lg font-medium text-gray-700">
                    Panel de información de compras del Ministerio en la orbita de la <strong>Secretaría de Administración</strong>.
                </p>
            </div>
        </div>
    </div>

    <!-- Filtros -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-6">
        <h2 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Buscar registros</h2>

        <form id="filtrosForm" method="GET" class="flex flex-wrap items-end gap-3">
            <!-- Proveedor -->
            <div class="flex-1 min-w-[14rem]">
                <label class="block text-xs font-medium text-gray-700 mb-1">Proveedor</label>
                <input type="text" name="proveedor" value="{{ request('proveedor', '') }}"
                       class="w-full rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition"
                       placeholder="Buscar por proveedor">
            </div>

            <!-- Objeto de compra -->
            <div class="flex-1 min-w-[14rem]">
                <label class="block text-xs font-medium text-gray-700 mb-1">Objeto de compra</label>
                <input type="text" name="objeto" value="{{ request('objeto', '') }}"
                       class="w-full rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition"
                       placeholder=" Buscar por descripción del objeto">
            </div>

            <!-- Cantidad por página -->
            <div class="w-full sm:w-auto">
                <label class="block text-xs font-medium text-gray-700 mb-1">Por página</label>
                <select name="per_page"
                        class="w-32 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                    @foreach([10,20,30,50,100] as $opt)
                        <option value="{{ $opt }}" {{ (int)request('per_page', 20) === $opt ? 'selected' : '' }}>{{ $opt }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botón Buscar -->
            <div class="w-full sm:w-auto">
                <button type="submit"
                        class="w-full sm:w-auto bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2.5 px-5 rounded-md shadow-sm transition focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Buscar
                </button>
            </div>
        </form>
    </div>

    <!-- Ancla de resultados -->
    <div id="resultados"></div>

    @php
        $scrollTabla = isset($items) && $items->count() > 10;
        $maxHeight = $scrollTabla ? 'max-h-[30rem]' : '';
    @endphp

    <!-- Tabla de resultados mejorada -->
    <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                <h3 class="text-lg font-semibold text-gray-800">Resultados</h3>
                <p class="text-sm text-gray-600">
                    Proveedor: <strong>{{ request('proveedor') !== null && request('proveedor') !== '' ? request('proveedor') : 'Todos' }}</strong> •
                    Objeto: <strong>{{ request('objeto') !== null && request('objeto') !== '' ? request('objeto') : 'Todos' }}</strong> •
                    Registros en página: <strong>{{ isset($items) ? $items->count() : 0 }}</strong>
                </p>
            </div>
        </div>

        <div class="w-full overflow-x-auto {{ $maxHeight }} overflow-y-auto">
            <table class="min-w-full text-sm">
                <caption class="sr-only">Listado de compras y ejecuciones administrativas</caption>
                <thead class="sticky top-0 z-10">
                    <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                        @php
                            $thBase = "px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200";
                        @endphp
                        <th class="{{ $thBase }} w-20">ID</th>
                        <th class="{{ $thBase }} min-w-80">Objeto</th>
                        <th class="{{ $thBase }} w-32 text-right">Monto</th>
                        <th class="{{ $thBase }} w-40">Tipo Proceso</th>
                        <th class="{{ $thBase }} w-56">Proveedor</th>
                        <th class="{{ $thBase }} w-32">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($items as $row)
                        <tr class="odd:bg-gray-50/40 hover:bg-blue-50/60 transition-colors group">
                            {{-- ID --}}
                            <td class="px-4 py-3 text-gray-800 font-mono text-sm">
                                {{ $row->id }}
                            </td>

                            {{-- Objeto --}}
                            <td class="px-4 py-3 text-gray-900">
                                <div class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                    <span class="block break-words">
                                        {{ $row->objeto }}
                                    </span>
                                </div>
                            </td>

                            {{-- Monto --}}
                            <td class="px-4 py-3 text-gray-900 font-medium text-right">
                                @php
                                    // Intentar formatear el monto numéricamente si es posible
                                    $monto = $row->monto;
                                    if (is_numeric(str_replace(['$', ',', ' '], '', $monto))) {
                                        $numericValue = (float) str_replace(['$', ',', ' '], '', $monto);
                                        echo '$ ' . number_format($numericValue, 2, ',', '.');
                                    } else {
                                        echo $monto;
                                    }
                                @endphp
                            </td>

                            {{-- Tipo Proceso --}}
                            <td class="px-4 py-3 text-gray-800">
                                <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-1 text-xs font-medium text-gray-700 ring-1 ring-inset ring-gray-200 break-words max-w-full">
                                    {{ $row->tipo_proceso }}
                                </span>
                            </td>

                            {{-- Proveedor --}}
                            <td class="px-4 py-3 text-gray-800">
                                <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                    <span class="block break-words">
                                        {{ $row->proveedor }}
                                    </span>
                                </div>
                            </td>

                            {{-- Estado --}}
                            <td class="px-4 py-3">
                                @php
                                    $estadoColor = match(strtolower($row->estado)) {
                                        'completado', 'finalizado', 'aprobado' => 'bg-green-100 text-green-800 ring-green-200',
                                        'en proceso', 'en progreso', 'pendiente' => 'bg-yellow-100 text-yellow-800 ring-yellow-200',
                                        'cancelado', 'rechazado' => 'bg-red-100 text-red-800 ring-red-200',
                                        'licitación', 'contratación' => 'bg-blue-100 text-blue-800 ring-blue-200',
                                        default => 'bg-gray-100 text-gray-800 ring-gray-200'
                                    };
                                @endphp
                                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $estadoColor }} ring-1 ring-inset whitespace-nowrap">
                                    {{ $row->estado }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 italic">Sin resultados para los filtros indicados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($scrollTabla)
        <div class="px-4 py-2 bg-gray-50 border-t border-gray-200 text-xs text-gray-500 text-center">
            <span class="inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
                Desplázate para ver más registros
            </span>
        </div>
        @endif

        <!-- Paginación -->
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $items->appends(request()->query())->links() }}
        </div>
    </div>
</div>

{{-- Restaurar posición de scroll tras enviar el formulario --}}
<script>
  (function () {
    const form = document.getElementById('filtrosForm');
    if (!form) return;

    form.addEventListener('submit', function () {
      try { sessionStorage.setItem('edudata_admin_scrollY', String(window.scrollY || window.pageYOffset || 0)); } catch (e) {}
    });

    window.addEventListener('load', function () {
      try {
        const y = parseInt(sessionStorage.getItem('edudata_admin_scrollY') || '0', 10);
        if (!isNaN(y) && y > 0) { window.scrollTo({ top: y, behavior: 'instant' in window ? 'instant' : 'auto' }); }
      } catch (e) {}
    });
  })();
</script>
@endsection