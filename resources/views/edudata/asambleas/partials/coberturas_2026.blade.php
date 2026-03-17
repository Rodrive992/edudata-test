<style>
    .empty-year-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
        border: 1px solid rgba(148, 163, 184, .22);
        border-radius: 1rem;
        box-shadow: 0 10px 28px rgba(15, 23, 42, .05);
        overflow: hidden;
    }

    .empty-year-head {
        background: linear-gradient(135deg, var(--pri-500) 0%, var(--pri-800) 100%);
        color: white;
        padding: 1rem 1.25rem;
    }

    .empty-kpi {
        background: linear-gradient(135deg, #fff 0%, #f8fafc 100%);
        border: 1px solid rgba(148, 163, 184, .18);
        border-radius: .9rem;
        padding: 1.2rem;
        text-align: center;
        box-shadow: 0 6px 18px rgba(15, 23, 42, .04);
    }

    .empty-kpi .num {
        font-size: 2rem;
        line-height: 1;
        font-weight: 800;
        color: var(--pri-700);
        margin-bottom: .35rem;
    }

    .empty-kpi .lab {
        font-size: .84rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: .05em;
    }

    .empty-note {
        background: #eff6ff;
        border: 1px solid #bfdbfe;
        color: #1e3a8a;
        border-radius: .9rem;
        padding: 1rem 1.15rem;
    }
</style>

<div class="space-y-6">
    <div class="empty-year-card">
        <div class="empty-year-head">
            <h3 class="text-lg md:text-xl font-bold">Cobertura de Cargos 2026</h3>
            <p class="text-sm text-white/90 mt-1">
                Espacio preparado para incorporar la información del año en curso.
            </p>
        </div>

        <div class="p-4 md:p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-5">
                <div class="empty-kpi">
                    <div class="num">—</div>
                    <div class="lab">Inicial / Primario</div>
                </div>

                <div class="empty-kpi">
                    <div class="num">—</div>
                    <div class="lab">Secundario</div>
                </div>

                <div class="empty-kpi">
                    <div class="num">—</div>
                    <div class="lab">Superior</div>
                </div>
            </div>

            <div class="empty-note">
                <div class="font-semibold mb-1">Información en preparación</div>
                <p class="text-sm leading-relaxed mb-0">
                    Esta sección quedará destinada a la publicación de asambleas ordinarias,
                    extraordinarias y llamados de cobertura correspondientes al año 2026.
                    Por el momento, los datos estadísticos todavía no fueron incorporados.
                </p>
            </div>
        </div>
    </div>
</div>