    @extends('layouts.app')

    @section('title', 'Edudata - Portal de Transparencia Educativa')

    @section('content')
        <div class="container mx-auto px-4 ">
            {{-- Carrusel full-bleed --}}
            <section x-data="{
                i: 0,
                imgs: [
                    '{{ asset('images/bannerportal-v4.png') }}',
                    '{{ asset('images/bannerportal2-v4.png') }}'
                ],
                intervalId: null,
                start() { this.intervalId = setInterval(() => this.next(), 4000) },
                stop() { if (this.intervalId) clearInterval(this.intervalId) },
                next() { this.i = (this.i + 1) % this.imgs.length },
                prev() { this.i = (this.i - 1 + this.imgs.length) % this.imgs.length }
            }" x-init="start()" @mouseenter="stop()" @mouseleave="start()"
                class="relative left-1/2 right-1/2 -mx-[50vw] w-screen">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="next()"
                        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white/10 hover:bg-white rounded-full p-2 shadow outline-none"
                        aria-label="Siguiente">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-800" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
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
            <!-- Contenedor de tarjetas - 4 arriba, 4 abajo centradas y residencia centrada -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 py-2">
                <!-- Organigrama -->
                <a href="{{ route('edudata.organigrama') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logorganigrama.png') }}" alt="Organigrama"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Organigrama</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Estructura organizativa del Ministerio de Educación, Ciencia y Tecnología y sus áreas
                            dependientes.
                        </p>
                    </div>
                </a>

                <!-- Mantenimiento -->
                <a href="{{ route('edudata.mantenimiento') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logomantenimiento.png') }}" alt="Mantenimiento"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Mantenimiento</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Información sobre tareas de programación, mantenimiento edilicio y servicios en establecimientos
                            educativos.
                        </p>
                    </div>
                </a>

                <!-- Educacion Tecnica -->
                <a href="{{ route('edudata.edutecnica') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logotecnica-v3.png') }}" alt="Educación Técnica"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Educación Técnica</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Acciones orientadas al fortalecimiento de la educación técnica y agrotécnica en la provincia.
                        </p>
                    </div>
                </a>

                <!-- Innovacion Educativa -->
                <a href="{{ route('edudata.innovacion') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logoinnovacion.png') }}" alt="Innovación Educativa"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Innovación Educativa</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Proyectos y programas para modernizar la educación mediante nuevas tecnologías y metodologías.
                        </p>
                    </div>
                </a>
            </div>

            <!-- Segunda fila con 4 tarjetas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                <!-- Planeamiento Educativo -->
                <a href="{{ route('edudata.formacion') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logoplaneamiento.png') }}" alt="Formación y Programación Educativa"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Formación y Programación</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Estrategias y planificación para el desarrollo y mejora continua del sistema educativo
                            provincial.
                        </p>
                    </div>
                </a>

                <!-- Asuntos Jurídicos -->
                <a href="{{ route('edudata.asuntos') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logoasuntos.png') }}" alt="Asuntos Jurídicos"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">Asuntos
                            Jurídicos</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Normativa, regulaciones y tramitaciones legales vinculadas a la gestión educativa.
                        </p>
                    </div>
                </a>

                <!-- Titulos -->
                <a href="{{ route('edudata.titulos') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logotitulos-v3.png') }}" alt="Titulos"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Titulos
                        </h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Transformación digital del sistema de titulación.
                        </p>
                    </div>
                </a>

                <!-- Programas y Proyectos -->
                <a href="{{ route('edudata.programas') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logoprogramas-v3.png') }}" alt="Programas"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Programas y Proyectos</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Ejecución de políticas educativas nacionales con impacto provincial
                        </p>
                    </div>
                </a>
            </div>

            <!-- Tercera fila con tarjeta centrada de Residencia Universitaria -->
            <div class="flex justify-center mb-16">
                <a href="{{ route('edudata.residencia') }}"
                    class="group bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 hover:border-blue-300 h-full flex flex-col w-full sm:w-2/3 md:w-1/2 lg:w-1/3">
                    <div class="w-full h-48 flex items-center justify-center bg-gray-50 p-4">
                        <img src="{{ asset('images/logoresidencia-v3.png') }}" alt="Residencia Universitaria"
                            class="w-full h-full object-contain transition-transform duration-300 group-hover:scale-110">
                    </div>
                    <div class="p-5 flex-grow">
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">
                            Residencia Universitaria</h3>
                        <p class="text-gray-600 text-sm leading-relaxed">
                            Residencia "Abuelas Plaza de Mayo" para estudiantes del interior provincial que cursan en la
                            UNCa.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    @endsection
