<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div
    x-data="estadisticas($el)"
    x-init="init()"
    data-total-matricula="{{ (int) ($totalMatricula ?? 0) }}"
    data-total-estab="{{ (int) ($totalEstablecimientos ?? 0) }}"
    class="bg-transparent"
>
    {{-- Título (compacto) --}}
    <div x-data="{show:false}" x-init="setTimeout(()=>show=true,120)" class="mb-3 text-center">
        <h2 x-show="show"
            x-transition.opacity.duration.400ms
            class="text-xl md:text-3xl font-extrabold tracking-tight text-[color:var(--pri-700)]">
            Datos del Ministerio de Educación, Ciencia y Tecnología
        </h2>
        <span x-show="show"
              x-transition.scale.origin-center.duration.500ms
              class="mt-1 mx-auto block h-[3px] w-20 bg-gradient-to-r from-[color:var(--pri-300)] via-[color:var(--pri-500)] to-[color:var(--pri-600)] rounded"></span>
    </div>

    {{-- Recuadros (compactos) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-3xl mx-auto">

        {{-- MATRÍCULA --}}
        <button type="button"
                @click="openModal('matricula', $event)"
                class="group relative overflow-hidden rounded-xl border-2 border-[color:var(--pri-300)] bg-white px-4 py-5
                       shadow-sm transition-all duration-150 hover:shadow-md hover:-translate-y-0.5 focus:outline-none
                       focus:ring-2 focus:ring-[color:var(--pri-300)] min-h-[140px]">
            <div class="flex flex-col items-center text-center">
                <div class="h-12 w-12 rounded-lg bg-[color:var(--pri-100)] flex items-center justify-center mb-2.5">
                    <i class="fas fa-user-graduate text-[color:var(--pri-600)] text-xl"></i>
                </div>
                <div class="text-gray-800 font-semibold leading-tight">Matrícula</div>
                <div class="text-[32px] leading-none font-extrabold text-[color:var(--pri-600)] tabular-nums my-0.5">
                    <span x-text="formatNumber(counters.matricula)"></span>
                </div>
                <div class="text-[11px] text-gray-500">estudiantes</div>
            </div>
        </button>

        {{-- ESTABLECIMIENTOS --}}
        <button type="button"
                @click="openModal('establecimientos', $event)"
                class="group relative overflow-hidden rounded-xl border-2 border-[color:var(--pri-300)] bg-white px-4 py-5
                       shadow-sm transition-all duration-150 hover:shadow-md hover:-translate-y-0.5 focus:outline-none
                       focus:ring-2 focus:ring-[color:var(--pri-300)] min-h-[140px]">
            <div class="flex flex-col items-center text-center">
                <div class="h-12 w-12 rounded-lg bg-[color:var(--pri-100)] flex items-center justify-center mb-2.5">
                    <i class="fas fa-school text-[color:var(--pri-600)] text-xl"></i>
                </div>
                <div class="text-gray-800 font-semibold leading-tight">Establecimientos</div>
                <div class="text-[32px] leading-none font-extrabold text-[color:var(--pri-600)] tabular-nums my-0.5">
                    <span x-text="formatNumber(counters.establecimientos)"></span>
                </div>
                <div class="text-[11px] text-gray-500">instituciones</div>
            </div>
        </button>
    </div>

    {{-- ===== Overlay ===== --}}
    <div x-cloak x-show="modal !== null"
         x-transition.opacity
         class="fixed inset-0 z-[100] bg-black/40 backdrop-blur-sm"
         @click.self="closeModal()"
         @keydown.escape.window="closeModal()"></div>

    {{-- ===== MODAL MATRÍCULA (restaurado completo) ===== --}}
    <div x-cloak x-show="modal === 'matricula'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-[101] flex items-end sm:items-center justify-center p-0 sm:p-4">
        <div class="w-full sm:max-w-5xl sm:max-h-[88vh] h-[92vh] sm:h-auto bg-white rounded-t-2xl sm:rounded-2xl overflow-hidden">
            {{-- Header --}}
            <div class="sticky top-0 z-10 bg-gradient-to-r from-[color:var(--pri-500)] to-[color:var(--pri-600)]">
                <div class="px-6 py-4 text-white flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-user-graduate text-base"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Distribución de Matrícula</h3>
                            <p class="text-[color:var(--pri-100)] text-xs mt-0.5">
                                Total: <span x-text="formatNumber(totalMatricula)" class="font-semibold"></span> estudiantes
                            </p>
                        </div>
                    </div>
                    <button @click="closeModal()"
                            class="h-9 px-3 rounded-lg bg-white/20 hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="p-5 max-h-[calc(88vh-110px)] sm:max-h-[60vh] overflow-y-auto scrollbar-thin">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    {{-- Por Modalidad --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-700)] flex items-center">
                            <i class="fas fa-layer-group text-[color:var(--pri-500)] mr-3"></i>
                            Por Modalidad
                        </h4>
                        @php $totalModalidad = max(1, (int) ($totalMatricula ?? 0)); @endphp
                        <div class="space-y-2.5">
                            @forelse(($matriculaPorModalidad ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalModalidad) * 100, 1);
                                    $modalidad = ucfirst(mb_strtolower($fila->modalidad ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-300)] transition">
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $modalidad }}</div>
                                        <div class="text-xs text-gray-600 mt-0.5">{{ number_format($fila->total, 0, ',', '.') }} estudiantes</div>
                                    </div>
                                    <div class="text-right ml-4">
                                        <div class="font-bold text-gray-900 text-base mb-1">{{ $pct }}%</div>
                                        <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-2 bg-gradient-to-r from-[color:var(--pri-500)] to-[color:var(--pri-600)] rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-500 bg-white rounded-md border-2 border-dashed border-gray-200">
                                    <i class="fas fa-inbox text-2xl mb-2 opacity-50"></i>
                                    <p class="text-sm">No hay datos de matrícula disponibles.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Por Dependencia --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-700)] flex items-center">
                            <i class="fas fa-building text-[color:var(--pri-500)] mr-3"></i>
                            Por Dependencia
                        </h4>
                        @php
                            if (isset($matriculaPorDependencia) && $matriculaPorDependencia->count() > 0) {
                                $dependencias = $matriculaPorDependencia;
                            } else {
                                $soloTotal = ($matriculaPorModalidad ?? collect())->sum('total');
                                $dependencias = collect([
                                    (object) ['dependencia_tipo' => 'Estatal', 'total' => $soloTotal],
                                    (object) ['dependencia_tipo' => 'Privada', 'total' => 0],
                                ]);
                            }
                            $totalDependencia = max(1, $dependencias->sum('total'));
                        @endphp
                        <div class="space-y-2.5">
                            @foreach ($dependencias as $fila)
                                @php
                                    $pct = round(($fila->total / $totalDependencia) * 100, 1);
                                    $dependencia = ucfirst(mb_strtolower($fila->dependencia_tipo ?? 'Sin dato'));
                                    $color = $dependencia === 'Estatal' ? 'from-emerald-500 to-emerald-600' : 'from-purple-500 to-purple-600';
                                @endphp
                                <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-300)] transition">
                                    <div>
                                        <div class="font-semibold text-gray-800">{{ $dependencia }}</div>
                                        <div class="text-xs text-gray-600 mt-0.5">{{ number_format($fila->total, 0, ',', '.') }} estudiantes</div>
                                    </div>
                                    <div class="text-right ml-4">
                                        <div class="font-bold text-gray-900 text-base mb-1">{{ $pct }}%</div>
                                        <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-2 bg-gradient-to-r {{ $color }} rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Por Nivel / Oferta Académica (restaurado) --}}
                    @php $totalNivel = max(1, (int) ($matriculaPorNivel?->sum('total') ?? 0)); @endphp
                    <div class="lg:col-span-2 mt-2">
                        <h4 class="font-bold text-[color:var(--pri-700)] flex items-center mb-3">
                            <i class="fas fa-sitemap text-[color:var(--pri-500)] mr-3"></i>
                            Por Nivel / Oferta Académica
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @forelse(($matriculaPorNivel ?? collect()) as $fila)
                                @php
                                    $nivel = ucfirst(mb_strtolower($fila->oferta_tipo ?? 'Sin dato'));
                                    $pct = round(($fila->total / $totalNivel) * 100, 1);
                                @endphp
                                <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-[color:var(--pri-300)] transition">
                                    <div class="pr-3">
                                        <div class="font-semibold text-gray-800">{{ $nivel }}</div>
                                        <div class="text-xs text-gray-600 mt-0.5">{{ number_format($fila->total, 0, ',', '.') }} estudiantes</div>
                                    </div>
                                    <div class="text-right">
                                        <div class="font-bold text-gray-900 text-base mb-1">{{ $pct }}%</div>
                                        <div class="w-28 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-2 bg-gradient-to-r from-[color:var(--pri-500)] to-[color:var(--pri-600)] rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-1 md:col-span-2 text-center py-6 text-gray-500 bg-white rounded-md border-2 border-dashed border-gray-200">
                                    <i class="fas fa-inbox text-2xl mb-2 opacity-50"></i>
                                    <p class="text-sm">Sin datos por nivel.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button @click="closeModal()"
                        class="px-4 py-2 rounded-md bg-white border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">
                    Cerrar
                </button>
            </div>
        </div>
    </div>

    {{-- ===== MODAL ESTABLECIMIENTOS (restaurado completo) ===== --}}
    <div x-cloak x-show="modal === 'establecimientos'"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="fixed inset-0 z-[101] flex items-end sm:items-center justify-center p-0 sm:p-4">
        <div class="w-full sm:max-w-5xl sm:max-h-[88vh] h-[92vh] sm:h-auto bg-white rounded-t-2xl sm:rounded-2xl overflow-hidden">
            {{-- Header --}}
            <div class="sticky top-0 z-10 bg-gradient-to-r from-emerald-500 to-emerald-600">
                <div class="px-6 py-4 text-white flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="h-9 w-9 rounded-lg bg-white/20 flex items-center justify-center">
                            <i class="fas fa-school text-base"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg">Establecimientos Educativos</h3>
                            <p class="text-emerald-100 text-xs mt-0.5">
                                Total: <span x-text="formatNumber(totalEstab)" class="font-semibold"></span> establecimientos
                            </p>
                        </div>
                    </div>
                    <button @click="closeModal()"
                            class="h-9 px-3 rounded-lg bg-white/20 hover:bg-white/30 focus:outline-none focus:ring-2 focus:ring-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            {{-- Cuerpo --}}
            <div class="p-5 max-h-[calc(88vh-110px)] sm:max-h-[60vh] overflow-y-auto scrollbar-thin">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                    {{-- Por Departamento --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-700)] flex items-center">
                            <i class="fas fa-map-marked-alt text-emerald-500 mr-3"></i>
                            Por Departamento
                        </h4>
                        @php $totalDepto = max(1, (int) ($estabPorDepartamento?->sum('total') ?? 0)); @endphp
                        <div class="space-y-2.5">
                            @forelse(($estabPorDepartamento ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalDepto) * 100, 1);
                                    $departamento = ucfirst(mb_strtolower($fila->departamento ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-3.5 bg-white rounded-md border border-gray-200 hover:border-emerald-300 transition">
                                    <div class="flex items-center gap-3 flex-1">
                                        <div class="h-8 w-8 rounded-full bg-emerald-100 flex items-center justify-center font-bold text-emerald-600 text-xs">{{ $loop->iteration }}</div>
                                        <div class="font-semibold text-gray-800">{{ $departamento }}</div>
                                    </div>
                                    <div class="text-right ml-3">
                                        <div class="font-bold text-gray-900 text-sm mb-1">{{ $pct }}%</div>
                                        <div class="w-24 h-2 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-2 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                        <div class="text-xs text-gray-600 mt-1">{{ $fila->total }} establecimientos</div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-500 bg-white rounded-md border-2 border-dashed border-gray-200">
                                    <i class="fas fa-inbox text-2xl mb-2 opacity-50"></i>
                                    <p class="text-sm">Sin datos de departamentos.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    {{-- Por Localidad (restaurado) --}}
                    <div class="space-y-3">
                        <h4 class="font-bold text-[color:var(--pri-700)] flex items-center">
                            <i class="fas fa-city text-emerald-500 mr-3"></i>
                            Por Localidad
                        </h4>
                        @php $totalLoc = max(1, (int) ($estabPorLocalidad?->sum('total') ?? 0)); @endphp
                        <div class="space-y-2 max-h-80 overflow-y-auto pr-2 scrollbar-thin">
                            @forelse(($estabPorLocalidad ?? collect()) as $fila)
                                @php
                                    $pct = round(($fila->total / $totalLoc) * 100, 1);
                                    $localidad = ucfirst(mb_strtolower($fila->localidad ?? 'Sin dato'));
                                @endphp
                                <div class="flex items-center justify-between p-2.5 bg-white rounded-md border border-gray-100 hover:border-emerald-300 transition">
                                    <div class="flex items-center gap-2.5 flex-1">
                                        <div class="h-7 w-7 rounded-full bg-emerald-50 flex items-center justify-center font-bold text-emerald-600 text-[11px]">{{ $loop->iteration }}</div>
                                        <div class="font-medium text-gray-800 text-sm truncate">{{ $localidad }}</div>
                                    </div>
                                    <div class="text-right ml-3">
                                        <div class="font-bold text-gray-900 text-sm mb-0.5">
                                            {{ $fila->total }} <span class="text-gray-600 text-xs">({{ $pct }}%)</span>
                                        </div>
                                        <div class="w-20 h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                            <div class="h-1.5 bg-gradient-to-r from-emerald-400 to-emerald-500 rounded-full" style="width: {{ $pct }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-6 text-gray-500 bg-white rounded-md border-2 border-dashed border-gray-200">
                                    <i class="fas fa-inbox text-2xl mb-2 opacity-50"></i>
                                    <p class="text-sm">Sin datos de localidades.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

            <div class="px-5 py-3 border-t border-gray-200 bg-gray-50 flex justify-end">
                <button @click="closeModal()"
                        class="px-4 py-2 rounded-md bg-white border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function estadisticas($el) {
  return {
    modal: null,
    lastTriggerEl: null,
    totalMatricula: parseInt($el.getAttribute('data-total-matricula') || 0),
    totalEstab: parseInt($el.getAttribute('data-total-estab') || 0),
    counters: { matricula: 0, establecimientos: 0 },

    init() {
      // más rápido o más lento: ajustar 3° parámetro (ms)
      this.animateTo('matricula', this.totalMatricula, 3500);
      this.animateTo('establecimientos', this.totalEstab, 3500);
    },

    animateTo(key, target, duration = 1200) {
      const start = performance.now();
      const step = (t) => {
        const p = Math.min(1, (t - start) / duration);
        const eased = 1 - Math.pow(1 - p, 4);
        this.counters[key] = Math.round(target * eased);
        if (p < 1) requestAnimationFrame(step);
      };
      requestAnimationFrame(step);
    },

    openModal(which, evt = null) {
      this.modal = which;
      this.lastTriggerEl = evt?.currentTarget || null;
      document.body.style.overflow = 'hidden';
    },

    closeModal() {
      this.modal = null;
      document.body.style.overflow = 'auto';
      if (this.lastTriggerEl) this.lastTriggerEl.focus();
    },

    formatNumber(n) {
      try { return new Intl.NumberFormat('es-AR').format(n); }
      catch(e){ return n; }
    }
  }
}
</script>
