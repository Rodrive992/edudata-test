@extends('layouts.app')

@section('title', 'Edudata - Educación Técnica')

@section('content')
    <div class="container mx-auto px-4">
        {{-- Carrusel full-bleed --}}
        <section x-data="{
            i: 0,
            imgs: [
                '{{ asset('images/banneredutecnica1-v4.png') }}',
                '{{ asset('images/banneredutecnica2-v4.png') }}'
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

        <!-- Presentación -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-10">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Fortalecimiento de la Educación Técnica</h2>
            </div>
            <p class="text-gray-700 leading-relaxed mb-6">
                Actividades la Dirección Provincial de Educación
                Técnica, Agrotécnica y Formación Profesional durante el período 2025. Estas actividades se orientan al
                fortalecimiento de la educación técnica y agrotécnica en la provincia, a través de la articulación con
                distintos actores del sistema educativo, el sector productivo y otros ministerios, con el objetivo de
                garantizar una formación integral y de calidad para los estudiantes.
            </p>

            <!-- Botón para descargar el PDF -->
            <div class="mt-4">
                <a href="{{ asset('archivos/Programa39-Financiamiento.pdf') }}" download="Programa39-Financiamiento.pdf"
                    class="inline-flex items-center px-4 py-2 bg-gray-700 border border-transparent rounded-md font-semibold text-white hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Programa y Financiamiento
                </a>
            </div>
        </div>

        <!-- Acciones realizadas -->
        <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
            <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-800">Acciones realizadas</h3>
                </div>
                <p class="text-sm text-gray-600 mt-1">Principales iniciativas desarrolladas durante 2025</p>
            </div>

            <div class="p-6 space-y-6">
                <!-- 1 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-blue-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-blue-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">1
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Congreso Nacional de Educación Técnica
                            Agropecuaria – Encuentro Regional NOA</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Organización y desarrollo del congreso que reunió a instituciones educativas, sectores
                            productivos y autoridades de la región NOA para fortalecer la educación técnica y agropecuaria.
                        </p>
                    </div>
                </div>

                <!-- 2 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-emerald-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-emerald-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">2
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Lanzamiento del Consejo Provincial de
                            Educación, Trabajo y Producción (CoPETyP)</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Puesta en funcionamiento de un espacio de articulación entre el sistema educativo y el sector
                            productivo, orientado a mejorar la empleabilidad de los egresados y fortalecer las prácticas
                            profesionalizantes.</p>
                    </div>
                </div>

                <!-- 3 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-amber-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-amber-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">3
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Capacitación y articulación pedagógica
                            y bienestar institucional</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Desarrollo de capacitaciones y encuentros con equipos directivos y docentes para mejorar la
                            articulación pedagógica y fortalecer el bienestar institucional de las escuelas técnicas y
                            agrotécnicas de la provincia.</p>
                    </div>
                </div>

                <!-- 4 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-purple-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-purple-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">4
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Acompañamiento territorial del equipo
                            técnico de la Dirección</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Visitas periódicas a las instituciones educativas para brindar asesoramiento, seguimiento y apoyo
                            en la gestión académica y administrativa.</p>
                    </div>
                </div>

                <!-- 5 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-red-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-red-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">5
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Jornada en la Escuela Agrotécnica de
                            Huaco – Semana de la Educación Agropecuaria</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Realización de actividades en el marco de la semana de la educación agropecuaria, fortaleciendo
                            el vínculo entre la escuela y su entorno productivo.</p>
                    </div>
                </div>

                <!-- 6 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-indigo-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-indigo-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">6
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Acompañamiento en el aniversario 80 de
                            la Escuela de Minería</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Participación y apoyo institucional en la conmemoración del 80° aniversario de la Escuela de
                            Minería, reconociendo su trayectoria y aporte a la educación técnica provincial.</p>
                    </div>
                </div>

                <!-- 7 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-pink-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-pink-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">7
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Intervenciones ante situaciones
                            complejas</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Acciones inmediatas y coordinadas ante situaciones problemáticas en escuelas técnicas y
                            agrotécnicas, garantizando la continuidad pedagógica y el bienestar de la comunidad educativa.
                        </p>
                    </div>
                </div>

                <!-- 8 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-teal-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-teal-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">8
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Firma de convenios con empresas</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Celebración de convenios con empresas para la realización de prácticas profesionalizantes de los
                            estudiantes de 7° año de tres escuelas técnicas y agrotécnicas, fortaleciendo la vinculación
                            escuela-trabajo.</p>
                    </div>
                </div>

                <!-- 9 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-orange-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-orange-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">9
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Articulación interministerial</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Trabajo conjunto con el Ministerio de Salud, Ministerio de Desarrollo Social y Ministerio de
                            Desarrollo Productivo para implementar políticas integrales que impacten en la educación técnica
                            y agrotécnica.</p>
                    </div>
                </div>

                <!-- 10 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-cyan-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-cyan-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">10
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Asistencia a Mesas Federales INET</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Participación en reuniones federales convocadas por el INET, representando a la provincia y
                            gestionando recursos y programas destinados a la educación técnica.</p>
                    </div>
                </div>

                <!-- 11 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-lime-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-lime-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">11
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Reunión con centros de estudiantes
                        </h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Encuentro con representantes de centros de estudiantes de escuelas técnicas y agrotécnicas para
                            fortalecer la participación estudiantil y promover el liderazgo juvenil.</p>
                    </div>
                </div>

                <!-- 12 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-fuchsia-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-fuchsia-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">
                            12
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Inauguración del Centro Integral de
                            Manejo Bovino</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Habilitación de un espacio destinado a la formación práctica de estudiantes en la Escuela
                            Agroganadera Fray Vicente Alcaraz, con tecnología y equipamiento para el manejo integral de la
                            producción bovina.</p>
                    </div>
                </div>

                <!-- 13 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-rose-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-rose-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">13
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Acompañamiento en el Rally del Poncho
                            2025</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Apoyo y asistencia a la participación de estudiantes de la EPET N° 6 en el Rally del Poncho,
                            promoviendo la aplicación de conocimientos técnicos en eventos de relevancia provincial.</p>
                    </div>
                </div>

                <!-- 14 -->
                <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                    <div class="px-5 py-4 bg-violet-50/80 border-b border-gray-200 flex items-center">
                        <div class="bg-violet-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">14
                        </div>
                        <h4 class="text-base md:text-lg font-semibold text-gray-800">Apoyo técnico a instituciones
                            educativas</h4>
                    </div>
                    <div class="px-5 py-4 text-gray-700 leading-relaxed">
                        <p>Asistencia de las escuelas técnicas a escuelas primarias, secundarias y jardines de infantes
                            mediante proyectos y trabajos orientados a la mejora y mantenimiento de las instalaciones
                            edilicias, fortaleciendo la comunidad educativa y promoviendo el aprendizaje basado en
                            proyectos.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
