<div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <!-- Título centrado con margen inferior - Estilo mejorado -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Panel de Generación y Gestión de Solicitudes</h1>
        <p class="mt-3 text-lg text-gray-600 font-medium">Elija el tipo de solicitud y complete el formulario correspondiente</p>
    </div>

    <!-- Tarjeta con sombra más pronunciada y bordes más definidos -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden border border-gray-100">
        <!-- Contenido principal con mejor espaciado -->
        <div class="p-8 space-y-8">
            <!-- Selector tipo de solicitud - Estilo mejorado -->
            <div class="mb-8">
                <label for="tipo-solicitud" class="block text-base font-semibold text-gray-700 mb-3">Tipo de Solicitud</label>
                <div class="flex flex-col sm:flex-row gap-4 items-center">
                    <select id="tipo-solicitud" 
                            class="block w-full pl-4 pr-10 py-3 text-base border-2 border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 rounded-lg shadow-sm transition duration-200">
                        <option value="">Seleccione una opción</option>
                        <option value="edilicio">Requerimiento Edilicio</option>
                        <option value="vacante">Cobertura por Vacante</option>
                    </select>
                    
                    <a href="{{ route('edured.historial') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-gray-800 border border-transparent rounded-lg font-medium text-sm text-white uppercase tracking-wider hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition duration-200 shadow-sm w-full sm:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Historial
                    </a>
                </div>
            </div>

            <!-- Formulario Requerimiento Edilicio - Estilo mejorado -->
            <form id="form-edilicio" action="{{ route('edured.generar-solicitud-edilicio') }}" method="POST" enctype="multipart/form-data" class="space-y-6 hidden">
                @csrf
                <div class="space-y-6">
                    <div>
                        <label for="asunto" class="block text-base font-semibold text-gray-700 mb-2">Asunto del requerimiento</label>
                        <input type="text" id="asunto" name="asunto" 
                               class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>
                    
                    <div>
                        <label for="requerimiento" class="block text-base font-semibold text-gray-700 mb-2">Requerimiento</label>
                        <textarea id="requerimiento" name="requerimiento" rows="5"
                                  class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200"></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-base font-semibold text-gray-700 mb-2">Archivos adjuntos</label>
                        <div class="mt-1 flex justify-center px-6 pt-8 pb-8 border-2 border-gray-200 border-dashed rounded-lg bg-gray-50 hover:bg-gray-100 transition duration-200">
                            <div class="space-y-2 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <div class="flex text-sm text-gray-600 justify-center">
                                    <label for="archivos" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                        <span>Subir archivos</span>
                                        <input id="archivos" name="archivos[]" type="file" multiple accept="image/*,.pdf" class="sr-only">
                                    </label>
                                    <p class="pl-1">o arrastrar y soltar</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, PDF hasta 10MB</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit" 
                            class="w-full sm:w-auto flex justify-center py-3 px-8 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200">
                        Enviar solicitud edilicia
                    </button>
                </div>
            </form>

            <!-- Formulario Cobertura por Vacante - Estilo mejorado -->
            <form id="form-vacante" action="{{ route('edured.generar-solicitud-vacante') }}" method="POST" class="space-y-6 hidden">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="nombre-docente" class="block text-base font-semibold text-gray-700 mb-2">Nombre docente</label>
                        <input type="text" id="nombre-docente" name="nombre_docente"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>

                    <div>
                        <label for="dni-docente" class="block text-base font-semibold text-gray-700 mb-2">DNI docente</label>
                        <input type="text" id="dni-docente" name="dni_docente"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>

                    <div>
                        <label for="cargo" class="block text-base font-semibold text-gray-700 mb-2">Cargo</label>
                        <input type="text" id="cargo" name="cargo"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>

                    <div>
                        <label for="hs" class="block text-base font-semibold text-gray-700 mb-2">Horas</label>
                        <input type="text" id="hs" name="hs"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="materia" class="block text-base font-semibold text-gray-700 mb-2">Materia</label>
                        <input type="text" id="materia" name="materia"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>

                    <div>
                        <label for="fecha_inicio" class="block text-base font-semibold text-gray-700 mb-2">Fecha inicio vacante</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio"
                            class="mt-1 block w-full border-2 border-gray-200 rounded-lg shadow-sm py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-base transition duration-200">
                    </div>
                </div>
                
                <div class="pt-6">
                    <button type="submit"
                            class="w-full sm:w-auto flex justify-center py-3 px-8 border border-transparent rounded-lg shadow-sm text-base font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-200">
                        Enviar solicitud vacante
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selector = document.getElementById('tipo-solicitud');
        const formEdilicio = document.getElementById('form-edilicio');
        const formVacante = document.getElementById('form-vacante');

        selector.addEventListener('change', function () {
            const value = this.value;
            formEdilicio.classList.add('hidden');
            formVacante.classList.add('hidden');

            if (value === 'edilicio') {
                formEdilicio.classList.remove('hidden');
            } else if (value === 'vacante') {
                formVacante.classList.remove('hidden');
            }
        });
    });
</script>