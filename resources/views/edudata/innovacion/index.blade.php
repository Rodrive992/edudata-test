@extends('layouts.app')

@section('title', 'Edudata - Innovación Educativa')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="container mx-auto px-4 py-8">
            <!-- Banner principal -->
            <div class="mb-8 rounded-xl overflow-hidden">
                <img src="{{ asset('images/bannerinnovacion-v2.png') }}" alt="Banner Innovación Educativa"
                    class="w-full h-60 md:h-70 object-contain md:object-cover">
            </div>

            <!-- Encabezado -->
            <div class="text-center mb-2">
                <div class="max-w-4xl mx-auto">
                    <div
                        class="inline-block bg-gray-100/80 px-6 py-3 rounded-lg mb-6 backdrop-blur-sm border border-gray-200">
                        <p class="text-lg font-medium text-gray-700">
                            Trabajos y acciones de la<strong> Secretaría de
                            Innovación Educativa</strong>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Presentación mejorada -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">Dirección Provincial de IA y Alfabetización Digital
                        </h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed flex-grow">
                        Desde mayo de 2025, la Dirección Provincial de Inteligencia Artificial y Alfabetización Digital del
                        Ministerio de Educación de Catamarca impulsa acciones para integrar la inteligencia artificial y la
                        educación digital en el sistema educativo, promoviendo la innovación pedagógica y la formación
                        continua.
                    </p>
                    
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
                    <div class="flex items-center mb-4">
                        <div class="bg-purple-100 p-3 rounded-lg mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">Nuestra visión</h2>
                    </div>
                    <p class="text-gray-700 leading-relaxed flex-grow">
                        Construir un ecosistema educativo inteligente, inclusivo y sostenible, combinando innovación
                        tecnológica y
                        pedagógica, fortalecimiento docente, participación activa de las familias y una gestión respaldada
                        por
                        datos en tiempo real.
                    </p>
                    
                </div>
            </div>

            <!-- Programas y acciones mejorado -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800">Programas y acciones</h3>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Primeras iniciativas y resultados iniciales.</p>
                </div>

                <div class="p-6 space-y-8">
                    <!-- 1 -->
                    <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-5 py-4 bg-blue-50/80 border-b border-gray-200 flex items-center">
                            <div class="bg-blue-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">1
                            </div>
                            <h4 class="text-base md:text-lg font-semibold text-gray-800">"Educar en la era de la IA:
                                oportunidades y desafíos para el sistema educativo provincial"</h4>
                        </div>
                        <div class="px-5 py-4 text-gray-700 leading-relaxed">
                            
                            <p class="mb-2">
                                En alianza con <strong>Fundación Konrad Adenauer</strong> y <strong>ACEP Catamarca</strong>,
                                fue la apertura oficial de la Dirección
                                con la disertación del <strong>Mg. Rolando Muzzin</strong>. Se abordaron los desafíos de la
                                IA en educación y se brindaron
                                recursos prácticos para el aula.
                            </p>
                            <div class="bg-blue-100 p-3 rounded-lg mt-3">
                                <p class="text-blue-800 font-semibold"><strong>716</strong> docentes, directivos y
                                    referentes educativos capacitados en capital y en el departamento Belén.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2 -->
                    <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-5 py-4 bg-emerald-50/80 border-b border-gray-200 flex items-center">
                            <div
                                class="bg-emerald-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">
                                2</div>
                            <h4 class="text-base md:text-lg font-semibold text-gray-800">"Inmersión en IA"</h4>
                        </div>
                        <div class="px-5 py-4 text-gray-700 leading-relaxed">
                           
                            <p class="mb-2">
                                En alianza con <strong>Fundación Chicos.net</strong> y <strong>HumanIA</strong>, inició el
                                trayecto formativo con una convocatoria
                                récord de <strong>2.627</strong> docentes.
                            </p>
                            <p>
                                El programa, compuesto por cuatro módulos, aborda qué es la IA, su vínculo con la
                                creatividad y el
                                lenguaje, y los desafíos éticos, fortaleciendo competencias digitales y pedagógicas para la
                                enseñanza
                                del siglo XXI.
                            </p>
                            <div class="mt-4 bg-emerald-100 p-4 rounded-lg">
                                <h5 class="font-semibold text-emerald-800 mb-2">Módulos del programa:</h5>
                                <ul class="list-disc pl-5 text-emerald-700">
                                    <li>Introducción a la Inteligencia Artificial</li>
                                    <li>IA y Creatividad en el Aula</li>
                                    <li>Lenguaje y Procesamiento Natural</li>
                                    <li>Ética y Responsabilidad en el uso de IA</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 3 -->
                    <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-5 py-4 bg-amber-50/80 border-b border-gray-200 flex items-center">
                            <div class="bg-amber-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">
                                3</div>
                            <h4 class="text-base md:text-lg font-semibold text-gray-800">"Acompañar en tiempos digitales:
                                vínculos, identidad y derechos"</h4>
                        </div>
                        <div class="px-5 py-4 text-gray-700 leading-relaxed">
                           
                            <p class="mb-2">
                                En alianza con <strong>Fundación Ambiancce 2050</strong> y <strong>Rotary Club Catamarca
                                    Valle</strong>, se capacitó a más de
                                <strong>3.200</strong> personas entre docentes, familias, niños y adolescentes.
                            </p>
                            <p class="mb-2">
                                Se brindaron herramientas para que la tecnología sea un motor de inclusión y ampliación de
                                derechos,
                                abordando bullying y ciberbullying, grooming, suplantación de identidad y exposición no
                                consentida de
                                datos.
                            </p>
                            <p>
                                La formación combinó instancias presenciales y virtuales con evaluación final y espacios de
                                reflexión
                                en escuelas, fortaleciendo la corresponsabilidad entre escuela, familia y comunidad.
                            </p>
                        </div>
                    </div>

                    <!-- 4 -->
                    <div class="rounded-lg border border-gray-200 overflow-hidden shadow-sm">
                        <div class="px-5 py-4 bg-purple-50/80 border-b border-gray-200 flex items-center">
                            <div
                                class="bg-purple-600 text-white rounded-full h-8 w-8 flex items-center justify-center mr-3">
                                4</div>
                            <h4 class="text-base md:text-lg font-semibold text-gray-800">Concurso Provincial "Eco Rebeldes:
                                Escuelas que se la juegan por el planeta"</h4>
                        </div>
                        <div class="px-5 py-4 text-gray-700 leading-relaxed">
                           
                            <p class="mb-2">
                                Con la participación de <strong>45</strong> grupos de primaria y secundaria, acompañados por
                                sus docentes, se están
                                desarrollando <strong>45</strong> ideas innovadoras para resolver problemas ambientales
                                detectados en las escuelas o comunidades.
                            </p>
                            <p>
                                La propuesta fomenta la creatividad, la conciencia ambiental y el trabajo en equipo. Los
                                proyectos
                                ganadores serán premiados con un viaje al interior de la provincia para conocer su riqueza
                                natural en
                                las <strong>Termas de Fiambalá</strong>.
                            </p>
                            <div class="mt-4 bg-purple-100 p-4 rounded-lg">
                                <h5 class="font-semibold text-purple-800 mb-2">Categorías del concurso:</h5>
                                <ul class="list-disc pl-5 text-purple-700">
                                    <li>Innovación en reciclaje y reducción de residuos</li>
                                    <li>Uso eficiente de recursos naturales</li>
                                    <li>Soluciones tecnológicas para problemas ambientales</li>
                                    <li>Concientización y educación ambiental comunitaria</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Impacto global mejorado -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
                <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600 mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                        <h3 class="text-xl font-semibold text-gray-800">Impacto global en el período</h3>
                    </div>
                    <p class="text-sm text-gray-600 mt-1">Resultados alcanzados en menos de cuatro meses.</p>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                            <div class="flex items-center mb-3">
                                <div
                                    class="bg-blue-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-blue-800">Alcance de capacitación</h4>
                            </div>
                            <p class="text-blue-900 text-3xl font-bold">+6.000</p>
                            <p class="text-blue-700">personas capacitadas en toda la provincia</p>
                        </div>

                        <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                            <div class="flex items-center mb-3">
                                <div
                                    class="bg-purple-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                </div>
                                <h4 class="text-lg font-semibold text-purple-800">Proyectos en marcha</h4>
                            </div>
                            <p class="text-purple-900 text-3xl font-bold">45</p>
                            <p class="text-purple-700">proyectos escolares innovadores</p>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-800 mb-3">Logros destacados</h4>
                        <ul class="list-disc pl-6 space-y-2 text-gray-800">
                            <li>Participación de equipos de conducción, docentes, familias, niños, niñas y adolescentes de
                                distintos departamentos.</li>
                            <li>Fortalecimiento de competencias digitales y creación de redes de trabajo colaborativo.</li>
                            <li>Primeros pasos para consolidar un modelo educativo innovador, ético y sostenible.</li>
                            <li>Establecimiento de alianzas estratégicas con organizaciones nacionales e internacionales.
                            </li>
                        </ul>
                    </div>

                    
                </div>
            </div>

        
            
        </div>
    @endsection
