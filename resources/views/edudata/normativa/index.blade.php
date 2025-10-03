@extends('layouts.app')

@section('title', 'Edudata - Normativa')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/bannernormativa1-v4.png') }}',
                '{{ asset('images/bannernormativa2-v4.png') }}'
            ],
            intervalId: null,
            start() { this.intervalId = setInterval(() => this.next(), 4000) },
            stop() { if (this.intervalId) clearInterval(this.intervalId) },
            next() { this.i = (this.i + 1) % this.imgs.length },
            prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
        }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative left-1/2 right-1/2 -mx-[50vw] w-screen mb-10">
            <div class="relative w-full h-[100px] sm:h-[340px] md:h-[420px] lg:h-[435px] bg-gray-800">
                <template x-for="(src, idx) in imgs" :key="idx">
                    <div x-show="i === idx" x-transition.opacity.duration.500ms
                         class="absolute inset-0 flex items-center justify-center">
                        <img :src="src" :alt="`Banner ${idx+1}`" class="w-full h-full object-contain"
                             loading="eager" fetchpriority="high" />
                    </div>
                </template>

                <button @click="prev()" class="absolute left-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white rounded-full p-2 shadow outline-none" aria-label="Anterior">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button @click="next()" class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white rounded-full p-2 shadow outline-none" aria-label="Siguiente">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                <div class="absolute bottom-3 w-full flex items-center justify-center gap-2">
                    <template x-for="(src, idx) in imgs" :key="idx">
                        <button @click="i = idx" class="h-2.5 w-2.5 rounded-full transition-all"
                                :class="i === idx ? 'bg-white w-4' : 'bg-white/20'" aria-label="Ir a la imagen"></button>
                    </template>
                </div>
            </div>
        </section>

        {{-- Tarjeta de búsqueda mejorada con colores grises --}}
        <div class="max-w-5xl mx-auto mb-8">
            <div class="bg-gradient-to-r from-gray-50 to-gray-100 rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 pt-6 pb-4 border-b border-gray-200 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 rounded-lg bg-gray-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">Buscar normativa</h2>
                    </div>
                    @if(($digestos->total() ?? 0) > 0)
                        <span class="inline-flex items-center rounded-full bg-gray-200 text-gray-800 text-sm font-medium px-3 py-1">
                            {{ $digestos->total() }} resultados
                        </span>
                    @endif
                </div>

                <div class="p-6">
                    <form action="{{ route('edudata.normativa') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-[1fr_auto_auto] gap-4">
                        <div class="relative">
                            <input
                                type="text"
                                name="q"
                                value="{{ $q ?? '' }}"
                                placeholder="Buscar por título, descripción o palabras clave…"
                                class="w-full rounded-xl border-gray-300 focus:border-gray-600 focus:ring-2 focus:ring-gray-200 pl-12 py-3.5 text-gray-800 shadow-sm transition-all duration-200"
                                aria-label="Buscar por título o descripción"
                            />
                            <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>

                        <button type="submit"
                                class="inline-flex items-center justify-center px-5 py-3.5 rounded-xl border border-gray-700 bg-gray-700 text-white hover:bg-gray-800 hover:border-gray-800 font-medium shadow-sm transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                            Buscar
                        </button>

                        @if(!empty($q))
                            <a href="{{ route('edudata.normativa') }}"
                               class="inline-flex items-center justify-center px-5 py-3.5 rounded-xl border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium shadow-sm transition-colors duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                                Limpiar
                            </a>
                        @endif
                    </form>

                    {{-- Meta info / estado --}}
                    <div class="mt-4 text-sm text-gray-700 flex items-center">
                        @if(($digestos->total() ?? 0) > 0)
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Mostrando {{ $digestos->firstItem() }}–{{ $digestos->lastItem() }} de {{ $digestos->total() }} resultados
                            @if(!empty($q)) para <span class="font-medium text-gray-900">"{{ $q }}"</span>@endif
                        @else
                            @if(!empty($q))
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                                No se encontraron resultados para <span class="font-medium text-gray-900">"{{ $q }}"</span>.
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                </svg>
                                No hay normativas cargadas por el momento.
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Listado mejorado con colores grises --}}
        <div class="max-w-5xl mx-auto">
            @if(session('error'))
                <div class="mb-4 rounded-xl bg-gray-100 border border-gray-300 text-gray-800 px-4 py-3 flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between bg-gradient-to-r from-gray-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-lg bg-gray-200 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900">Normativas</h3>
                    </div>
                    @if(!empty($q))
                        <span class="text-sm text-gray-700 font-medium bg-gray-200 px-3 py-1.5 rounded-lg">Filtro activo: “{{ $q }}”</span>
                    @endif
                </div>

                @if(($digestos->count() ?? 0) > 0)
                    {{-- Contenedor scrollable en pantallas md+ --}}
                    <div class="md:max-h-[520px] md:overflow-y-auto">
                        <ul role="list" class="divide-y divide-gray-200">
                            @foreach($digestos as $dig)
                                <li class="hover:bg-gray-50 transition-colors duration-200">
                                    <div class="px-6 py-5 flex items-center justify-between gap-4">
                                        <div class="flex items-start gap-4 min-w-0 flex-1">
                                            {{-- Ícono PDF/archivo mejorado --}}
                                            <div class="flex-shrink-0 mt-0.5">
                                                <div class="h-12 w-12 rounded-xl border border-gray-300 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center shadow-sm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M7 3h6l5 5v13a1 1 0 01-1 1H7a1 1 0 01-1-1V4a1 1 0 011-1z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M13 3v5h5"/>
                                                    </svg>
                                                </div>
                                            </div>

                                            <div class="min-w-0 flex-1">
                                                <h4 class="text-base font-semibold text-gray-900 truncate">
                                                    {{ $dig->titulo }}
                                                </h4>
                                                <div class="mt-1 flex items-center text-sm text-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                                    </svg>
                                                    {{-- CORRECCIÓN: Verificar si created_at no es null --}}
                                                    @if($dig->created_at)
                                                        {{ $dig->created_at->format('d/m/Y') }}
                                                    @else
                                                        Fecha no disponible
                                                    @endif
                                                </div>
                                                @if(!empty($q))
                                                    <p class="mt-1.5 text-xs text-gray-700 font-medium bg-gray-200 px-2 py-1 rounded inline-flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                                                        </svg>
                                                        Coincidencia en búsqueda
                                                    </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="flex items-center gap-2 flex-shrink-0">
                                            <a href="{{ route('edudata.normativa.show', $dig->id) }}"
                                               class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium rounded-xl border border-gray-700 bg-gray-700 text-white hover:bg-gray-800 hover:border-gray-800 focus:outline-none shadow-sm transition-colors duration-200 group"
                                               aria-label="Ver normativa: {{ $dig->titulo }}">
                                                Ver documento
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover:translate-x-0.5 transition-transform" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Paginación mejorada --}}
                    <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                        {{ $digestos->onEachSide(1)->links() }}
                    </div>
                @else
                    <div class="p-10 text-center text-gray-600">
                        <div class="mx-auto h-16 w-16 rounded-full bg-gray-200 flex items-center justify-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        @if(!empty($q))
                            <p class="text-lg font-medium text-gray-800 mb-1">No hay resultados para tu búsqueda</p>
                            <p class="text-sm">Intenta con otros términos o <a href="{{ route('edudata.normativa') }}" class="text-gray-700 hover:underline font-medium">ver todas las normativas</a></p>
                        @else
                            <p class="text-lg font-medium text-gray-800 mb-1">Aún no hay normativas disponibles</p>
                            <p class="text-sm">Vuelve pronto para consultar las normativas actualizadas</p>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection