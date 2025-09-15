@extends('layouts.app')

@section('title', 'Edudata - Organigrama Ministerial')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/bannerorganigrama1-v4.png') }}',
                '{{ asset('images/bannerorganigrama2-v4.png') }}'
            ],
            intervalId: null,
            start() { this.intervalId = setInterval(() => this.next(), 4000) },
            stop() { if (this.intervalId) clearInterval(this.intervalId) },
            next() { this.i = (this.i + 1) % this.imgs.length },
            prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
        }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
            class="relative left-1/2 right-1/2 -mx-[50vw] w-screen mb-10">
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
                    <div class="bg-gray-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Estructura Organizativa</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    El Ministerio de Educación, Ciencia y Tecnología de la Provincia de Catamarca está compuesto por
                    diversas secretarías y direcciones provinciales que trabajan de manera coordinada para garantizar una
                    educación de calidad en todos los niveles y modalidades del sistema educativo provincial.
                </p>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                <div class="flex items-center mb-4">
                    <div class="bg-gray-100 p-3 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 0 014 0zM7 10a2 2 0 11-4 0 2 0 014 0z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-800">Equipo de Gestión</h2>
                </div>
                <p class="text-gray-700 leading-relaxed flex-grow">
                    Bajo el liderazgo del Ministro Nicolás Rosales Matienzo, el Ministerio cuenta con un equipo de
                    secretarios y directores provinciales especializados en cada área, trabajando de manera articulada para
                    implementar políticas educativas innovadoras y de calidad para todos los ciudadanos de Catamarca.
                </p>
            </div>
        </div>

        <!-- Nivel Ministerial -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>

                    <h3 class="text-xl font-semibold text-gray-800">Nivel Ministerial</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-200 mb-6">
                    <h4 class="text-lg font-semibold text-gray-800 mb-2">Ministro</h4>
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between">
                        <div>
                            <p class="text-gray-900 font-bold text-xl">Nicolás Rosales Matienzo</p>
                            <p class="text-gray-600">Pabellón N° 11 - CAPE</p>
                            <p class="text-gray-600">educacion@catamarca.edu.ar</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secretarías -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Secretarías</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Secretaría de Innovación Educativa -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Innovación Educativa</h4>
                        <p class="text-gray-900 font-bold">Cesar Garetto</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Secretaría de Articulación Institucional -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Articulación Institucional</h4>
                        <p class="text-gray-900 font-bold">Milena Chasampi Rios</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 15 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Secretaría de Planeamiento Educativo -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Planeamiento Educativo</h4>
                        <p class="text-gray-900 font-bold">Angela Sonia Aibar</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">planeamiento@catamarca.edu.ar</p>
                    </div>

                    <!-- Secretaría de Educación -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación</h4>
                        <p class="text-gray-900 font-bold">Roxana María Inés Monasterio</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 12 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Secretaría de Ciencia y Tecnología -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Ciencia y Tecnología</h4>
                        <p class="text-gray-900 font-bold">Luis Rafael Castro</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Direcciones Provinciales -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Direcciones Provinciales</h3>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- IA y Alfabetización Digital -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Inteligencia Artificial y Alfabetización
                            Digital</h4>
                        <p class="text-gray-900 font-bold">Deborah Nancy Dumitru</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">dirinteligenciaartificial@catamarca.edu.ar</p>
                    </div>

                    <!-- Despacho -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Despacho</h4>
                        <p class="text-gray-900 font-bold">Guillermo Eduardo Osella</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">mesadeentradas-despacho@catamarca.edu.ar</p>
                    </div>

                    <!-- Sumario Docente -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Sumario Docente</h4>
                        <p class="text-gray-900 font-bold">Samhara Saleme</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 12 - CAPE</p>
                        <p class="text-gray-600 text-sm">dirsumariodocente@catamarca.gov.ar</p>
                    </div>

                    <!-- Asuntos Jurídicos -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Asuntos Jurídicos</h4>
                        <p class="text-gray-900 font-bold">Carolina del Valle Reynoso</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Programación y Mantenimiento Edilicio -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Programación y Mantenimiento Edilicio</h4>
                        <p class="text-gray-900 font-bold">Silvia Inés Zalazar</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Transparencia Activa -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Transparencia Activa</h4>
                        <p class="text-gray-900 font-bold">Renzo Augusto Gonzalez</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Unidad Ejecutora de Programas y Proyectos -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Unidad Ejecutora de Programas y Proyectos</h4>
                        <p class="text-gray-900 font-bold">Victoria María Gonzalez Rojas</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Administración -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Administración</h4>
                        <p class="text-gray-900 font-bold">Lucas Rojas</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Parque Automotor -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Parque Automotor</h4>
                        <p class="text-gray-900 font-bold">Cristian Eduardo Agüero Arreguez</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Desarrollo Profesional y Evaluación Educativa -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Desarrollo Profesional y Evaluación Educativa
                        </h4>
                        <p class="text-gray-900 font-bold">Melisa Ludmila Schonhals</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">capacitacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Estadística Educativa y Análisis Poblacional -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Estadística Educativa y Análisis Poblacional
                        </h4>
                        <p class="text-gray-900 font-bold">Ivana Elizabeth Herrera</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">estadistica@catamarca.edu.ar</p>
                    </div>

                    <!-- Educación Inicial -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación Inicial</h4>
                        <p class="text-gray-900 font-bold">Flavia Vanesa Chasampi</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">educacioninicial@catamarca.edu.ar</p>
                    </div>

                    <!-- Educación Primaria -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación Primaria</h4>
                        <p class="text-gray-900 font-bold">León Camij</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 14 - CAPE</p>
                        <p class="text-gray-600 text-sm">educacionprimaria@catamarca.edu.ar</p>
                    </div>

                    <!-- Educación Secundaria -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación Secundaria</h4>
                        <p class="text-gray-900 font-bold">Andrea María Silvina Perea</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">educacionsecundaria@catamarca.edu.ar</p>
                    </div>

                    <!-- Educación Superior -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación Superior</h4>
                        <p class="text-gray-900 font-bold">Cintia Brizuela</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">educacionsuperior@catamarca.edu.ar</p>
                    </div>

                    <!-- Modalidades Educativas -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Modalidades Educativas</h4>
                        <p class="text-gray-900 font-bold">Fuente, Andrea Julieta</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 14 - CAPE</p>
                        <p class="text-gray-600 text-sm">modalidadeseducativas@catamarca.edu.ar</p>
                    </div>

                    <!-- Educación de Gestión Municipal Privada, Social y Cooperativa -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación de Gestión Municipal Privada, Social
                            y Cooperativa</h4>
                        <p class="text-gray-900 font-bold">Pablo Javier Figueroa</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">educacionprivadaymunicipal@catamarca.edu.ar</p>
                    </div>

                    <!-- Educación Técnica, Agrotécnica y FP -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Educación Técnica, Agrotécnica y Formación
                            Profesional</h4>
                        <p class="text-gray-900 font-bold">Matías Andrés Cabrera</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 26 - CAPE</p>
                        <p class="text-gray-600 text-sm">educaciontecnicaagrotecticayfp@catamarca.edu.ar</p>
                    </div>

                    <!-- Startups y Ecosistema Emprendedor -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Startups y Ecosistema Emprendedor</h4>
                        <p class="text-gray-900 font-bold">Ivanna Alejandra del V. Altamiranda</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Ciencia Aplicada y Formación Tecnológica -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Ciencia Aplicada y Formación Tecnológica</h4>
                        <p class="text-gray-900 font-bold">María Luz Diaz Rodriguez</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Transformación Digital e Infraestructura Tecnológica -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Transformación Digital e Infraestructura
                            Tecnológica</h4>
                        <p class="text-gray-900 font-bold">Carlos David Ponce</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Legalización y Registro de Títulos -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Legalización y Registro de Títulos</h4>
                        <p class="text-gray-900 font-bold">Julio Rubén Quiroga</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Residencia Universitaria -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Residencia Universitaria</h4>
                        <p class="text-gray-900 font-bold">Alejandro Renée Bambicha</p>
                        <p class="text-gray-600 text-sm">Maximio Victoria S/N</p>
                        <p class="text-gray-600 text-sm">rup@catamarca.edu.ar</p>
                    </div>

                    <!-- Tesorería -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Tesorería</h4>
                        <p class="text-gray-900 font-bold">Florencia Anahí Merep</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Compras -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Compras</h4>
                        <p class="text-gray-900 font-bold">Daina Montivero</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Sistemas y Desarrollo Tecnológico -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Sistemas y Desarrollo Tecnológico</h4>
                        <p class="text-gray-900 font-bold">Pablo Pedemonte</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 13 - CAPE</p>
                        <p class="text-gray-600 text-sm">dsdt@catamarca.edu.ar</p>
                    </div>

                    <!-- Administración, Ejecución y Financiamiento Científico -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Administración, Ejecución y Financiamiento
                            Científico</h4>
                        <p class="text-gray-900 font-bold">Jesica Alejandra Aybar</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>

                    <!-- Investigación, Innovación y Extensión -->
                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-2">Investigación, Innovación y Extensión</h4>
                        <p class="text-gray-900 font-bold">María Fernanda Carrizo Lopez</p>
                        <p class="text-gray-600 text-sm">Pabellón N° 11 - CAPE</p>
                        <p class="text-gray-600 text-sm">innovacion@catamarca.edu.ar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
