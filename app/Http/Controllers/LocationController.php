<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    //
    public function getColonias($zip)
    {
        // Aquí puedes consultar una base de datos o utilizar un servicio de terceros
        // Ejemplo de datos simulados
        $colonias = [
            '10001' => ['Colonia A', 'Colonia B', 'Colonia C'],
            '20002' => ['Colonia D', 'Colonia E', 'Colonia F'],
            // Agrega más códigos postales y colonias según sea necesario
        ];

        // Buscar las colonias por el código postal proporcionado
        $result = $colonias[$zip] ?? [];

        return response()->json($result);
    }

}
