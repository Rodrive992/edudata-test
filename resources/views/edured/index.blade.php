@extends('layouts.app')

@section('title', 'EduRed - Inicio')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @php
            $permiso = auth()->user()->permiso ?? null;
        @endphp

        @if ($permiso === 'carga')
            @include('edured.partials.carga-content')
        @elseif ($permiso === 'control')
            @include('edured.partials.control-content')
        @elseif ($permiso === 'admin')
            @include('edured.partials.admin-content')
        @elseif ($permiso === 'dir_esc')
            @include('edured.partials.dir_esc-content')
        @else
            <p class="text-red-500">No tiene permisos para ver esta sección.</p>
        @endif
    </div>
@endsection
