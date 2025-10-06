<nav class="bg-gray-200 shadow-sm" x-data="{ openEduData: false }">
    <!-- TOP BAR -->
    <div class="container mx-auto px-4 sm:px-5 py-3 md:py-4">
        <div class="grid grid-cols-12 items-center gap-3">
            <!-- Izquierda: Logo + título -->
            <div class="col-span-8 sm:col-span-6 md:col-span-4 flex items-center space-x-3">
                <a href="{{ route('edudata.index') }}" class="shrink-0">
                    <img src="{{ asset('images/edudatalogo3.png') }}" alt="EDUDATA Logo" class="h-9 sm:h-10 md:h-12">
                </a>
                <!-- Título solo en md+ para no amontonar en mobile -->
                <div class="hidden md:block leading-tight">
                    <div class="text-[15px] font-medium text-gray-700 tracking-tight">DIRECCIÓN DE</div>
                    <div class="text-m  s font-semibold text-gray-800 tracking-tight">TRANSPARENCIA ACTIVA</div>
                </div>
            </div>

            <!-- Centro: espacio (solo md+) -->
            <div class="hidden md:block md:col-span-4 text-center"></div>

            <!-- Derecha: botón / icono -->
            <div class="col-span-4 sm:col-span-6 md:col-span-4 flex justify-end items-center gap-2">
                <!-- Mobile: icono circular -->
                <button
                    @click="openEduData = !openEduData"
                    class="inline-flex md:hidden items-center justify-center h-9 w-9 rounded-full bg-gray-800 text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    aria-label="¿Qué es EDUDATA?"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M8 10h.01M12 10h.01M16 10h.01M9 16h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9v10a2 2 0 01-2 2z"/>
                    </svg>
                </button>

                <!-- Desktop: botón completo -->
                <button
                    @click="openEduData = !openEduData"
                    class="hidden md:inline-flex px-4 py-2 bg-gray-800 hover:bg-gray-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    ¿Qué es EDUDATA?
                </button>
            </div>
        </div>
    </div>

    <!-- SUB-NAV: Breadcrumbs (scrollable en mobile) -->
    <div class="bg-gray-900 py-2 border-t border-gray-700">
        <div class="container mx-auto px-4 sm:px-5">
            <nav class="flex" aria-label="Breadcrumb">
                @php $crumbs = App\Helpers\Breadcrumbs::generate(); @endphp
                <ol class="inline-flex items-center space-x-1 md:space-x-3 overflow-x-auto whitespace-nowrap">
                    @foreach ($crumbs as $index => $breadcrumb)
                        <li class="inline-flex items-center">
                            @if ($index < count($crumbs) - 1)
                                <a href="{{ route($breadcrumb['route']) }}"
                                   class="inline-flex items-center text-xs md:text-sm font-medium text-gray-300 hover:text-white">
                                    @if ($index === 0)
                                        <svg class="w-4 h-4 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                             fill="currentColor" viewBox="0 0 20 20">
                                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                        </svg>
                                    @endif
                                    {{ $breadcrumb['title'] }}
                                </a>
                            @else
                                <span class="inline-flex items-center text-xs md:text-sm font-medium text-white">
                                    {{ $breadcrumb['title'] }}
                                </span>
                            @endif
                        </li>
                        @if ($index < count($crumbs) - 1)
                            <li>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mx-1 text-gray-500" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>

    <!-- MODAL: Qué es EDUDATA (responsivo con scroll interno) -->
    <div x-cloak x-show="openEduData"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="fixed inset-0 z-50 flex items-end sm:items-center justify-center p-0 sm:p-4 bg-gray-900/40 backdrop-blur-sm"
         role="dialog" aria-modal="true" aria-labelledby="edudata-title">

        <!-- Panel en flex columna + altura controlada -->
        <div class="w-full sm:max-w-2xl bg-white shadow-xl sm:rounded-xl border border-gray-200 overflow-hidden
                    flex flex-col h-[85vh] sm:h-[80vh]">
            <!-- Header -->
            <div class="shrink-0 bg-gradient-to-r from-gray-900 to-gray-800 px-4 sm:px-6 py-3 sm:py-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 sm:h-8 sm:w-8 text-white" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 id="edudata-title" class="ml-2 sm:ml-3 text-lg sm:text-xl font-bold text-white">
                    PORTAL DE TRANSPARENCIA "EDUDATA"
                </h3>
                <button @click="openEduData = false"
                        class="ml-auto text-white/80 hover:text-white focus:outline-none p-2"
                        aria-label="Cerrar modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Contenido (ocupa el resto y scrollea) -->
            <div class="flex-1 min-h-0 overflow-y-auto overscroll-contain px-4 sm:px-6 py-4 sm:py-6">
                <!-- Fundamentación -->
                <div class="mb-5">
                    <p class="text-gray-700 mb-3 text-sm sm:text-base">
                        Este portal se sustenta en el principio de transparencia en la gestión pública, consagrado
                        en la Constitución Nacional y reforzado por:
                    </p>
                    <ul class="list-disc pl-5 space-y-2 text-gray-700 text-sm sm:text-base">
                        <li>Ley Nacional N.º 27.275 de Acceso a la Información Pública</li>
                        <li>Ley Provincial N.º 5336 de Acceso a la Información Pública</li>
                        <li>Ley N.º 25.188 de Ética en la Función Pública</li>
                        <li>Ley N.º 24.156 de Administración Financiera</li>
                        <li>Decreto Acuerdo N.º 2849/2021</li>
                        <li>Plan Provincial de Modernización del Estado</li>
                    </ul>
                </div>

                <!-- Objetivo General -->
                <div class="mb-5 bg-blue-50/60 rounded-lg p-4">
                    <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">Objetivo</h4>
                    <p class="text-gray-700 text-sm sm:text-base">
                        Implementar una plataforma digital que publique información relevante y actualizada sobre
                        la gestión educativa, conforme a las leyes de acceso a la información pública.
                    </p>
                </div>

                <!-- Objetivos Específicos -->
                <div class="mb-5">
                    <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-3">Objetivos Específicos</h4>
                    <ul class="space-y-3 text-gray-700 text-sm sm:text-base">
                        <li class="flex items-start">
                            <span class="flex-shrink-0 bg-blue-100 text-blue-800 rounded-full p-1 mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>Visibilizar la estructura organizativa y recursos institucionales</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 bg-blue-100 text-blue-800 rounded-full p-1 mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>Publicar información sobre asignación de recursos públicos</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 bg-blue-100 text-blue-800 rounded-full p-1 mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>Facilitar el control ciudadano e institucional</span>
                        </li>
                        <li class="flex items-start">
                            <span class="flex-shrink-0 bg-blue-100 text-blue-800 rounded-full p-1 mr-3 mt-[2px]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <span>Promover cultura de transparencia y participación</span>
                        </li>
                    </ul>
                </div>

                <!-- Aplicación -->
                <div>
                    <h4 class="text-base sm:text-lg font-semibold text-gray-800 mb-2">Aplicación</h4>
                    <p class="text-gray-700 text-sm sm:text-base">
                        Plataforma digital centralizada que integra y publica sistemáticamente todas las acciones
                        relevantes de la gestión ministerial, incluyendo el control de fondos públicos, bienes y servicios.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="shrink-0 px-4 sm:px-6 py-3 border-t border-gray-200 flex justify-end">
                <button @click="openEduData = false"
                        class="px-3 sm:px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors duration-200">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</nav>
