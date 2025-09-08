<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class Breadcrumbs
{
    public static function generate()
    {
        $currentRoute = Route::currentRouteName();
        $breadcrumbs = [];
        
        // Definir la estructura de las migas de pan
        $hierarchy = [
            'edudata.index' => [
                'title' => 'Inicio',
                'parent' => null,
            ],
            'edudata.formacion' => [
                'title' => 'Formación Profesional',
                'parent' => 'edudata.index',
            ],
            'edudata.innovacion' => [
                'title' => 'Innovacion',
                'parent' => 'edudata.index',
            ],
            'edudata.mantenimiento' => [
                'title' => 'Mantenimiento',
                'parent' => 'edudata.index',
            ],
            'edudata.administracion' => [
                'title' => 'Administración',
                'parent' => 'edudata.index',
            ],
            'edudata.asuntos' => [
                'title' => 'Asuntos Jurídicos',
                'parent' => 'edudata.index',
            ],
            'edudata.titulos' => [
                'title' => 'Titulos',
                'parent' => 'edudata.index',
            ],
            'edudata.programas' => [
                'title' => 'Programación y Proyectos',
                'parent' => 'edudata.index',
            ],
             'edudata.edutecnica' => [
                'title' => 'Educación Técnica y Agrotecnica',
                'parent' => 'edudata.index',
            ],
            
            'edured.index' => [
                'title' => 'EduRed',
                'parent' => null,
            ],
            'edured.historial' => [
                'title' => 'Historial',
                'parent' => 'edured.index',
            ],
            'login' => [
                'title' => 'Iniciar sesión',
                'parent' => null,
            ],
        ];

        // Construir las migas de pan
        if (isset($hierarchy[$currentRoute])) {
            $route = $currentRoute;
            while ($route !== null) {
                array_unshift($breadcrumbs, [
                    'title' => $hierarchy[$route]['title'],
                    'route' => $route,
                ]);
                $route = $hierarchy[$route]['parent'];
            }
        }

        return $breadcrumbs;
    }
}