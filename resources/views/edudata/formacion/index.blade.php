@extends('layouts.app')

@section('title', 'Edudata - Portal de Transparencia Educativa')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{  
            i: 0,
            imgs: [
                '{{ asset('images/bannerformacion1-v4.png') }}',
                '{{ asset('images/bannerformacion2-v4.png') }}'
            ],
            intervalId: null,
            start() { this.intervalId = setInterval(() => this.next(), 4000) },
            stop() { if (this.intervalId) clearInterval(this.intervalId) },
            next() { this.i = (this.i + 1) % this.imgs.length },
            prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
        }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative left-1/2 right-1/2 -mx-[50vw] w-screen mb-10"> {{-- Añadido mb-10 para espacio --}}
            <div class="relative w-full h-[100px] sm:h-[340px] md:h-[420px] lg:h-[435px] bg-gray-800">
                <!-- Slides -->
                <template x-for="(src, idx) in imgs" :key="idx">
                    <div x-show="i === idx" x-transition.opacity.duration.500ms
                        class="absolute inset-0 flex items-center justify-center">
                        <img :src="src" :alt="`Banner ${idx+1}`" class="w-full h-full object-contain"
                            loading="eager" fetchpriority="high" />
                    </div>
                </template>

                <!-- Controles -->
                <button @click="prev()"
                    class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white rounded-full p-2 shadow outline-none"
                    aria-label="Anterior">

                </button>
                <button @click="next()"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white rounded-full p-2 shadow outline-none"
                    aria-label="Siguiente">

                </button>

                <!-- Indicadores -->
                <div class="absolute bottom-3 w-full flex items-center justify-center gap-2">
                    <template x-for="(src, idx) in imgs" :key="idx">
                        <button @click="i = idx" class="h-2.5 w-2.5 rounded-full transition-all"
                            :class="i === idx ? 'bg-white w-4' : 'bg-white/20'" aria-label="Ir a la imagen"></button>
                    </template>
                </div>
            </div>
        </section>

        <!-- Tarjeta de filtros compacta en una sola línea -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-4 mb-10">
            <h2 class="text-base md:text-lg font-semibold text-gray-800 mb-3">Capacitaciones brindadas</h2>

            @php
                $anioActual = now()->year;
                // Lista de años descendente (ajusta el año inicial si querés acotar)
                $anios = array_reverse(range(2025, $anioActual));
            @endphp

            <form id="filtrosForm" method="GET" class="flex flex-wrap items-end gap-3">
                <!-- Año -->
                <div class="w-full sm:w-auto">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Año</label>
                    <select name="anio"
                        class="w-40 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                        <option value="">Todos</option>
                        @foreach ($anios as $a)
                            <option value="{{ $a }}" {{ request('anio') == $a ? 'selected' : '' }}>
                                {{ $a }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Mes -->
                <div class="w-full sm:w-auto">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Mes</label>
                    <select name="mes"
                        class="w-48 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                        <option value="">Todos</option>
                        @foreach (range(1, 12) as $m)
                            <option value="{{ $m }}" {{ request('mes') == $m ? 'selected' : '' }}>
                                {{ ucfirst(\Carbon\Carbon::create()->month($m)->locale('es')->isoFormat('MMMM')) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Localidad -->
                <div class="flex-1 min-w-[14rem]">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Localidad</label>
                    <input type="text" name="localidad" value="{{ request('localidad') }}"
                        class="w-full rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition"
                        placeholder="Buscar por localidad">
                </div>

                <!-- Modalidad -->
                <div class="w-full sm:w-auto">
                    <label class="block text-xs font-medium text-gray-700 mb-1">Modalidad</label>
                    <select name="modalidad"
                        class="w-48 rounded-md border border-gray-300 py-2 px-3 focus:border-gray-700 focus:ring-1 focus:ring-gray-700 transition">
                        <option value="">Todas</option>
                        <option value="Virtual" {{ request('modalidad') == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                        <option value="Presencial" {{ request('modalidad') == 'Presencial' ? 'selected' : '' }}>Presencial
                        </option>
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

        <!-- Ancla para resultados -->
        <div id="resultados"></div>

        {{-- ===== TABLA MEJORADA ===== --}}
        @php
            $scrollCaps = isset($capacitaciones) && $capacitaciones->count() > 15;
        @endphp

        <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden">
            <!-- Header resumen -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                    <h3 class="text-base md:text-lg font-semibold text-gray-800">
                        Capacitaciones registradas
                    </h3>
                    <p class="text-sm text-gray-600">
                        Año: <strong>{{ request('anio') ?: 'Todos' }}</strong> ·
                        Mes: <strong>
                            @if (request('mes'))
                                {{ ucfirst(\Carbon\Carbon::create()->month((int) request('mes'))->locale('es')->isoFormat('MMMM')) }}
                            @else
                                Todos
                            @endif
                        </strong> ·
                        Localidad: <strong>{{ request('localidad') ?: 'Todas' }}</strong> ·
                        Modalidad: <strong>{{ request('modalidad') ?: 'Todas' }}</strong> ·
                        Registros: <strong>{{ $capacitaciones->total() ?? $capacitaciones->count() }}</strong>
                    </p>
                </div>
            </div>

            <!-- Contenedor de tabla con scroll horizontal -->
            <div class="w-full overflow-x-auto">
                <table class="min-w-full text-sm">
                    <caption class="sr-only">Listado de capacitaciones</caption>
                    <thead class="sticky top-0 z-10">
                        <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                            @php
                                $thBase =
                                    'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200';
                            @endphp
                            <th class="{{ $thBase }} w-48">Oferente</th>
                            <th class="{{ $thBase }} min-w-80">Denominación</th>
                            <th class="{{ $thBase }} w-32">Tipo</th>
                            <th class="{{ $thBase }} w-32">Modalidad</th>
                            <th class="{{ $thBase }} w-40">Eje</th>
                            <th class="{{ $thBase }} w-32">Nivel</th>
                            <th class="{{ $thBase }} w-48">Localidad</th>
                            <th class="{{ $thBase }} w-56">Dirección</th>
                            <th class="{{ $thBase }} w-28">Inicio</th>
                            <th class="{{ $thBase }} w-32">Finalización</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse($capacitaciones as $cap)
                            <tr class="odd:bg-gray-50/40 hover:bg-blue-50/60 transition-colors group">
                                {{-- Oferente --}}
                                <td class="px-4 py-3 text-gray-900">
                                    <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words font-medium">
                                            {{ $cap->oferente }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Denominación --}}
                                <td class="px-4 py-3 text-gray-900">
                                    <div class="max-w-[20rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words">
                                            {{ $cap->denominacion_proyecto }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Tipo --}}
                                <td class="px-4 py-3 text-gray-800">
                                    <span
                                        class="inline-flex items-center rounded-md border border-gray-300 bg-white px-2 py-1 text-xs font-medium text-gray-700 whitespace-normal break-words">
                                        {{ $cap->tipo_proyecto }}
                                    </span>
                                </td>

                                {{-- Modalidad (badge con color) --}}
                                <td class="px-4 py-3">
                                    @php
                                        $isVirtual = \Illuminate\Support\Str::contains(
                                            $cap->modalidad,
                                            'Virtual',
                                            true,
                                        );
                                        $modClasses = $isVirtual
                                            ? 'bg-blue-50 text-blue-700 ring-1 ring-inset ring-blue-200'
                                            : 'bg-emerald-50 text-emerald-700 ring-1 ring-inset ring-emerald-200';
                                    @endphp
                                    <span
                                        class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $modClasses }} whitespace-nowrap">
                                        {{ $cap->modalidad }}
                                    </span>
                                </td>

                                {{-- Eje (pill neutro) --}}
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-gray-100 text-gray-700 px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-gray-200 break-words max-w-full">
                                        {{ $cap->eje }}
                                    </span>
                                </td>

                                {{-- Nivel (pill neutro) --}}
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-slate-100 text-slate-700 px-2.5 py-1 text-xs font-medium ring-1 ring-inset ring-slate-200 whitespace-nowrap">
                                        {{ $cap->nivel }}
                                    </span>
                                </td>

                                {{-- Localidad --}}
                                <td class="px-4 py-3 text-gray-800">
                                    <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words">
                                            {{ $cap->localidad }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Dirección --}}
                                <td class="px-4 py-3 text-gray-800">
                                    <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                        <span class="block break-words">
                                            {{ $cap->direccion }}
                                        </span>
                                    </div>
                                </td>

                                {{-- Fechas --}}
                                <td class="px-4 py-3 text-gray-900 whitespace-nowrap font-medium">
                                    {{ \Carbon\Carbon::parse($cap->fecha_inicio)->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-3 text-gray-900 whitespace-nowrap font-medium">
                                    {{ \Carbon\Carbon::parse($cap->fecha_finalizacion)->format('d/m/Y') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11" class="px-6 py-8 text-center text-gray-500 italic">
                                    No se encontraron capacitaciones con los filtros aplicados.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación -->
            <div class="p-4 border-t border-gray-100">
                {{ $capacitaciones->appends(request()->query())->links() }}
            </div>
        </div>
        {{-- ===== FIN TABLA MEJORADA ===== --}}

    </div>

    {{-- Restaurar posición de scroll tras enviar el formulario --}}
    <script>
        (function() {
            const form = document.getElementById('filtrosForm');
            if (!form) return;

            form.addEventListener('submit', function() {
                try {
                    sessionStorage.setItem('edudata_forma_scrollY', String(window.scrollY || window
                        .pageYOffset || 0));
                } catch (e) {}
            });

            window.addEventListener('load', function() {
                try {
                    const y = parseInt(sessionStorage.getItem('edudata_forma_scrollY') || '0', 10);
                    if (!isNaN(y) && y > 0) {
                        window.scrollTo({
                            top: y,
                            behavior: 'instant' in window ? 'instant' : 'auto'
                        });
                    }
                } catch (e) {}
            });
        })();
    </script>
@endsection
