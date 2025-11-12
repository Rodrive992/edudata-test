<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Edudata - Dirección de Transparencia Activa')</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/safari-pinned-tab.svg') }}" color="#1e2939">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="theme-color" content="#1e2939">

    <style>
        :root{
            /* Paleta unificada (alineada al banner) */
            --pri-700:#0A1143;   /* títulos fuertes */
            --pri-600:#1d4ed8;   /* acento azul principal */
            --pri-500:#3b82f6;   /* azul medio */
            --pri-300:#93c5fd;   /* azul claro (bordes) */
            --pri-100:#eaf3ff;   /* azul muy claro (fondos) */
            --sec-500:#10b981;   /* verde apoyo */
            --warn-500:#f5cb58;  /* amarillo institucional */
            --ink:#1f2937;       /* texto base */
        }

        [x-cloak]{ display:none !important; }

        /* Scrollbars coherentes */
        .scrollbar-thin::-webkit-scrollbar{ width:8px; }
        .scrollbar-thin::-webkit-scrollbar-thumb{ background-color: var(--pri-300); border-radius:4px; }
        .scrollbar-thin::-webkit-scrollbar-thumb:hover{ background-color:#60a5fa; }
        .scrollbar-thin::-webkit-scrollbar-track{ background-color:#dbeafe; }

        /* Fondo con patrón y leve borde interno para la sección de estadísticas */
        .estadisticas-bg{
            position: relative;
           
            
        }
        .estadisticas-bg::before{
            content:'';
            position:absolute; inset:0;
            
            pointer-events:none;
        }

        /* Utilitarios opcionales para unificar tarjetas */
        .surface{
            background:#fff;
            border:1px solid #e5e7eb;          /* gray-200 */
            border-radius: 1rem;               /* ~ rounded-2xl */
            box-shadow: 0 8px 20px rgba(0,0,0,.06);
        }
        .surface-head{
            font-weight:700;
            color:#fff;
            padding: .75rem 1rem;              /* px-4 py-3 */
            border-bottom:1px solid rgba(255,255,255,.2);
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#ffffff] text-[color:var(--ink)] antialiased">

    {{-- Top navbar (el degradé del navbar se define dentro del partial) --}}
    @if (Request::is('edured*'))
        @include('edured.partials.top-navbar')
    @else
        @include('edudata.partials.top-navbar')
    @endif

    {{-- Contenido principal --}}
    <main class="min-h-screen mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    {{-- Bottom navbar --}}
    @if (Request::is('edured*'))
        @include('edured.partials.bottom-navbar')
    @else
        @include('edudata.partials.bottom-navbar')
    @endif
</body>
</html>
