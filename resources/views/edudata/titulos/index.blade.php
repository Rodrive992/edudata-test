@extends('layouts.app')

@section('title', 'Edudata - Legalización y Registro de Títulos')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/bannertitulos1-v4.png') }}',
                '{{ asset('images/bannertitulos2-v4.png') }}'
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

        <!-- Presentación -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Transformación Digital</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    Desde el 01/01/2024, la Dirección de Legalización y Registro de Títulos afrontó una modificación
                    sustancial en la emisión de títulos, representando un cambio de paradigmas de gestión para los
                    Establecimientos Educativos de Nivel Secundario y Superior de nuestra provincia.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Objetivo Principal</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    Acercar y poner a disposición de los egresados sus títulos en tiempos acordes a la fecha de egreso,
                    avanzando en la despapelización de los procesos mediante la implementación del Sistema de Título
                    Digital.
                </p>
            </div>
        </div>

        <!-- Normativa Aplicable -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Normativa Aplicable al Área</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                        <h4 class="text-lg font-semibold text-blue-800 mb-3">Resoluciones CFE</h4>
                        <ul class="list-disc pl-5 space-y-2 text-blue-700">
                            <li><strong>Res. CFE 440/23</strong> - Sistema de Título Digital en la República Argentina</li>
                            <li><strong>Res. CFE 491/25</strong> - Analítico Parcial a incluir en el SISFET Web</li>
                        </ul>
                    </div>

                    <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                        <h4 class="text-lg font-semibold text-purple-800 mb-3">Normativa Provincial</h4>
                        <ul class="list-disc pl-5 space-y-2 text-purple-700">
                            <li><strong>Res. Min. 201/24</strong> - Implementación del Sistema de Título Digital en la
                                Provincia de Catamarca y Reglamentación Jurisdiccional</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sistema SISFET Web -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-teal-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Sistema SISFET Web</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="prose max-w-none text-gray-700 mb-6">
                    <p class="mb-4">
                        El marco normativo emitido por el Ministerio de Educación de la Nación mediante Res. CFE 440/23
                        creó una estructura de desarrollos informáticos: ReNaFEJu, ReFE, ReTiDi y SISFET Web.
                    </p>
                    <p>
                        La Dirección se vincula con los establecimientos desde el SISFET Web con la habilitación de usuarios
                        identificados como "Carga y Firma", culminando el proceso con Firma Digital y código QR para cada
                        certificado.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-green-50 p-5 rounded-lg border border-green-100">
                        <h4 class="text-lg font-semibold text-green-800 mb-3">Etapas Desarrolladas</h4>
                        <ul class="list-disc pl-5 space-y-2 text-green-700">
                            <li>Acompañamiento permanente a establecimientos educativos</li>
                            <li>Capacitaciones y asesoramiento continuo virtual y presencial</li>
                            <li>Habilitación de usuarios para carga y firma digital</li>
                        </ul>
                    </div>

                    <div class="bg-teal-50 p-5 rounded-lg border border-teal-100">
                        <h4 class="text-lg font-semibold text-teal-800 mb-3">Objetivos 2025</h4>
                        <ul class="list-disc pl-5 space-y-2 text-teal-700">
                            <li>Segunda etapa de inserción del Sistema de Título Digital</li>
                            <li>Capacitación en Zona Norte, Este, Sur y Oeste de la Provincia</li>
                            <li>Digitalización de documentos y archivos existentes</li>
                            <li>Fortalecimiento del registro de títulos de profesionales</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Estadísticas de Gestión</h3>
                </div>
            </div>

            <div class="p-6">
                <!-- Estadísticas 2024 -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Implementación SISFET Web - Año 2024</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <p class="text-blue-900 text-2xl font-bold">2,451</p>
                            <p class="text-blue-700 font-medium">Nivel Secundario Estatal</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                            <p class="text-green-900 text-2xl font-bold">1,183</p>
                            <p class="text-green-700 font-medium">Nivel Secundario Privado</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                            <p class="text-purple-900 text-2xl font-bold">637</p>
                            <p class="text-purple-700 font-medium">Nivel Superior Estatal</p>
                        </div>
                        <div class="bg-pink-50 p-4 rounded-lg border border-pink-100">
                            <p class="text-pink-900 text-2xl font-bold">134</p>
                            <p class="text-pink-700 font-medium">Nivel Superior Privado</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 col-span-2">
                            <p class="text-gray-900 text-3xl font-bold">4,405</p>
                            <p class="text-gray-700 font-medium">Total Títulos Legalizados 2024</p>
                        </div>
                    </div>
                </div>

                <!-- Estadísticas 2025 -->
                <div class="mb-8">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Implementación SISFET Web - Año 2025 (Parcial)
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <p class="text-blue-900 text-2xl font-bold">3,211</p>
                            <p class="text-blue-700 font-medium">Nivel Secundario Estatal</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                            <p class="text-green-900 text-2xl font-bold">1,063</p>
                            <p class="text-green-700 font-medium">Nivel Secundario Privado</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                            <p class="text-purple-900 text-2xl font-bold">587</p>
                            <p class="text-purple-700 font-medium">Nivel Superior Estatal</p>
                        </div>
                        <div class="bg-pink-50 p-4 rounded-lg border border-pink-100">
                            <p class="text-pink-900 text-2xl font-bold">165</p>
                            <p class="text-pink-700 font-medium">Nivel Superior Privado</p>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 col-span-2">
                            <p class="text-gray-900 text-3xl font-bold">5,026</p>
                            <p class="text-gray-700 font-medium">Total Títulos Legalizados 2025</p>
                        </div>
                    </div>
                </div>

                <!-- Otras estadísticas -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-orange-50 p-4 rounded-lg border border-orange-100">
                        <p class="text-orange-900 text-2xl font-bold">564</p>
                        <p class="text-orange-700 font-medium">Títulos Registrados de Otras Jurisdicciones (2024)</p>
                    </div>
                    <div class="bg-teal-50 p-4 rounded-lg border border-teal-100">
                        <p class="text-teal-900 text-2xl font-bold">403</p>
                        <p class="text-teal-700 font-medium">Títulos Registrados de Otras Jurisdicciones (2025 Parcial)</p>
                    </div>
                    <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                        <p class="text-indigo-900 text-2xl font-bold">47</p>
                        <p class="text-indigo-700 font-medium">Solicitudes de Validez Nacional 2024/25</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Capacitaciones y Logros -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Capacitaciones y Logros</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                        <h4 class="text-lg font-semibold text-purple-800 mb-3">Capacitaciones Realizadas</h4>
                        <ul class="list-disc pl-5 space-y-2 text-purple-700">
                            <li><strong>10</strong> capacitaciones (presenciales y virtuales)</li>
                            <li><strong>306</strong> referentes (usuarios carga y firma) capacitados</li>
                            <li><strong>249</strong> carreras cargadas en el SISFET Web</li>
                        </ul>
                    </div>

                    <div class="bg-pink-50 p-5 rounded-lg border border-pink-100">
                        <h4 class="text-lg font-semibold text-pink-800 mb-3">Coordinación Interárea</h4>
                        <ul class="list-disc pl-5 space-y-2 text-pink-700">
                            <li>Coordinación con Dirección Provincial de Educación Superior</li>
                            <li>Coordinación con Dirección Provincial de Educación de Gestión Privada</li>
                            <li>Trabajo conjunto para solicitudes de Validez Nacional</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
