@extends('layouts.app')

@section('title', 'Edudata - Asuntos Jurídicos')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Banner principal -->
    <div class="mb-8 rounded-xl overflow-hidden">
        <img src="{{ asset('images/bannerasuntos-v2.png') }}" alt="Banner Asuntos Jurídicos"
             class="w-full h-60 md:h-70 object-contain md:object-cover">
    </div>

    <!-- Encabezado -->
    <div class="text-center mb-2">
        <div class="max-w-4xl mx-auto">
            <div class="inline-block bg-gray-100/80 px-6 py-3 rounded-lg mb-6 backdrop-blur-sm border border-gray-200">
                <p class="text-lg font-medium text-gray-700">
                    Información proporcionada por la  <strong>Dirección Provincial de Asuntos Jurídicos</strong>, organismo dependiente de la Secretaría de Articulación Institucional.
                </p>
            </div>
        </div>
    </div>

    <!-- Presentación -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
            <div class="flex items-center mb-4">
                <div class="bg-blue-100 p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Actividad Jurídica</h2>
            </div>
            <p class="text-gray-700 leading-relaxed flex-grow">
                Desde el mes de febrero y hasta el 27/08/2025, se han tramitado en total <strong>984 expedientes</strong>, 
                abarcando toda la normativa aplicable al sector docente y no docente en las áreas pedagógica, 
                administrativa y contable del Ministerio de Educación, Ciencia y Tecnología.
            </p>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex flex-col h-full">
            <div class="flex items-center mb-4">
                <div class="bg-purple-100 p-3 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h2 class="text-xl font-semibold text-gray-800">Ámbito Normativo</h2>
            </div>
            <p class="text-gray-700 leading-relaxed flex-grow">
                La normativa aplicada es amplia y abarcativa, incluyendo Leyes, Decretos, Reglamentos, 
                Resoluciones Ministeriales, Circulares y demás instrumentos jurídicos que rigen la actividad 
                del sistema educativo provincial.
            </p>
        </div>
    </div>

    <!-- Estadísticas de expedientes -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Estadísticas de Expedientes</h3>
            </div>
            <p class="text-sm text-gray-600 mt-1">Período: Febrero 2025 - Agosto 2025 (al 27/08/2025)</p>
        </div>

        <div class="p-6">
            <!-- Distribución mensual -->
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Distribución Mensual de Expedientes</h4>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                        <p class="text-blue-900 text-2xl font-bold">116</p>
                        <p class="text-blue-700 font-medium">Febrero</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                        <p class="text-green-900 text-2xl font-bold">114</p>
                        <p class="text-green-700 font-medium">Marzo</p>
                    </div>
                    <div class="bg-purple-50 p-4 rounded-lg border border-purple-100">
                        <p class="text-purple-900 text-2xl font-bold">176</p>
                        <p class="text-purple-700 font-medium">Abril</p>
                    </div>
                    <div class="bg-amber-50 p-4 rounded-lg border border-amber-100">
                        <p class="text-amber-900 text-2xl font-bold">189</p>
                        <p class="text-amber-700 font-medium">Mayo</p>
                    </div>
                    <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                        <p class="text-indigo-900 text-2xl font-bold">147</p>
                        <p class="text-indigo-700 font-medium">Junio</p>
                    </div>
                    <div class="bg-pink-50 p-4 rounded-lg border border-pink-100">
                        <p class="text-pink-900 text-2xl font-bold">96</p>
                        <p class="text-pink-700 font-medium">Julio</p>
                    </div>
                    <div class="bg-teal-50 p-4 rounded-lg border border-teal-100">
                        <p class="text-teal-900 text-2xl font-bold">146</p>
                        <p class="text-teal-700 font-medium">Agosto</p>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                        <p class="text-gray-900 text-2xl font-bold">984</p>
                        <p class="text-gray-700 font-medium">TOTAL</p>
                    </div>
                </div>
            </div>

            <!-- Tipos de tramitación -->
            <div class="mb-8">
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Tipos de Tramitación</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-blue-50 p-5 rounded-lg border border-blue-100">
                        <div class="flex items-center mb-3">
                            <div class="bg-blue-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-blue-800">Informes Emitidos</h4>
                        </div>
                        <p class="text-blue-900 text-3xl font-bold">361</p>
                        <p class="text-blue-700">expedientes tramitados con emisión de informes</p>
                    </div>

                    <div class="bg-purple-50 p-5 rounded-lg border border-purple-100">
                        <div class="flex items-center mb-3">
                            <div class="bg-purple-600 text-white rounded-full h-10 w-10 flex items-center justify-center mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h4 class="text-lg font-semibold text-purple-800">Dictámenes Emitidos</h4>
                        </div>
                        <p class="text-purple-900 text-3xl font-bold">623</p>
                        <p class="text-purple-700">expedientes tramitados con dictámenes</p>
                    </div>
                </div>
            </div>

            <!-- Datos de relevancia -->
            <div>
                <h4 class="text-lg font-semibold text-gray-800 mb-4">Datos de Relevancia</h4>
                <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h5 class="font-semibold text-gray-800 mb-3">Temáticas Específicas</h5>
                            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                                <li><strong>26</strong> expedientes sobre violencia de género</li>
                                <li><strong>359</strong> dictámenes de Liquidaciones Finales</li>
                                <li><strong>32</strong> expedientes de Honorarios</li>
                                <li><strong>78</strong> expedientes de Altas Docentes</li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="font-semibold text-gray-800 mb-3">Otras Áreas</h5>
                            <ul class="list-disc pl-6 space-y-2 text-gray-700">
                                <li><strong>20</strong> Concursos de Precios o Contrataciones</li>
                                <li><strong>50</strong> expedientes de Licencias Varias</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Información adicional -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-10">
        <div class="px-6 py-4 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-purple-50">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-xl font-semibold text-gray-800">Información Adicional</h3>
            </div>
        </div>

        <div class="p-6">
            <div class="prose max-w-none text-gray-700">
                <p class="mb-4">
                    Tal como puede advertirse, la normativa con la que se trabaja es muy amplia y abarcativa de todo el sector docente y no docente, en la faz pedagógica, administrativa y contable, dependiente de este Ministerio de Educación, Ciencia y Tecnología.
                </p>
                <p>
                    Son aplicables Leyes, Decretos, Reglamentos, Resoluciones Ministeriales, Circulares, y toda la normativa que rige la actividad del sistema educativo provincial, garantizando el marco legal adecuado para el desarrollo de las funciones educativas.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection