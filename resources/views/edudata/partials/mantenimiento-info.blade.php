@php
    $panelColor   = $panelColor ?? '#f8fafc';
    $logoSrc      = $logoSrc ?? asset('images/estadisticas.png');
    $triggerLabel = $triggerLabel ?? 'Datos';
    $openDefault  = isset($openDefault) ? (bool) $openDefault : false;

    $anio = $anio ?? (int)date('Y');
    $aniosDisponibles = $aniosDisponibles ?? [];
    $totales = $totales ?? ['APH' => 0, 'ELEC' => 0, 'DEZM' => 0];
    $totalGeneral = $totalGeneral ?? (($totales['APH'] ?? 0) + ($totales['ELEC'] ?? 0) + ($totales['DEZM'] ?? 0));
    $totalesPorAnio = $totalesPorAnio ?? [];
@endphp

<script>
    window.EDUDATA_MANTENIMIENTO_TOTALS = @json($totales);
    window.EDUDATA_MANTENIMIENTO_OPEN = @json($openDefault);
</script>

<style>
    /* --- Panel de estadísticas con solapa azul (estilo original mejorado) --- */
    .mantenimiento-panel {
        --panel-bg: {{ $panelColor }};
        --panel-grad: linear-gradient(180deg, var(--sec-500) 0%, var(--pri-500) 100%);
        --panel-text: #334155;
        --panel-border: rgba(100, 116, 139, 0.2);
        --shadow-soft: 0 20px 40px rgba(0, 0, 0, 0.1);
        --accent-primary: var(--pri-700);
        --accent-secondary: var(--ter-500);
        --accent-tertiary: var(--sec-500);
        --accent-aph: var(--acc-500);
        --accent-elec: var(--sec-500);
        --accent-dezm: var(--ter-500);
        --hover-glow: 0 0 20px rgba(30, 58, 138, 0.3);
        
        position: fixed;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
        z-index: 9999;
        pointer-events: none;
        font-family: 'Open Sans', sans-serif;
    }

    /* Solapa azul - estilo original mejorado */
    .mantenimiento-panel .mantenimiento-trigger {
        position: absolute;
        left: -100px;
        top: 50%;
        transform: translateY(-50%);
        width: 90px;
        border-radius: 20px 0 0 20px;
        background: #1e3a8a; /* Azul oscuro profesional */
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-right: none;
        box-shadow: var(--shadow-soft), 0 0 0 1px rgba(255, 255, 255, 0.2);
        padding: 1.25rem .75rem;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: .45rem;
        pointer-events: all;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .mantenimiento-panel .mantenimiento-trigger:hover {
        transform: translateY(-50%) scale(1.05);
        box-shadow: var(--hover-glow), 0 8px 25px rgba(0, 0, 0, 0.15);
        background: #2563eb; /* Azul más claro al hover */
        left: -105px;
    }

    .mantenimiento-panel .mantenimiento-trigger img {
        width: 42px;
        height: 42px;
        object-fit: contain;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
        transition: all 0.3s ease;
    }

    .mantenimiento-panel .mantenimiento-trigger:hover img {
        transform: scale(1.1);
        filter: drop-shadow(0 4px 8px rgba(255, 255, 255, 0.3));
    }

    .mantenimiento-panel .mantenimiento-trigger .mantenimiento-trigger-label {
        writing-mode: vertical-rl;
        transform: rotate(180deg);
        font-size: .85rem;
        letter-spacing: .15em;
        font-weight: 600;
        text-transform: uppercase;
        color: #ffffff;
        font-family: 'Open Sans', sans-serif;
    }

    /* Superficie del panel */
    .mantenimiento-panel .mantenimiento-surface {
        width: 380px;
        max-height: 80vh;
        background: #ffffff;
        border-radius: 20px 0 0 20px;
        border: 2px solid rgba(255, 255, 255, 0.9);
        border-right: none;
        box-shadow: var(--shadow-soft), inset 0 1px 0 rgba(255, 255, 255, 0.9);
        overflow: hidden;
        pointer-events: all;
        backdrop-filter: blur(15px);
        display: flex;
        flex-direction: column;
    }

    /* Header del panel */
    .mantenimiento-panel .mantenimiento-head {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(100, 116, 139, 0.1);
        text-align: center;
        background: #f8fafc;
        position: relative;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mantenimiento-panel .mantenimiento-head h3 {
        font-size: 1rem;
        font-weight: 600;
        margin: 0;
        color: #1e293b;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }

    .mantenimiento-panel .mantenimiento-close {
        background: transparent;
        color: #64748b;
        border: none;
        border-radius: 4px;
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.2rem;
        font-weight: 400;
        transition: all 0.2s ease;
    }

    .mantenimiento-panel .mantenimiento-close:hover {
        background: #e2e8f0;
        color: #1e293b;
    }

    /* Body del panel */
    .mantenimiento-panel .mantenimiento-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
        flex: 1;
        overflow-y: auto;
        overflow-x: hidden;
        scrollbar-width: thin;
        scrollbar-color: #cbd5e0 #f1f5f9;
    }

    .mantenimiento-panel .mantenimiento-body::-webkit-scrollbar {
        width: 4px;
    }

    .mantenimiento-panel .mantenimiento-body::-webkit-scrollbar-track {
        background: #f1f5f9;
    }

    .mantenimiento-panel .mantenimiento-body::-webkit-scrollbar-thumb {
        background: #cbd5e0;
        border-radius: 2px;
    }

    /* Tarjeta de total */
    .total-card {
        background: linear-gradient(135deg, #1e293b, #0f172a);
        color: white;
        border-radius: 12px;
        padding: 1.25rem;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .total-label {
        font-size: 0.7rem;
        font-weight: 600;
        opacity: 0.8;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }

    .total-value {
        font-size: 2.2rem;
        font-weight: 300;
        line-height: 1.2;
        margin-bottom: 0.25rem;
    }

    .total-subtitle {
        font-size: 0.8rem;
        opacity: 0.7;
    }

    /* Categorías */
    .category-cards {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .category-card {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.2s ease;
    }

    .category-card:hover {
        background: #ffffff;
        border-color: #94a3b8;
        transform: translateX(4px);
    }

    .category-icon {
        width: 40px;
        height: 40px;
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
        color: #1e293b;
    }

    .category-content {
        flex: 1;
    }

    .category-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 0.95rem;
        margin-bottom: 0.15rem;
    }

    .category-description {
        font-size: 0.7rem;
        color: #64748b;
    }

    .category-count {
        font-size: 1.3rem;
        font-weight: 600;
        color: #1e3a8a;
        min-width: 60px;
        text-align: right;
    }

    /* Distribución */
    .distribution-container {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1.25rem;
    }

    .distribution-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .distribution-item {
        display: flex;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .distribution-label {
        width: 50px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #1e293b;
    }

    .distribution-bar-container {
        flex: 1;
        height: 6px;
        background: #e2e8f0;
        border-radius: 3px;
        margin: 0 1rem;
        overflow: hidden;
    }

    .distribution-bar {
        height: 100%;
        width: 0;
        transition: width 1s ease;
    }

    .distribution-bar.aph { background: #2563eb; }
    .distribution-bar.elec { background: #7c3aed; }
    .distribution-bar.dezm { background: #059669; }

    .distribution-percent {
        width: 45px;
        font-size: 0.8rem;
        font-weight: 600;
        color: #1e293b;
        text-align: right;
    }

    /* Lista de años */
    .years-list {
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        border-radius: 10px;
        padding: 1.25rem;
    }

    .years-title {
        font-size: 0.8rem;
        font-weight: 600;
        color: #475569;
        margin-bottom: 1rem;
        text-transform: uppercase;
        letter-spacing: 0.3px;
    }

    .years-items {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .year-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.5rem 0;
        border-bottom: 1px solid #e2e8f0;
    }

    .year-row:last-child {
        border-bottom: none;
    }

    .year-row .year {
        font-weight: 500;
        color: #1e293b;
        font-size: 0.9rem;
    }

    .year-row .total {
        font-weight: 600;
        color: #1e3a8a;
        background: #ffffff;
        padding: 0.2rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        border: 1px solid #e2e8f0;
    }

    /* Animación pulse para la solapa */
    @keyframes pulse-glow {
        0% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(30, 58, 138, 0); }
        100% { box-shadow: 0 0 0 0 rgba(30, 58, 138, 0); }
    }

    .mantenimiento-trigger.pulse { 
        animation: pulse-glow 2s infinite; 
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .mantenimiento-panel { 
            top: auto; 
            bottom: 20px; 
            right: 20px; 
            transform: none; 
        }
        
        .mantenimiento-panel .mantenimiento-trigger { 
            position: relative; 
            left: auto; 
            top: auto; 
            transform: none; 
            width: 60px; 
            height: 60px; 
            border-radius: 50%; 
            padding: 0; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .mantenimiento-panel .mantenimiento-trigger .mantenimiento-trigger-label { 
            display: none; 
        }
        
        .mantenimiento-panel .mantenimiento-trigger img { 
            width: 32px; 
            height: 32px; 
        }
        
        .mantenimiento-panel .mantenimiento-surface { 
            position: fixed; 
            top: 50%; 
            left: 50%; 
            transform: translate(-50%, -50%);
            width: 90%; 
            max-width: 350px; 
            border-radius: 16px; 
            border: 2px solid rgba(255,255,255,0.9);
        }
    }
</style>

<div class="mantenimiento-panel" 
     x-data="mantenimientoPanel()" 
     x-init="init()"
     @keydown.window.escape="if(isOpen) toggle()">

    <!-- Solapa azul (estilo original) -->
    <button class="mantenimiento-trigger" 
            :class="{ 'pulse': !isOpen }" 
            @click="toggle()" 
            :aria-expanded="isOpen ? 'true' : 'false'"
            aria-label="Abrir panel de estadísticas">
        <img src="{{ $logoSrc }}" alt="Estadísticas">
        <span class="mantenimiento-trigger-label">{{ $triggerLabel }}</span>
    </button>

    <!-- Panel deslizable -->
    <section class="mantenimiento-surface" 
             x-cloak 
             x-show="isOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-0"
             @click.away="isOpen = false">

        <div class="mantenimiento-head">
            <h3>📊 Estadísticas</h3>
            <button class="mantenimiento-close" @click="toggle()" aria-label="Cerrar">×</button>
        </div>

        <div class="mantenimiento-body">
            <!-- Total general del año actual -->
            <div class="total-card">
                <div class="total-label">Total de tareas de Mantenimiento</div>
                <div class="total-value" x-text="formatNumber(animatedTotal)"></div>
                <div class="total-subtitle">tareas registradas</div>
            </div>

            <!-- Categorías -->
            <div class="category-cards">
                <div class="category-card">
                    <div class="category-icon">🏗️</div>
                    <div class="category-content">
                        <div class="category-name">APH</div>
                        <div class="category-description">Albañilería · Plomería · Herrería</div>
                    </div>
                    <div class="category-count" x-text="formatNumber(animatedAph)"></div>
                </div>

                <div class="category-card">
                    <div class="category-icon">⚡</div>
                    <div class="category-content">
                        <div class="category-name">ELEC</div>
                        <div class="category-description">Electricidad</div>
                    </div>
                    <div class="category-count" x-text="formatNumber(animatedElec)"></div>
                </div>

                <div class="category-card">
                    <div class="category-icon">🌿</div>
                    <div class="category-content">
                        <div class="category-name">DEZM</div>
                        <div class="category-description">Desmalezamiento</div>
                    </div>
                    <div class="category-count" x-text="formatNumber(animatedDezm)"></div>
                </div>
            </div>

            <!-- Distribución porcentual -->
            <div class="distribution-container">
                <div class="distribution-title">Distribución por categoría</div>
                
                <div class="distribution-item">
                    <span class="distribution-label">APH</span>
                    <div class="distribution-bar-container">
                        <div class="distribution-bar aph" :style="`width: ${aphPercentage}%`"></div>
                    </div>
                    <span class="distribution-percent" x-text="aphPercentage.toFixed(1) + '%'"></span>
                </div>

                <div class="distribution-item">
                    <span class="distribution-label">ELEC</span>
                    <div class="distribution-bar-container">
                        <div class="distribution-bar elec" :style="`width: ${elecPercentage}%`"></div>
                    </div>
                    <span class="distribution-percent" x-text="elecPercentage.toFixed(1) + '%'"></span>
                </div>

                <div class="distribution-item">
                    <span class="distribution-label">DEZM</span>
                    <div class="distribution-bar-container">
                        <div class="distribution-bar dezm" :style="`width: ${dezmPercentage}%`"></div>
                    </div>
                    <span class="distribution-percent" x-text="dezmPercentage.toFixed(1) + '%'"></span>
                </div>
            </div>

            <!-- Historial por años (sin selector) -->
            @if(!empty($totalesPorAnio) && count($aniosDisponibles) > 0)
                <div class="years-list">
                    <div class="years-title">📅 Totales por año</div>
                    <div class="years-items">
                        @foreach($aniosDisponibles as $y)
                            @php
                                $row = $totalesPorAnio[$y] ?? ['TOTAL' => 0];
                                $qs = request()->query();
                                $qs['anio'] = $y;
                                $href = url()->current() . '?' . http_build_query($qs);
                            @endphp
                            <div class="year-row">
                                <a href="{{ $href }}" class="year">{{ $y }}</a>
                                <span class="total">{{ number_format((int)($row['TOTAL'] ?? 0)) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>

<script>
    function mantenimientoPanel() {
        return {
            isOpen: window.EDUDATA_MANTENIMIENTO_OPEN || false,
            animatedTotal: 0,
            animatedAph: 0,
            animatedElec: 0,
            animatedDezm: 0,
            totals: window.EDUDATA_MANTENIMIENTO_TOTALS || { APH: 0, ELEC: 0, DEZM: 0 },

            get realTotals() {
                return {
                    total: (this.totals.APH || 0) + (this.totals.ELEC || 0) + (this.totals.DEZM || 0),
                    aph: this.totals.APH || 0,
                    elec: this.totals.ELEC || 0,
                    dezm: this.totals.DEZM || 0
                };
            },

            get aphPercentage() {
                const t = this.realTotals.total;
                return t > 0 ? (this.realTotals.aph / t) * 100 : 0;
            },
            
            get elecPercentage() {
                const t = this.realTotals.total;
                return t > 0 ? (this.realTotals.elec / t) * 100 : 0;
            },
            
            get dezmPercentage() {
                const t = this.realTotals.total;
                return t > 0 ? (this.realTotals.dezm / t) * 100 : 0;
            },

            init() {
                if (this.isOpen) {
                    this.startCounting();
                }
            },

            toggle() {
                this.isOpen = !this.isOpen;
                if (this.isOpen) {
                    this.startCounting();
                } else {
                    this.resetCounters();
                }
            },

            startCounting() {
                const real = this.realTotals;
                const duration = 800;
                const steps = 40;
                const stepDuration = duration / steps;
                let current = 0;

                const animate = () => {
                    if (current <= steps) {
                        const progress = current / steps;
                        const ease = 1 - Math.pow(1 - progress, 3);
                        
                        this.animatedTotal = Math.floor(real.total * ease);
                        this.animatedAph = Math.floor(real.aph * ease);
                        this.animatedElec = Math.floor(real.elec * ease);
                        this.animatedDezm = Math.floor(real.dezm * ease);
                        
                        current++;
                        setTimeout(animate, stepDuration);
                    } else {
                        this.animatedTotal = real.total;
                        this.animatedAph = real.aph;
                        this.animatedElec = real.elec;
                        this.animatedDezm = real.dezm;
                    }
                };
                
                animate();
            },

            resetCounters() {
                this.animatedTotal = 0;
                this.animatedAph = 0;
                this.animatedElec = 0;
                this.animatedDezm = 0;
            },

            formatNumber(num) {
                return new Intl.NumberFormat('es-AR').format(num);
            }
        }
    }

    document.addEventListener('alpine:init', () => {
        Alpine.data('mantenimientoPanel', mantenimientoPanel);
    });
</script>