    @extends('layouts.app')

    @section('title', 'Edudata - Portal de Transparencia Educativa')

    @section('content')
        <div class="container mx-auto px-4 py-8">
            <!-- Banner principal -->
            <div class="mb-8 rounded-xl overflow-hidden">
                <img src="{{ asset('images/portal-trasnparencia3.png') }}" alt="Banner Edudata"
                    class="w-full h-60 md:h-70 object-contain md:object-cover">
            </div>

            <!-- Encabezado -->

            <div class="text-center mb-2">
                <div class="inline-block bg-gray-100/80 px-6 py-2 rounded-full mb-4 backdrop-blur-sm">
                    <span class="text-ls font-semibold text-gray-700 uppercase tracking-wider">Acceso público a la
                        información
                        institucional del <span class="bg-gray-800 text-white px-3 py-1 rounded-md ml-1">Ministerio de
                            Educación, Ciencia y Tecnología</span></span>
                </div>
            </div>

            <!-- Contenedor de tarjetas - 4 arriba, 2 abajo centradas -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Organigrama -->
                <a href="https://web.catamarca.edu.ar/sitio/el-ministerio/estructura-organica.html"
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

            <!-- Segunda fila con 2 tarjetas centradas -->
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
                        <h3 class="text-lg font-bold text-gray-800 mb-3 group-hover:text-gray-400 transition-colors">Titulos
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
        </div>
    @endsection
