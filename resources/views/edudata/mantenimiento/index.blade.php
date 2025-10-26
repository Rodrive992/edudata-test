@extends('layouts.app')

@section('title', 'Edudata - Mantenimiento Edilicio')

@section('content')
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* --- Estilos del archivero mejorado --- */
        .folder-tab {
            position: relative;
            border-radius: 0.75rem 0.75rem 0 0;
            box-shadow: 0 1px 0 0 rgba(0, 0, 0, .05) inset;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .folder-tab::before {
            content: "";
            position: absolute;
            left: -16px;
            top: 0;
            width: 16px;
            height: 100%;
            background: inherit;
            border-top-left-radius: 0.75rem;
            clip-path: polygon(100% 0, 100% 100%, 0 100%, 40% 0);
            box-shadow: -1px 0 0 rgba(0, 0, 0, .05) inset;
        }

        .folder-tab.is-active {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .12), 0 2px 8px rgba(0, 0, 0, .08);
            z-index: 40;
        }

        .folder-stack>button {
            transition: transform .3s ease, box-shadow .3s ease, filter .3s ease;
        }

        .folder-stack>button:hover {
            filter: brightness(1.05);
            transform: translateY(-2px);
        }

        /* Contenedor tipo carpeta */
        .folder-container {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border: 2px solid #e2e8f0;
            border-radius: 0 12px 12px 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            position: relative;
            overflow: hidden;
        }

        .folder-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, 
                #f59e0b 0%, 
                #3b82f6 50%, 
                #10b981 100%);
        }

        /* Tarjetas de contenido tipo ficha */
        .file-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .04);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .file-card::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: inherit;
        }

        .file-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, .1);
            border-color: #cbd5e1;
        }

        /* Cabeceras de sección mejoradas */
        .section-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 8px 8px 0 0;
            position: relative;
            overflow: hidden;
        }

        .section-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,.1) 50%, transparent 70%);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Formularios de búsqueda mejorados */
        .search-form {
            background: white;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .05);
            position: relative;
        }

        .search-form::before {
            content: "🔍";
            position: absolute;
            top: -12px;
            left: 20px;
            background: white;
            padding: 0 8px;
            font-size: 1.25rem;
        }

        /* Tablas mejoradas */
        .data-table {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .08);
            border: 1px solid #e2e8f0;
        }

        .data-table thead {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        .data-table th {
            border-bottom: 2px solid #e2e8f0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .data-table tbody tr {
            transition: all 0.2s ease;
        }

        .data-table tbody tr:hover {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            transform: scale(1.002);
        }

        /* Indicadores de scroll */
        .scroll-indicator {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-top: 1px solid #e2e8f0;
            padding: 0.75rem;
            font-size: 0.875rem;
            color: #64748b;
        }

        /* Badges de estado mejorados */
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
    </style>

    <div class="container mx-auto px-4 py-8">
        <!-- Tarjeta principal con encabezado de imagen -->
        <div class="bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden mb-10">
            <div class="p-6 pb-0">
                <div class="rounded-xl overflow-hidden mb-6">
                    <img src="{{ asset('images/titulo-mantenimiento.png') }}" alt="Mantenimiento Edilicio"
                        class="w-full h-full object-cover rounded-xl ">
                </div>

                <!-- Intro -->
                <div class="mb-6">
                    <div class="space-y-4">
                        <p class="text-gray-700 leading-relaxed text-xl">
                            La <span class="font-semibold text-blue-700">Dirección de Programación y Mantenimiento
                                Edilicio</span>
                            se encarga del <span class="bg-yellow-100 px-1 rounded">mantenimiento integral</span> de los
                            <span class="font-medium text-green-600">establecimientos escolares</span> de la provincia,
                            llevando a cabo las <span class="font-semibold">tareas diarias para conservar el estado
                                óptimo</span>
                            de los edificios educativos.
                        </p>

                        <!-- Tarjetas funcionales -->
                        <div
                            class="relative overflow-hidden rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 p-4 sm:p-6 lg:p-8 my-6 sm:my-8 shadow-lg border border-blue-200">
                            <div
                                class="absolute top-0 right-0 w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 bg-blue-200/30 rounded-full -translate-y-8 sm:-translate-y-12 lg:-translate-y-16 translate-x-8 sm:translate-x-12 lg:translate-x-16">
                            </div>
                            <div
                                class="absolute bottom-0 left-0 w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 bg-indigo-200/30 rounded-full translate-y-8 sm:translate-y-10 lg:translate-y-12 -translate-x-6 sm:-translate-x-8 lg:-translate-x-12">
                            </div>

                            <div class="relative z-10">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                                    <!-- Tarjeta 1 -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#f5cb58] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">01</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#f5cb58] to-[#ddb750] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Tareas de
                                            Mantenimiento</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Consulta el
                                            historial de realizadas, pendientes y comisiones, filtrado por establecimiento.
                                        </p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <a href="#tareas" rel="noopener"
                                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 sm:px-4 sm:py-2 bg-[#f5cb58] hover:bg-[#e5bb48] text-white font-semibold rounded-lg shadow-sm transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                </svg>
                                                Búsqueda avanzada
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 2 -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-[#6bbde5] hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-[#6bbde5] flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">02</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-[#6bbde5] to-[#5aadd5] flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Ubicación de
                                            Establecimientos</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Mapa
                                            completo con la localización de instituciones educativas provinciales.</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <a href="https://nimble-gumdrop-ccc062.netlify.app/" target="_blank"
                                                rel="noopener"
                                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 sm:px-4 sm:py-2 bg-[#6bbde5] hover:bg-[#5aadd5] text-white font-semibold rounded-lg shadow-sm transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                                Ver Establecimientos
                                            </a>
                                        </div>
                                    </div>

                                    <!-- Tarjeta 3 -->
                                    <div
                                        class="group relative bg-white/80 backdrop-blur-sm rounded-xl p-4 sm:p-6 border border-blue-100 hover:bg-white transition-all duration-300 hover:scale-105 shadow-sm flex flex-col h-full md:col-span-2 lg:col-span-1">
                                        <div class="absolute -top-2 -left-2 sm:-top-3 sm:-left-3">
                                            <div
                                                class="h-6 w-6 sm:h-8 sm:w-8 rounded-full bg-green-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xs sm:text-sm">03</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 sm:mb-4">
                                            <div
                                                class="h-10 w-10 sm:h-12 sm:w-12 rounded-lg bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center mb-2 sm:mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 sm:h-6 sm:w-6 text-white" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">Solicitudes de
                                            Mantenimiento</h4>
                                        <p class="text-gray-600 leading-relaxed flex-grow text-sm sm:text-base">Generá
                                            solicitudes si pertenecés a la comunidad educativa.</p>
                                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-gray-200">
                                            <a href="https://tad.catamarca.gob.ar/tramitesadistancia" target="_blank"
                                                rel="noopener"
                                                class="w-full inline-flex items-center justify-center gap-2 px-3 py-2 sm:px-4 sm:py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-sm transition-all duration-200 hover:scale-105 text-sm sm:text-base">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 sm:h-4 sm:w-4"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Realizar Solicitud
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-2 mt-4">
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-blue-500 rounded-full mr-2"></span>
                                Transparencia en la gestión
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Mantenimiento preventivo
                            </div>
                            <div class="inline-flex items-center bg-gray-100 px-3 py-1 rounded-full text-sm text-gray-700">
                                <span class="w-2 h-2 bg-purple-500 rounded-full mr-2"></span>
                                Comunidad educativa
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Archivero con inputs + tablas dentro de cada carpeta -->
                <div id="tareas" class="p-6 pt-4" x-data="archivero()" x-init="initFromQuery('{{ request('tarea', 'realizadas') }}')">

                    {{-- Pestañas --}}
                    <div class="folder-container mb-10">
                        <div class="folder-stack flex items-end gap-0 px-6 pt-6">
                            <template x-for="(tab, i) in tabs" :key="tab.key">
                                <button type="button" class="folder-tab px-6 py-4 mr-[-12px] border-2 border-b-0"
                                    :class="[
                                        'text-base font-bold',
                                        i === 0 ? '' : 'ml-4',
                                        active === tab.key ? 'is-active z-30 text-gray-900 border-gray-300' : 'z-10 text-gray-700 border-transparent',
                                        active === tab.key ? tab.activeBg : tab.bg
                                    ]"
                                    @click="switchTo(tab.key)" x-text="tab.label">
                                </button>
                            </template>
                        </div>

                        <!-- Paneles (renderizados SIEMPRE, visibles según pestaña) -->
                        <div class="border-t-0">

                            {{-- REALIZADAS --}}
                            <section x-show="active==='realizadas'" x-cloak class="p-8 space-y-8">
                                <!-- Formulario de búsqueda -->
                                <div class="search-form">
                                    <form method="GET" :action="currentUrlWithHash('#resultados')"
                                        class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                                        <input type="hidden" name="tarea" value="realizadas">
                                        <div class="md:col-span-8">
                                            <label class="block text-sm font-semibold text-gray-700 mb-3">Buscar Establecimiento</label>
                                            <div class="relative">
                                                <input type="text" name="establecimiento"
                                                    value="{{ request('establecimiento') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-3 px-4 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition-all duration-200 placeholder-gray-400"
                                                    placeholder="Ingrese el nombre del establecimiento educativo...">
                                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:col-span-4">
                                            <button type="submit"
                                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5">
                                                <span class="flex items-center justify-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                    Buscar Tareas
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    // Fallbacks seguros
                                    $regAPH = $registros['APH'] ?? collect();
                                    $regELEC = $registros['ELEC'] ?? collect();
                                    $regDEZM = $registros['DEZM'] ?? collect();

                                    $cntAPH = $regAPH->count();
                                    $cntELEC = $regELEC->count();
                                    $cntDEZM = $regDEZM->count();

                                    $scrollAPH = $cntAPH > 15;
                                    $scrollELEC = $cntELEC > 15;
                                    $scrollDEZM = $cntDEZM > 15;
                                @endphp

                                <!-- Resultados -->
                                <div id="resultados" class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                    <!-- APH -->
                                    <div class="file-card" style="border-left-color: #8b5cf6;">
                                        <div class="section-header" style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                                            <h3 class="text-lg font-bold text-white">Albañilería</h3>
                                            <p class="text-sm text-white/90 mt-1">Registros: <strong>{{ $cntAPH }}</strong></p>
                                        </div>
                                        <div class="p-6 {{ $scrollAPH ? 'max-h-96 overflow-y-auto pr-2' : '' }}">
                                            @forelse($regAPH as $r)
                                                <div class="border-l-4 border-purple-400 bg-purple-50/50 rounded-r-lg p-4 mb-3 last:mb-0 hover:bg-purple-100/50 transition-colors">
                                                    <div class="flex items-start justify-between">
                                                        <div class="flex-1">
                                                            <p class="font-semibold text-gray-800 text-sm">
                                                                <span class="text-purple-600 font-bold">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                                                - {{ $r->establecimiento }}
                                                            </p>
                                                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">{{ $r->tarea }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <p class="text-gray-500 italic">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                        @if ($scrollAPH)
                                            <div class="scroll-indicator">
                                                <span class="inline-flex items-center text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                    </svg>
                                                    Desplázate para ver más registros
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- ELEC -->
                                    <div class="file-card" style="border-left-color: #3b82f6;">
                                        <div class="section-header" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);">
                                            <h3 class="text-lg font-bold text-white">Electricidad</h3>
                                            <p class="text-sm text-white/90 mt-1">Registros: <strong>{{ $cntELEC }}</strong></p>
                                        </div>
                                        <div class="p-6 {{ $scrollELEC ? 'max-h-96 overflow-y-auto pr-2' : '' }}">
                                            @forelse($regELEC as $r)
                                                <div class="border-l-4 border-blue-400 bg-blue-50/50 rounded-r-lg p-4 mb-3 last:mb-0 hover:bg-blue-100/50 transition-colors">
                                                    <div class="flex items-start justify-between">
                                                        <div class="flex-1">
                                                            <p class="font-semibold text-gray-800 text-sm">
                                                                <span class="text-blue-600 font-bold">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                                                - {{ $r->establecimiento }}
                                                            </p>
                                                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">{{ $r->tarea }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                                    </svg>
                                                    <p class="text-gray-500 italic">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                        @if ($scrollELEC)
                                            <div class="scroll-indicator">
                                                <span class="inline-flex items-center text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                    </svg>
                                                    Desplázate para ver más registros
                                                </span>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- DEZM -->
                                    <div class="file-card" style="border-left-color: #10b981;">
                                        <div class="section-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                                            <h3 class="text-lg font-bold text-white">Desmalezamiento</h3>
                                            <p class="text-sm text-white/90 mt-1">Registros: <strong>{{ $cntDEZM }}</strong></p>
                                        </div>
                                        <div class="p-6 {{ $scrollDEZM ? 'max-h-96 overflow-y-auto pr-2' : '' }}">
                                            @forelse($regDEZM as $r)
                                                <div class="border-l-4 border-green-400 bg-green-50/50 rounded-r-lg p-4 mb-3 last:mb-0 hover:bg-green-100/50 transition-colors">
                                                    <div class="flex items-start justify-between">
                                                        <div class="flex-1">
                                                            <p class="font-semibold text-gray-800 text-sm">
                                                                <span class="text-green-600 font-bold">{{ \Carbon\Carbon::parse($r->fecha)->format('d/m') }}</span>
                                                                - {{ $r->establecimiento }}
                                                            </p>
                                                            <p class="text-gray-600 text-sm mt-2 leading-relaxed">{{ $r->tarea }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="text-center py-8">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                                    </svg>
                                                    <p class="text-gray-500 italic">Sin tareas registradas</p>
                                                </div>
                                            @endforelse
                                        </div>
                                        @if ($scrollDEZM)
                                            <div class="scroll-indicator">
                                                <span class="inline-flex items-center text-xs">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                    </svg>
                                                    Desplázate para ver más registros
                                                </span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </section>

                            {{-- PENDIENTES --}}
                            <section x-show="active==='pendientes'" x-cloak class="p-8 space-y-8">
                                <!-- Formulario de búsqueda -->
                                <div class="search-form">
                                    <form method="GET" :action="currentUrlWithHash('#resultados-pend')"
                                        class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                                        <input type="hidden" name="tarea" value="pendientes">
                                        <div class="md:col-span-8">
                                            <label class="block text-sm font-semibold text-gray-700 mb-3">Filtrar por Localidad</label>
                                            <div class="relative">
                                                <input type="text" name="localidad" value="{{ request('localidad') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-3 px-4 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 transition-all duration-200 placeholder-gray-400"
                                                    placeholder="Ingrese el nombre de la localidad...">
                                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:col-span-4">
                                            <button type="submit"
                                                class="w-full bg-gradient-to-r from-sky-600 to-sky-700 hover:from-sky-700 hover:to-sky-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5">
                                                <span class="flex items-center justify-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                    Buscar Pendientes
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    $pend = $pendientes ?? collect();
                                    $scrollPend = $pend->count() > 10;
                                    $maxHeightPend = $scrollPend ? 'max-h-[32rem]' : '';
                                @endphp

                                <!-- Resultados -->
                                <div id="resultados-pend" class="data-table">
                                    <div class="section-header" style="background: linear-gradient(135deg, #0ea5e9 0%, #0369a1 100%);">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <h3 class="text-lg font-bold text-white">Tareas Pendientes</h3>
                                            <div class="flex items-center gap-4 text-sm text-white/90">
                                                <span>Localidad: <strong>{{ request('localidad') ?: 'Todas' }}</strong></span>
                                                <span>•</span>
                                                <span>Registros: <strong>{{ $pend->count() }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full overflow-x-auto {{ $maxHeightPend }} overflow-y-auto">
                                        <table class="min-w-full text-sm">
                                            <caption class="sr-only">Listado de tareas pendientes</caption>
                                            <thead class="sticky top-0 z-10">
                                                <tr class="bg-gradient-to-r from-sky-50 to-blue-50">
                                                    @php $thBase='px-6 py-4 text-left text-xs font-bold tracking-wider uppercase text-sky-800 border-b-2 border-sky-200'; @endphp
                                                    <th class="{{ $thBase }} w-48">Localidad</th>
                                                    <th class="{{ $thBase }} w-56">Establecimiento</th>
                                                    <th class="{{ $thBase }} min-w-80">Pedido</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-sky-100">
                                                @forelse($pend as $p)
                                                    <tr class="hover:bg-gradient-to-r hover:from-sky-50/80 hover:to-blue-50/80 transition-all duration-200 group">
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words font-semibold text-sky-900">{{ $p->localidad }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words text-gray-800">{{ $p->establecimiento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words text-gray-600 leading-relaxed">{{ $p->pedido }}</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="px-6 py-12 text-center">
                                                            <div class="flex flex-col items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 16.5c-.77.833.192 2.5 1.732 2.5z" />
                                                                </svg>
                                                                <p class="text-gray-500 text-lg font-medium">No hay tareas pendientes</p>
                                                                <p class="text-gray-400 text-sm mt-1">Todos los mantenimientos están al día</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($scrollPend)
                                        <div class="scroll-indicator">
                                            <span class="inline-flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                                Desplázate para ver más registros de tareas pendientes
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </section>

                            {{-- COMISIONES --}}
                            <section x-show="active==='comisiones'" x-cloak class="p-8 space-y-8">
                                <!-- Formulario de búsqueda -->
                                <div class="search-form">
                                    <form method="GET" :action="currentUrlWithHash('#resultados-com')"
                                        class="grid grid-cols-1 md:grid-cols-12 gap-6 items-end">
                                        <input type="hidden" name="tarea" value="comisiones">
                                        <div class="md:col-span-8">
                                            <label class="block text-sm font-semibold text-gray-700 mb-3">Buscar Comisiones</label>
                                            <div class="relative">
                                                <input type="text" name="q" value="{{ request('q') }}"
                                                    class="w-full rounded-lg border-2 border-gray-300 py-3 px-4 focus:border-emerald-500 focus:ring-4 focus:ring-emerald-200 transition-all duration-200 placeholder-gray-400"
                                                    placeholder="Buscar por localidad o establecimiento...">
                                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="md:col-span-4">
                                            <button type="submit"
                                                class="w-full bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5">
                                                <span class="flex items-center justify-center gap-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                                    </svg>
                                                    Buscar Comisiones
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                @php
                                    $com = $comisiones ?? collect();
                                    $scrollCom = $com->count() > 10;
                                    $maxHeightCom = $scrollCom ? 'max-h-[32rem]' : '';
                                @endphp

                                <!-- Resultados -->
                                <div id="resultados-com" class="data-table">
                                    <div class="section-header" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2">
                                            <h3 class="text-lg font-bold text-white">Comisiones de Servicio</h3>
                                            <div class="flex items-center gap-3 text-sm text-white/90">
                                                <span>Año: <strong>{{ request('anio') ?: 'Todos' }}</strong></span>
                                                <span>•</span>
                                                <span>Mes: <strong>
                                                    @if (request('mes'))
                                                        {{ ucfirst(\Carbon\Carbon::create()->month((int) request('mes'))->locale('es')->isoFormat('MMMM')) }}
                                                    @else
                                                        Todos
                                                    @endif
                                                </strong></span>
                                                <span>•</span>
                                                <span>Registros: <strong>{{ $com->count() }}</strong></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full overflow-x-auto {{ $maxHeightCom }} overflow-y-auto">
                                        <table class="min-w-full text-sm">
                                            <caption class="sr-only">Listado de comisiones de servicio</caption>
                                            <thead class="sticky top-0 z-10">
                                                <tr class="bg-gradient-to-r from-emerald-50 to-green-50">
                                                    @php $thBase='px-6 py-4 text-left text-xs font-bold tracking-wider uppercase text-emerald-800 border-b-2 border-emerald-200'; @endphp
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
                                            <tbody class="divide-y divide-emerald-100">
                                                @forelse($com as $c)
                                                    <tr class="hover:bg-gradient-to-r hover:from-emerald-50/80 hover:to-green-50/80 transition-all duration-200 group">
                                                        <td class="px-6 py-4 text-emerald-900 whitespace-nowrap font-semibold">
                                                            {{ \Carbon\Carbon::parse($c->fecha)->format('d/m/Y') }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[16rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words text-gray-800">{{ $c->establecimiento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[12rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words text-gray-800">{{ $c->localidad }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[10rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words text-gray-800">{{ $c->departamento }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="max-w-[24rem] group-hover:max-w-none transition-all duration-200">
                                                                <span class="block break-words text-gray-600 leading-relaxed">{{ $c->detalle_obra }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4 text-emerald-900 text-center font-semibold">
                                                            {{ $c->personas }}
                                                        </td>
                                                        <td class="px-6 py-4 text-emerald-900 text-center font-semibold">
                                                            {{ $c->dias }}
                                                        </td>
                                                        <td class="px-6 py-4 text-emerald-900 text-center font-semibold">
                                                            {{ $c->agentes }}
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @php
                                                                $estadoColor = match (strtolower($c->estado)) {
                                                                    'completado', 'finalizado' => 'bg-green-100 text-green-800 border-green-200',
                                                                    'en proceso', 'en progreso' => 'bg-blue-100 text-blue-800 border-blue-200',
                                                                    'pendiente' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                                                    'cancelado' => 'bg-red-100 text-red-800 border-red-200',
                                                                    default => 'bg-gray-100 text-gray-800 border-gray-200',
                                                                };
                                                            @endphp
                                                            <span class="status-badge {{ $estadoColor }} border">
                                                                {{ $c->estado }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="9" class="px-6 py-12 text-center">
                                                            <div class="flex flex-col items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                                                </svg>
                                                                <p class="text-gray-500 text-lg font-medium">No hay comisiones registradas</p>
                                                                <p class="text-gray-400 text-sm mt-1">No se encontraron comisiones con los filtros aplicados</p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($scrollCom)
                                        <div class="scroll-indicator">
                                            <span class="inline-flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                                </svg>
                                                Desplázate para ver más registros de comisiones
                                            </span>
                                        </div>
                                    @endif
                                </div>
                            </section>

                        </div>

                        {{-- Tira indicadora --}}
                        <div class="h-2"
                            :class="{
                                'bg-gradient-to-r from-amber-400 via-yellow-500 to-amber-600': active==='realizadas',
                                'bg-gradient-to-r from-sky-400 via-blue-500 to-sky-600': active==='pendientes',
                                'bg-gradient-to-r from-emerald-400 via-green-500 to-emerald-600': active==='comisiones'
                            }">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Alpine: controlador del archivero --}}
    <script>
        function archivero() {
            return {
                tabs: [{
                        key: 'realizadas',
                        label: 'Realizadas',
                        bg: 'bg-amber-100 text-amber-800',
                        activeBg: 'bg-amber-200 text-amber-900'
                    },
                    {
                        key: 'pendientes',
                        label: 'Pendientes',
                        bg: 'bg-sky-100 text-sky-800',
                        activeBg: 'bg-sky-200 text-sky-900'
                    },
                    {
                        key: 'comisiones',
                        label: 'Comisiones',
                        bg: 'bg-emerald-100 text-emerald-800',
                        activeBg: 'bg-emerald-200 text-emerald-900'
                    },
                ],
                active: 'realizadas', // siempre por defecto

                initFromQuery(serverSelected) {
                    const url = new URL(window.location.href);
                    const q = url.searchParams.get('tarea');

                    // Siempre priorizamos 'realizadas' si no viene nada
                    this.active = (q && ['realizadas', 'pendientes', 'comisiones'].includes(q)) ?
                        q :
                        'realizadas';

                    // Si faltaba en la URL, lo agregamos (sin romper el historial del usuario)
                    if (!q) {
                        url.searchParams.set('tarea', 'realizadas');
                        window.history.replaceState({}, '', url.toString());
                    }
                },

                switchTo(key) {
                    if (this.active === key) return;
                    this.active = key;
                    this.pushUrl(key, true);
                },

                pushUrl(key, replace) {
                    const url = new URL(window.location.href);
                    url.searchParams.set('tarea', key);

                    // Mantener la URL limpia: eliminamos filtros de otras pestañas
                    if (key !== 'realizadas') url.searchParams.delete('establecimiento');
                    if (key !== 'pendientes') url.searchParams.delete('localidad');
                    if (key !== 'comisiones') {
                        url.searchParams.delete('q');
                        url.searchParams.delete('anio');
                        url.searchParams.delete('mes');
                    }

                    const fn = replace ? 'replaceState' : 'pushState';
                    window.history[fn]({}, '', url.toString());
                },

                currentUrlWithHash(hash) {
                    const url = new URL(window.location.href);
                    return url.pathname + (url.search || '') + (hash || '');
                }
            }
        }
    </script>
@endsection