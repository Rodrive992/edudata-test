<nav class="sticky top-0 z-50 relative bg-[#6bbde5] before:content-[''] before:absolute before:inset-0 before:opacity-95">
  <div class="relative z-10"
       x-data="{ openSections:false, openTransp:false, openOrg:false }">

    <!-- TOP BAR -->
    <div class="px-4">
      <div class="max-w-7xl mx-auto py-3 md:py-2">
        <div class="grid grid-cols-12 items-center gap-3">

          <!-- Izquierda: Logo + título -->
          <div class="col-span-8 sm:col-span-6 md:col-span-5 flex items-center gap-1">
            <a href="{{ route('edudata.index') }}" class="shrink-0">
              <img src="{{ asset('images/logoedudata-blanco.png') }}" alt="EDUDATA Logo"
                   class="h-12 sm:h-14 md:h-16">
            </a>

            <!-- Título (más compacto) -->
            <div class="select-none">
              <div class="text-[12px] sm:text-[13px] md:text-[16px] font-medium tracking-wide text-white/95 leading-[1.1]">
                Dirección de
              </div>
              <div class="text-sm sm:text-base md:text-lg font-extrabold tracking-tight leading-[1.1] -mt-0.5">
                <span class="text-[#162172]">Transparencia</span>
                <span class="text-white/95 font-extrabold">Activa</span>
              </div>
            </div>
          </div>

          <!-- Centro: espacio -->
          <div class="hidden md:block md:col-span-2"></div>

          <!-- Derecha: Menús (sin relieve) -->
          <div class="col-span-4 sm:col-span-6 md:col-span-5 flex justify-end items-center gap-2 md:gap-3">
            @php
              $menuBtn  = 'group inline-flex items-center px-3 py-2 rounded-md
                           text-white/95 hover:text-white
                           bg-white/5 hover:bg-white/10
                           border border-white/10
                           transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-white/30
                           text-[10px] md:text-[12px] font-semibold uppercase tracking-wide';
              $chev     = 'w-4 h-4 ml-2 transition-transform duration-200 group-aria-expanded:rotate-180';
              $panelBase= 'absolute right-0 mt-2 overflow-hidden rounded-xl z-40
                           border border-white/15 bg-white/95 backdrop-blur-md';
              $panelHead= 'px-4 pt-3 pb-2 text-xs uppercase tracking-wider
                           bg-white text-[#0A1143]/80 font-semibold';
              $itemBase = 'flex items-center px-4 py-2 rounded-md transition group/item
                           text-[#0A1143] text-[15px]';
              $itemFx   = 'hover:bg-[#f5f7ff]';
              $itemCaret= 'ml-auto text-[#1890FF] opacity-0 group-hover/item:opacity-100 transition';
            @endphp

            <!-- Secciones -->
            <div class="relative" @click.outside="openSections=false" :aria-expanded="openSections">
              <button @click="openSections = !openSections" class="{{ $menuBtn }}">
                Secciones
                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="openSections"
                   x-transition.opacity.duration.120ms
                   class="{{ $panelBase }} w-80">
                <div class="{{ $panelHead }}">Secciones disponibles</div>
                <ul class="px-2 py-2">
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Mantenimiento Edilicio <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Digesto Normativo <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><hr class="my-2 border-[#E1EAFF]"></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Educación Técnica <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Innovación Educativa <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Formación y Programación <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Asuntos Jurídicos <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Títulos <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Programas y Proyectos <span class="{{ $itemCaret }}">→</span></a></li>
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Residencia Universitaria <span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
              </div>
            </div>

            <!-- Transparencia -->
            <div class="relative" @click.outside="openTransp=false" :aria-expanded="openTransp">
              <button @click="openTransp = !openTransp" class="{{ $menuBtn }}">
                Transparencia
                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="openTransp"
                   x-transition.opacity.duration.120ms
                   class="{{ $panelBase }} w-80">
                <div class="{{ $panelHead }}">Organigrama Instucional</div>
                <ul class="px-2 py-2">
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Ver organigrama <span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
              </div>
            </div>

            <!-- Organigrama -->
            <div class="relative" @click.outside="openOrg=false" :aria-expanded="openOrg">
              <button @click="openOrg = !openOrg" class="{{ $menuBtn }}">
                Solicitud de información
                <svg class="{{ $chev }}" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.51a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                </svg>
              </button>
              <div x-cloak x-show="openOrg"
                   x-transition.opacity.duration.120ms
                   class="{{ $panelBase }} w-64">
                <div class="{{ $panelHead }}">Generar soliciutd</div>
                <ul class="px-2 py-2">
                  <li><a href="#" class="{{ $itemBase }} {{ $itemFx }}">Ir al formulario<span class="{{ $itemCaret }}">→</span></a></li>
                </ul>
              </div>
            </div>
          </div><!-- /Derecha -->

        </div>
      </div>
    </div>  
  </div>
</nav>
