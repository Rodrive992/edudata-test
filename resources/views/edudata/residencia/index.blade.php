@extends('layouts.app')

@section('title', 'Edudata - Residencia Universitaria')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/banneresidencia1-v4.png') }}',
                '{{ asset('images/banneresidencia2-v4.png') }}'
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

        <!-- Reseña histórica con imagen -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Reseña Histórica</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    La residencia provincial "Abuelas Plaza de Mayo" es creada en el año 2015, constituyendo un
                    emplazamiento estructural destinado a albergar a jóvenes del interior provincial Catamarqueño que deseen
                    iniciar o continuar sus estudios superiores en el ámbito de la Universidad Nacional de Catamarca.
                </p>
                <p class="text-gray-700 leading-relaxed mt-3">
                    Su creación responde a una demanda real que es atendida a través de edificios de índole privado, lo cual
                    constituía un posicionamiento desigual para quienes no contaban con las posibilidades económicas para
                    afrontar los gastos que ello implica.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <img src="{{ asset('images/residencia.jpg') }}" alt="Residencia Universitaria Abuelas de Plaza de Mayo"
                    class="w-full h-full object-cover">
            </div>
        </div>

        <!-- Objetivo y Misión -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-green-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Objetivo y Misión</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    La residencia tiene como misión promover la igualdad de oportunidades a través de la implementación de
                    un sistema de becas (BECAS RUP) que permita a los alumnos de escasos recursos económicos y que posean
                    buen nivel académico y regularidad en sus estudios, siempre que la carrera elegida no se encuentre
                    disponible como oferta académica en el lugar de origen.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-purple-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Infraestructura</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    La residencia cuenta con entrada principal, recepción, comedor, cocina, baños, 40 habitaciones amobladas
                    cada una con su baño personal, sala de estudio, biblioteca, lavadero, terraza, patio y playón
                    multideportivos. Durante 2023-2024 se realizó una refacción completa que incluyó techos, paredes,
                    ventanas, sistemas eléctricos y de aire acondicionado.
                </p>
            </div>
        </div>

        <!-- Servicios -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-green-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Servicios que Brinda la Residencia</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600 mx-auto mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        <p class="text-sm font-medium text-blue-800">Agua potable</p>
                    </div>

                    <div class="bg-green-50 p-4 rounded-lg border border-green-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600 mx-auto mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                        <p class="text-sm font-medium text-green-800">Electricidad</p>
                    </div>

                    <div class="bg-purple-50 p-4 rounded-lg border border-purple-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600 mx-auto mb-2"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.111 16.404a5.5 5.5 0 017.778 0M12 20h.01m-7.08-7.071c3.904-3.905 10.236-3.905 14.141 0M1.394 9.393c5.857-5.857 15.355-5.857 21.213 0" />
                        </svg>
                        <p class="text-sm font-medium text-purple-800">Internet</p>
                    </div>

                    <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-600 mx-auto mb-2"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                        <p class="text-sm font-medium text-yellow-800">Gas</p>
                    </div>

                    <div class="bg-red-50 p-4 rounded-lg border border-red-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600 mx-auto mb-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                        <p class="text-sm font-medium text-red-800">Servicio de catering</p>
                    </div>

                    <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-indigo-600 mx-auto mb-2"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <p class="text-sm font-medium text-indigo-800">Seguridad</p>
                    </div>
                </div>

                <div class="mt-6 bg-gray-50 p-5 rounded-lg border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Servicio de Catering Incluye:</h4>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Desayuno</li>
                        <li>Almuerzo</li>
                        <li>Merienda</li>
                        <li>Cena</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Acceso a la Beca RUP -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-pink-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Acceso a la Beca RUP</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                        <h4 class="text-lg font-semibold text-purple-800 mb-3">Proceso de Selección</h4>
                        <p class="text-purple-700 text-sm mb-3">
                            Durante los meses de diciembre a febrero se abre un formulario de preinscripción donde se
                            solicitan datos personales, socioeconómicos y académicos, los cuales son analizados por la
                            comisión evaluadora de la RUP.
                        </p>
                        <p class="text-purple-700 text-sm">
                            La evaluación se realiza conforme a un sistema de puntaje diferencial, teniendo en cuenta
                            variables socioeconómicas y académicas.
                        </p>
                    </div>

                    <div class="bg-pink-50 p-5 rounded-lg border border-pink-100">
                        <h4 class="text-lg font-semibold text-pink-800 mb-3">Criterios de Evaluación</h4>
                        <ul class="list-disc pl-5 space-y-1 text-pink-700 text-sm">
                            <li>Acreditar ingresos familiares ≤ 3 salarios mínimos</li>
                            <li>Ser del interior de la provincia de Catamarca</li>
                            <li>Condición laboral de los aportantes del hogar</li>
                            <li>Edad del postulante</li>
                            <li>Promedio académico obtenido</li>
                            <li>Carreras estratégicas y regularidad académica</li>
                        </ul>
                    </div>
                </div>

                <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Mantenimiento del Beneficio</h4>
                    <p class="text-gray-700 mb-3">Evaluado semestralmente considerando:</p>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700">
                        <li>Permanencia de las condiciones que justificaron el otorgamiento</li>
                        <li>Condición de estudiante regular en el 75% de las asignaturas</li>
                        <li>Aprobar el 60% de las asignaturas inscriptas anualmente</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Carreras y Residentes -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14v6l9-5m-9 5l-9-5m9 5v-6m0 0l-9-5m9 5l9-5" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Carreras y Residentes</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Residentes Actuales</h4>
                        <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                            <p class="text-blue-800 text-center text-2xl font-bold">85</p>
                            <p class="text-blue-700 text-center">estudiantes varones y mujeres</p>
                            <p class="text-blue-600 text-center text-sm mt-2">De todos los departamentos de la provincia
                            </p>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Egresados Recientes</h4>
                        <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                            <p class="text-green-800 text-center text-2xl font-bold">8</p>
                            <p class="text-green-700 text-center">estudiantes recibidos</p>
                            <p class="text-green-600 text-center text-sm mt-2">Con proyección de 13 para fin de año</p>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-3">Carreras que Cursan los Residentes</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 text-sm">
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Tec. en Procesamiento de Salmuera y
                            Litio</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Lic. en Administración de Empresas</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Profesorado en Inglés</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Tec. en Hemoterapia</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Profesorado en Matemáticas</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Lic. en Relaciones Internacionales</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Contador Público Nacional</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Abogacía</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Lic. en Ciencias Ambientales</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Lic. en Nutrición</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Ingeniería en Minas</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Prof. en Ciencias de la Educación</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Tec. en Higiene y Seguridad</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Lic. en Enfermería</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Ingeniería en Paisaje</div>
                        <div class="bg-gray-50 p-3 rounded border border-gray-200">Lic. en Trabajo Social</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Personal -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-orange-50 to-amber-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Personal de la Residencia</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Director</h4>
                        <p class="text-gray-700">Abogado y Profesor Alejandro Bambicha</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Supervisión Académica</h4>
                        <p class="text-gray-700">Lic. Luz Pizarro (Lic. en Trabajo Social y Prof. en Cs. de la Educación)
                        </p>
                    </div>

                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Coordinación y Control</h4>
                        <p class="text-gray-700">Claudia Bambicha</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Jefe de Personal</h4>
                        <p class="text-gray-700">Mariano Cuello</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Encargadas de Recepción</h4>
                        <p class="text-gray-700">María Catalina Constantini / Verónica Galván</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Jefe de Mantenimiento</h4>
                        <p class="text-gray-700">Félix Rufino Bustamante</p>
                    </div>

                    <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
                        <h4 class="font-semibold text-blue-700">Supervisión Nutricional</h4>
                        <p class="text-gray-700">Lic. Mirian Flores</p>
                    </div>
                </div>

                <div class="mt-6 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <p class="text-gray-700 text-sm italic">Además del personal mencionado, la residencia cuenta con
                        personal administrativo, cocinero, personal de limpieza y becarios/as que contribuyen al
                        funcionamiento integral del establecimiento.</p>
                </div>
            </div>
        </div>

        <!-- Normativa -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-10">
            <div class="flex items-center mb-4">
                <div class="bg-red-100 p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Normativa Aplicable</h2>
            </div>

            <div class="pl-12">
                <ul class="list-disc space-y-2 text-gray-700">
                    <li><strong>Decreto Acuerdo N.º 1068/15</strong>, publicado en el B.O. N.º 87/15: determina la creación,
                        objetivos y fines del establecimiento.</li>
                    <li><strong>Anexo II del Decreto Acuerdo N.º 1068/15</strong>: Reglamento General de Acceso, Permanencia
                        y Egreso a la RUP.</li>
                </ul>

                <div class="mt-6 bg-blue-50 p-4 rounded-lg border border-blue-100">
                    <p class="text-blue-800 font-semibold">Importante:</p>
                    <p class="text-blue-700 mt-2">Todos los servicios y beneficios que brinda la Residencia Universitaria
                        Provincial "Abuelas de Plaza de Mayo" son completamente gratuitos para los y las estudiantes
                        residentes.</p>
                    <p class="text-blue-700 mt-2">Este funcionamiento sin costo alguno representa un esfuerzo significativo
                        y sostenido por parte del Gobierno de la Provincia de Catamarca, a través del Ministerio de
                        Educación.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
