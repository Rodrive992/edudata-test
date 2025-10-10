@extends('layouts.app')

@section('title', 'Edudata - Mantenimiento Edilicio')

@section('content')
    <div class="container mx-auto px-4 ">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/bannermantenimiento1-v4.png') }}',
                '{{ asset('images/bannermantenimineto2-v4.png') }}'
            ],
            intervalId: null,
            start() { this.intervalId = setInterval(() => this.next(), 4000) },
            stop() { if (this.intervalId) clearInterval(this.intervalId) },
            next() { this.i = (this.i + 1) % this.imgs.length },
            prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
        }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative left-1/2 right-1/2 -mx-[50vw] w-screen mb-10"> {{-- Añadido mb-10 para espacio --}}
            <div class="relative w-full h-[100px] sm:h-[340px] md:h-[420px] lg:h-[435px] bg-gray-900">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()"
                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white rounded-full p-2 shadow outline-none"
                    aria-label="Siguiente">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
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
        @php $tareaSel = request('tarea', 'realizadas'); @endphp

        <!-- Tarjeta de filtros mejorada -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-10"> {{-- Aumentado padding a p-6 --}}
            <h2 class="text-lg font-semibold text-gray-800 mb-6">Tareas de mantenimiento edilicio</h2> {{-- Aumentado mb-6 --}}

            <form id="filtrosForm" method="GET" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <!-- Tarea (siempre) -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tareas</label> {{-- Aumentado mb-2 --}}
                    <select name="tarea"
                        class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition text-sm">
                        {{-- Aumentado padding y focus ring --}}
                        <option value="realizadas" {{ $tareaSel === 'realizadas' ? 'selected' : '' }}>Realizadas</option>
                        <option value="pendientes" {{ $tareaSel === 'pendientes' ? 'selected' : '' }}>Pendientes</option>
                        <option value="comisiones" {{ $tareaSel === 'comisiones' ? 'selected' : '' }}>Comisiones</option>
                    </select>
                </div>

                @if ($tareaSel === 'realizadas')
                    <!-- Establecimiento -->
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Establecimiento</label>
                        <input type="text" name="establecimiento" value="{{ request('establecimiento') }}"
                            class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition"
                            placeholder="Buscar establecimiento">
                    </div>
                @endif

                @if ($tareaSel === 'pendientes')
                    <!-- Localidad -->
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Localidad</label>
                        <input type="text" name="localidad" value="{{ request('localidad') }}"
                            class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition"
                            placeholder="Filtrar por localidad">
                    </div>
                @endif

                @if ($tareaSel === 'comisiones')
                    <!-- Búsqueda -->
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Buscar</label>
                        <input type="text" name="q" value="{{ request('q') }}"
                            class="w-full rounded-md border border-gray-300 py-2.5 px-3 focus:border-gray-700 focus:ring-2 focus:ring-gray-700 transition"
                            placeholder="Localidad o establecimiento">
                    </div>
                @endif

                <!-- Botón Buscar -->
                <div class="md:col-span-2">
                    <button type="submit"
                        class="w-full bg-gray-800 hover:bg-gray-700 text-white font-semibold py-2.5 px-5 rounded-md shadow-sm transition focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Buscar
                    </button>
                </div>


                <!-- Nuevo botón: Establecimientos -->
                <div class="md:col-span-2">
                    <a href="https://nimble-gumdrop-ccc062.netlify.app/" target="_blank" rel="noopener"
                        class="w-full inline-flex justify-center items-center text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-md shadow-sm transition focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Establecimientos
                    </a>
                </div>


                <!-- Botón Enlace Externo -->
                <div class="md:col-span-2">
                    <a href="https://tad.catamarca.gob.ar/tramitesadistancia" target="_blank" rel="noopener"
                        class="w-full inline-flex justify-center items-center text-center border border-gray-300 hover:border-gray-400 text-gray-800 font-semibold py-2.5 px-4 rounded-md transition">
                        Solicitud
                    </a>
                </div>
            </form>
        </div>

        <!-- Ancla de resultados para que el navegador baje aquí tras buscar -->
        <div id="resultados"></div>

        {{-- CONTENIDOS SEGÚN TAREA --}}
        @if ($tareaSel === 'realizadas')
            @php
                $cntAPH = isset($registros['APH']) ? $registros['APH']->count() : 0;
                $cntELEC = isset($registros['ELEC']) ? $registros['ELEC']->count() : 0;
                $cntDEZM = isset($registros['DEZM']) ? $registros['DEZM']->count() : 0;

                $scrollAPH = $cntAPH > 15;
                $scrollELEC = $cntELEC > 15;
                $scrollDEZM = $cntDEZM > 15;
            @endphp

            <!-- Tarjetas por tipo de tarea -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- APH -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-purple-100/50 px-4 py-3 border-b border-purple-200/50">
                        <h3 class="text-lg font-bold text-purple-800">Albañilería - Plomería - Herrería</h3>
                        <p class="text-xs text-purple-800/80">Registros: <strong>{{ $cntAPH }}</strong></p>
                    </div>
                    <div class="p-4 {{ $scrollAPH ? 'max-h-96 overflow-y-auto pr-1' : '' }}">
                        @forelse(($registros['APH'] ?? []) as $r)
                            <div class="border-b border-gray-100 last:border-0 py-3">
                                <p class="font-medium text-gray-800">
                                    <span
                                        class="text-purple-600">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                    -
                                    {{ $r->establecimiento }}
                                </p>
                                <p class="text-gray-600 text-sm mt-1">{{ $r->tarea }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 italic py-3">Sin tareas registradas</p>
                        @endforelse
                    </div>
                </div>

                <!-- ELEC -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-blue-100/50 px-4 py-3 border-b border-blue-200/50">
                        <h3 class="text-lg font-bold text-blue-800">Electricidad</h3>
                        <p class="text-xs text-blue-800/80">Registros: <strong>{{ $cntELEC }}</strong></p>
                    </div>
                    <div class="p-4 {{ $scrollELEC ? 'max-h-96 overflow-y-auto pr-1' : '' }}">
                        @forelse(($registros['ELEC'] ?? []) as $r)
                            <div class="border-b border-gray-100 last:border-0 py-3">
                                <p class="font-medium text-gray-800">
                                    <span
                                        class="text-blue-600">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                    -
                                    {{ $r->establecimiento }}
                                </p>
                                <p class="text-gray-600 text-sm mt-1">{{ $r->tarea }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 italic py-3">Sin tareas registradas</p>
                        @endforelse
                    </div>
                </div>

                <!-- DEZM -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-green-100/50 px-4 py-3 border-b border-green-200/50">
                        <h3 class="text-lg font-bold text-green-800">Desmalezamiento</h3>
                        <p class="text-xs text-green-800/80">Registros: <strong>{{ $cntDEZM }}</strong></p>
                    </div>
                    <div class="p-4 {{ $scrollDEZM ? 'max-h-96 overflow-y-auto pr-1' : '' }}">
                        @forelse(($registros['DEZM'] ?? []) as $r)
                            <div class="border-b border-gray-100 last:border-0 py-3">
                                <p class="font-medium text-gray-800">
                                    <span
                                        class="text-green-600">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                    -
                                    {{ $r->establecimiento }}
                                </p>
                                <p class="text-gray-600 text-sm mt-1">{{ $r->tarea }}</p>
                            </div>
                        @empty
                            <p class="text-gray-500 italic py-3">Sin tareas registradas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @endif

        @if ($tareaSel === 'pendientes')
            @php
                $scrollPend = isset($pendientes) && $pendientes->count() > 10;
                $maxHeight = $scrollPend ? 'max-h-[30rem]' : '';
            @endphp
            <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden mb-12">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                        <h3 class="text-lg font-semibold text-gray-800">Tareas pendientes</h3>
                        <p class="text-sm text-gray-600">
                            Localidad: <strong>{{ request('localidad') ?: 'Todas' }}</strong> •
                            Registros: <strong>{{ $pendientes->count() }}</strong>
                        </p>
                    </div>
                </div>

                <div class="w-full overflow-x-auto {{ $maxHeight }} overflow-y-auto">
                    <table class="min-w-full text-sm">
                        <caption class="sr-only">Listado de tareas pendientes</caption>
                        <thead class="sticky top-0 z-10">
                            <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                                @php
                                    $thBase =
                                        'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200';
                                @endphp
                                <th class="{{ $thBase }} w-48">Localidad</th>
                                <th class="{{ $thBase }} w-56">Establecimiento</th>
                                <th class="{{ $thBase }} min-w-80">Pedido</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pendientes as $p)
                                <tr class="odd:bg-gray-50/40 hover:bg-orange-50/60 transition-colors group">
                                    {{-- Localidad --}}
                                    <td class="px-4 py-3 text-gray-900">
                                        <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words font-medium">
                                                {{ $p->localidad }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Establecimiento --}}
                                    <td class="px-4 py-3 text-gray-900">
                                        <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words">
                                                {{ $p->establecimiento }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Pedido --}}
                                    <td class="px-4 py-3 text-gray-600">
                                        <div class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words">
                                                {{ $p->pedido }}
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500 italic">Sin pendientes
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($scrollPend)
                    <div class="px-4 py-2 bg-gray-50 border-t border-gray-200 text-xs text-gray-500 text-center">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                            Desplázate para ver más registros
                        </span>
                    </div>
                @endif
            </div>
        @endif

        @if ($tareaSel === 'comisiones')
            @php
                $scrollCom = isset($comisiones) && $comisiones->count() > 10;
                $maxHeight = $scrollCom ? 'max-h-[30rem]' : '';
            @endphp
            <div class="bg-white rounded-2xl shadow-md border border-gray-200 overflow-hidden mb-12">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                        <h3 class="text-lg font-semibold text-gray-800">Comisiones de servicio</h3>
                        <p class="text-sm text-gray-600">
                            Año: <strong>{{ request('anio') ?: 'Todos' }}</strong> •
                            Mes: <strong>
                                @if (request('mes'))
                                    {{ ucfirst(\Carbon\Carbon::create()->month((int) request('mes'))->locale('es')->isoFormat('MMMM')) }}
                                @else
                                    Todos
                                @endif
                            </strong> •
                            Búsqueda: <strong>{{ request('q') ?: '—' }}</strong> •
                            Registros: <strong>{{ $comisiones->count() }}</strong>
                        </p>
                    </div>
                </div>

                <div class="w-full overflow-x-auto {{ $maxHeight }} overflow-y-auto">
                    <table class="min-w-full text-sm">
                        <caption class="sr-only">Listado de comisiones de servicio</caption>
                        <thead class="sticky top-0 z-10">
                            <tr class="bg-white/80 backdrop-blur supports-[backdrop-filter]:bg-white/60">
                                @php
                                    $thBase =
                                        'px-4 py-3 text-left text-xs font-semibold tracking-wider uppercase text-gray-700 border-b-2 border-gray-200';
                                @endphp
                                <th class="{{ $thBase }} w-28">Fecha</th>
                                <th class="{{ $thBase }} w-56">Establecimiento</th>
                                <th class="{{ $thBase }} w-48">Localidad</th>
                                <th class="{{ $thBase }} w-40">Departamento</th>
                                <th class="{{ $thBase }} min-w-80">Detalle</th>
                                <th class="{{ $thBase }} w-20 text-center">Personas</th>
                                <th class="{{ $thBase }} w-20 text-center">Días</th>
                                <th class="{{ $thBase }} w-24 text-center">Agentes</th>
                                <th class="{{ $thBase }} w-32">Estado</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($comisiones as $c)
                                <tr class="odd:bg-gray-50/40 hover:bg-blue-50/60 transition-colors group">
                                    {{-- Fecha --}}
                                    <td class="px-4 py-3 text-gray-900 whitespace-nowrap font-medium">
                                        {{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}
                                    </td>

                                    {{-- Establecimiento --}}
                                    <td class="px-4 py-3 text-gray-900">
                                        <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words">
                                                {{ $c->establecimiento }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Localidad --}}
                                    <td class="px-4 py-3 text-gray-900">
                                        <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words">
                                                {{ $c->localidad }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Departamento --}}
                                    <td class="px-4 py-3 text-gray-900">
                                        <div class="max-w-[10rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words">
                                                {{ $c->departamento }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Detalle --}}
                                    <td class="px-4 py-3 text-gray-600">
                                        <div class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                            <span class="block break-words">
                                                {{ $c->detalle_obra }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Personas --}}
                                    <td class="px-4 py-3 text-gray-800 text-center">
                                        {{ $c->personas }}
                                    </td>

                                    {{-- Días --}}
                                    <td class="px-4 py-3 text-gray-800 text-center">
                                        {{ $c->dias }}
                                    </td>

                                    {{-- Agentes --}}
                                    <td class="px-4 py-3 text-gray-800 text-center">
                                        {{ $c->agentes }}
                                    </td>

                                    {{-- Estado --}}
                                    <td class="px-4 py-3">
                                        @php
                                            $estadoColor = match (strtolower($c->estado)) {
                                                'completado',
                                                'finalizado'
                                                    => 'bg-green-100 text-green-800 ring-green-200',
                                                'en proceso',
                                                'en progreso'
                                                    => 'bg-blue-100 text-blue-800 ring-blue-200',
                                                'pendiente' => 'bg-yellow-100 text-yellow-800 ring-yellow-200',
                                                'cancelado' => 'bg-red-100 text-red-800 ring-red-200',
                                                default => 'bg-gray-100 text-gray-800 ring-gray-200',
                                            };
                                        @endphp
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold {{ $estadoColor }} ring-1 ring-inset whitespace-nowrap">
                                            {{ $c->estado }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-8 text-center text-gray-500 italic">Sin comisiones
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($scrollCom)
                    <div class="px-4 py-2 bg-gray-50 border-t border-gray-200 text-xs text-gray-500 text-center">
                        <span class="inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                            Desplázate para ver más registros
                        </span>
                    </div>
                @endif
            </div>
        @endif
    </div>

    {{-- OPCIONAL: restaurar posición exacta de scroll tras enviar el formulario --}}
    <script>
        (function() {
            const form = document.getElementById('filtrosForm');
            if (!form) return;

            form.addEventListener('submit', function() {
                try {
                    sessionStorage.setItem('edudata_mant_scrollY', String(window.scrollY || window
                        .pageYOffset || 0));
                } catch (e) {}
            });

            window.addEventListener('load', function() {
                try {
                    const y = parseInt(sessionStorage.getItem('edudata_mant_scrollY') || '0', 10);
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
